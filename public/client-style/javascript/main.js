(function ($) {
    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 1;
			}
		}
		$button.parent().find('input').val(newVal);
	});

})(jQuery);

$('.pro-qty').attr('unselectable','on').css({
	'-moz-user-select':'-moz-none',
	'-moz-user-select':'none',
	'-o-user-select':'none',
	'-khtml-user-select':'none',
	'-webkit-user-select':'none',
	'-ms-user-select':'none',
	'user-select':'none'
   }).bind('selectstart', function(){ return false; });

var preventDefauls = document.querySelectorAll(".prevent-default");

preventDefauls.forEach(item => {
	item.addEventListener("click", () => {
		this.preventDefauls();
	})
})
