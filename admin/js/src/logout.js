$(document).ready(function(){
	$("#signout").click(function(){
			$("#logout").modal({keyboard: true});
			$('#quit').on('click',function() {
				localStorage.clear();
				window.location.href="logout.php";
			});
	});
});
