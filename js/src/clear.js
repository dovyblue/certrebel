function loadStyleSheet(src) {
		if (document.createStyleSheet){
				document.createStyleSheet(src);
		}
		else {
				$("head").append($("<link rel='stylesheet' href='"+src+"' type='text/css' media='screen' />"));
		}
};
$(window).load(function() {
	$('#loader').delay(300).fadeOut('slow');
		$('#loader-container').delay(200).fadeOut('slow');
	$('body').delay(300).css({'overflow':'visible'});
})
$(document).ready(function(){
		localStorage.clear();
});
