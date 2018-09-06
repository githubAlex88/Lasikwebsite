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

    // Init selects
    $('select').formSelect();

    // Init carousel
    $('.carousel').carousel({
      fullWidth: true,
      indicators: false
    });

    // move next carousel
    $('.carousel-next').click(function(e){
      e.preventDefault();
      e.stopPropagation();
      $('.carousel').carousel('next');
    });

    // move prev carousel
    $('.carousel-prev').click(function(e){
      e.preventDefault();
      e.stopPropagation();
      $('.carousel').carousel('prev');
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

    // Add modal-trigger class to menu links
    $( 'li.menu__item.modal-trigger' ).find( 'a' ).addClass( 'modal-trigger' );

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
      let searching_term = $(this).val().toLowerCase();
      // Target container for results
      let target = $( $(this).data('target') );
      // Counter for matches
      let matched = 0;

      // Search for occurrences of searching_term in a value received as a parameter
      function searchTermIn( value ) {
        return value.toString().toLowerCase().indexOf( searching_term ) !== -1;
      }

      // Loop through location data
      target.find(".search-modal__item").each( function () {
        let item = $(this);
        // Only search if there are less than 5 results
        if ( matched < 5 ) {
          let match_type = "";
          // Default output "City, State"
          let match_value = item.data("city") + ", " + item.data("state");
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
      // If there are matches toggle class active to style the container so results are properly displayed
      if ( matched > 0 ) {
        target.addClass("active");
        console.log(target.closest('.search-modal'));
        target.closest('.search-modal').addClass("active");
      } else {
        target.removeClass("active");
        target.closest('.search-modal').removeClass("active");
      }
    }
    // Add the event for input field and button
    $("#location, #id_location").keyup( searchLocations );

    $('.current-postiton__button').click(function(e) {
      e.preventDefault();
      // Reset data to visitor's location
      $('#locationData').val("");
      $('.search-modal__form.change-location').trigger('submit');
    });

    $('#locations, #location-autocomplite').children('.search-modal__item').click(function(e) {
      console.log('test111');
      var that = $(this);
      var data = {
        id:           that.data('id'),
        long:         that.data('long'),
        lat:          that.data('lat'),
        name:         that.data('name'),
        state:        that.data('state'),
        stateShort:   that.data('state_short'),
        city:         that.data('city'),
        zip:          that.data('zip'),
        team_member:  that.data('team_member')
      };
      $('#location').val(that.find('p').text()).focus();
      $('#locationData').val(JSON.stringify(data));
    });

    $('#vision-center').on('input', function(e) {
      let items = $('.search-item');
      let inputValue = $(this).val().toLowerCase();
      console.log(items);
      console.log(inputValue);
      items.each(function() {
        let item = $(this);
        $(this).find('.search-field').each(function() {
          console.log($(this).text().trim());
          console.log($(this).text().trim().toLowerCase().startsWith(inputValue));
          if($(this).text().trim().toLowerCase().startsWith(inputValue)) {
            console.log(item)
            item.show();
            return false;
          } else {
            console.log(item)
            item.hide();
          }
        });
      });
    });

    let inputCooldown = null;
    $('input.search-trigger').on('input', function(e) {
      let inputValue = $(this).val().toLowerCase();

      if (inputCooldown != null) {
        clearTimeout(inputCooldown);
      }
      inputCooldown = setTimeout(function() {
        inputCooldown = null;

        jQuery.ajax({
          type : 'post',
          url : search_ajax_url,
          data : {
            action : 'get_search_results',
            query : inputValue
          },
          success : function( response ) {
            $('.search-modal__results').html(response)
          }
        });
      }, 400);

    });

  }
}
