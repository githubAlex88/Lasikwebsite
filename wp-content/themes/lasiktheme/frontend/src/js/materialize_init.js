export default {
  init() {
    let positionOnPage;

    $('.sidenav').sidenav({
      edge: 'right',
      onOpenEnd: function () {
        positionOnPage = $(window).scrollTop();
        $('body').css('position', 'fixed');
      },
      onCloseStart: function () {
        $('body').css('position', '');
        $(window).scrollTop(positionOnPage);
      }
    });

    $('.modal').modal({
      onOpenEnd: function () {
        positionOnPage = $(window).scrollTop();
        $('body').css('position', 'fixed');
      },
      onCloseStart: function () {
        $('body').css('position', '');
        $(window).scrollTop(positionOnPage);
      }
    });
    
    $('.submenu-toggle').on('click', function(e) {
    	e.preventDefault();

  		$(this)
  		.closest('.submenu-item')
  		.find('.submenu')
  		.toggleClass('active')
      .removeClass('open');

    });

    $('[data-open-submenu]').on('click', function(e) {
      let submenu = $($(this).data('open-submenu'));
      
      submenu.closest('.sidenav').addClass('visible');
      submenu.addClass('active open');
    });

    $('.autocomplite-trigger').on('input', function(e) {
      if($(this).val()) {
        $($(this).data('target')).show();
      } else {
        $($(this).data('target')).hide();
      }
    });
    
    // Change location modal toggle
    $( $('.locations__link.active').attr('href') ).show();
    $('.locations__link').click( function () {
      $('.locations__link').removeClass('active');
      $(this).addClass('active');
      $('.location__items-wrapper').hide();
      $( $(this).attr('href') ).show();
    });

    // View all locations modal
    function searchLocations() {
      // User input to search
      var searching_term = $("input#location").val().toLowerCase();
      // Counter for matches
      var matched = 0;

      // Search for occurrences of searching_term in a value received as a parameter
      function searchTermIn( value ) {
        if ( value.toString().toLowerCase().indexOf( searching_term ) !== -1 ) {
          return true;
        }
        return false;
      }

      // Loop through location data
      $(".search-modal__item").each( function () {
        var item = $(this);
        // Only search if there are less than 5 results
        if ( matched < 5 ) {
          var match_type = "";
          // Default output "City, State"
          var match_value = item.data("city") + ", " + item.data("state");
          // If the term exists search for every attribute of the location and get the type and value of the match
          if (searching_term) {
            if ( searchTermIn( item.data("state") ) ) {
              match_type = "State";
            } else if ( searchTermIn( item.data("city") ) ) {
              match_type = "City";
            } else if ( searchTermIn( item.data("zip") ) ) {
              match_type = "Zip Code";
              match_value += " " + item.data("zip");
            } else {
              // For team members loop through the json array
              $.each( item.data("team_member"), function ( index, value ) {
                if ( searchTermIn( value ) ) {
                  match_type = "Team Member";
                  match_value = value + ". " + match_value;
                  return false;
                }
              });
            }
          }
          // If there is a match show the vision center, else hide it
          if ( match_type ) {
            matched++;
            item.show();
            item.children("span").text( match_type + " Match" );
            item.children("p").text( match_value );
          } else {
            item.hide();
          }
        } else {
          item.hide();
        }
      });
      // If there are matches toggle class active to style the containr so results are properly displayed
      var results_wrapper = $(".search-modal__result");
      if ( matched > 0 ) {
        results_wrapper.addClass("active");
      } else {
        results_wrapper.removeClass("active");
      }
    }
    // Add the event for input field and button
    $(".search-modal__input").keyup( searchLocations );
    $(".search-modal__submit").click( searchLocations );
	}
}
