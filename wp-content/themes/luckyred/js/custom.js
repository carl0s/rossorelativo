$(document).ready(function() {
	$('ul.selected li a').click(function() {
		$('ul.selected li a').removeClass('selected');
		$(this).addClass('selected');
	})
})