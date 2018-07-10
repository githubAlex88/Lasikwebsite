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
	}
}
