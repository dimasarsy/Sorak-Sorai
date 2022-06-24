$(document).ready(function(){
	// show automatically after 1s
	setTimeout(showModal,1000);
	$("#closeBtn").click(function(){
		$("#myModalAdvert").hide()
	})
	function showModal(){
		// get value from localStorage
		var is_modal_show = sessionStorage.getItem('alreadyShow');
		if(is_modal_show != 'alredy shown'){
			$("#myModalAdvert").show()
			sessionStorage.setItem('alreadyShow','alredy shown');
		}else{
			console.log(is_modal_show);
		}
	}
})
