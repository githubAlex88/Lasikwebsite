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
    
    // Change location modal
    $( $('.locations__link.active').attr('href') ).show();
    $('.locations__link').click( function () {
      $('.locations__link').removeClass('active');
      $(this).addClass('active');
      $('.location__items-wrapper').hide();
      $( $(this).attr('href') ).show();
    });

    // View all locations modal
    function searchLocations() {
      var searching_term = $("input#location").val().toLowerCase();
      var matched = 0;
      $(".search-modal__item").each( function () {
        var item = $(this);
        if ( matched < 5 ) {
          var match_type = "";
          var match_value = item.data("city") + ", " + item.data("state");
          if (searching_term) {
            if (item.data("state").toString().toLowerCase().indexOf(searching_term) >= 0) {
              match_type = "State";
            } else if (item.data("city").toString().toLowerCase().indexOf(searching_term) >= 0) {
              match_type = "City";
            } else if (item.data("zip").toString().toLowerCase().indexOf(searching_term) >= 0) {
              match_type = "Zip Code";
              match_value += " " + item.data("zip");
            } else if (item.data("team_member").toString().toLowerCase().indexOf(searching_term) >= 0) {
              match_type = "Team Member";
              match_value = item.data("team_member") + ". " + match_value;
            }
          }
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
      var results_wrapper = $(".search-modal__result");
      if ( matched > 0 ) {
        results_wrapper.addClass("active");
      } else {
        results_wrapper.removeClass("active");
      }
    }
    $(".search-modal__input").keyup( searchLocations );
    $(".search-modal__submit").click( searchLocations );
	}
}
