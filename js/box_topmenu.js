( function( $ ) {
$( document ).ready(function() {
$('#box_topmenu').prepend('<div id="menu-button">Menu</div>');
	$('#box_topmenu #menu-button').on('click', function(){
		var menu = $(this).next('ul');
		if (menu.hasClass('open')) {
			menu.removeClass('open');
		}
		else {
			menu.addClass('open');
		}
	});
});
} )( jQuery );
