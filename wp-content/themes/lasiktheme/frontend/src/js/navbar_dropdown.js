export default {
	init() {
		$('[data-dropdown-item]').hover(
		  function(e) {
		    var widthItem = $(this).outerWidth();
		    var windowWidth = $('body').outerWidth();
		    var positionLeft = $(this).position().left;
		    var positionRight = windowWidth - (widthItem + positionLeft);

		    $('[data-dropdown="' + $(this).data('dropdown-item') + '"]').show();
				
				if($(this).hasClass('dropdown-right')) {
					$(this)
					.find('.dropdown__list')
					.css({
						'margin-left': 'auto',
						'margin-right': positionRight + 'px',
					});
				} else {
					$(this)
					.find('.dropdown__list')
					.css({
						'margin-left': positionLeft + 'px',
						'margin-right': 'auto',
					});
				}

		  },
		  function(e) {
		  	$(this).removeClass('hover');
		    $('[data-dropdown="' + $(this).data('dropdown-item') + '"]').hide();
		  }
		);
	}
}