var open = false;
	function nav() {
			if (open){
				document.getElementById("blur").style.visibility = "hidden";
				document.getElementById("nav").style.left = "-60%";
				open=false;				
			}else{
				document.getElementById("blur").style.visibility = "visible";
				document.getElementById("nav").style.left = "0px";
				open=true;
			}
		}
		var open3 = false;
		var icone = false;
		function post(lol) {
			if (open3 && !lol){
				$('#post_icon').toggleClass('fa-paper-plane').toggleClass('fa-pencil-square-o');
				document.getElementById("post_icon").style.content = '"\f044"';
				document.getElementById("blur").style.visibility = "hidden";
				document.getElementById("write_text").style.width = "0%";
				document.getElementById("write_text").style.paddingRight = "0px";
				document.getElementById("picture").style.right = "50px";
				document.getElementById("picture").style.bottom = "45px";
				icone=false;
				open3=false;				
			}else{
				if(!icone){
				$('#post_icon').toggleClass('fa-pencil-square-o').toggleClass('fa-paper-plane');	
				}else{
					$('#write').closest('form').submit();
				}
				document.getElementById("blur").style.visibility = "visible";
				document.getElementById("write_text").style.width = "80%";
				document.getElementById("write_text").style.paddingRight = "70px";
				document.getElementById("picture").style.right = "50px";
				document.getElementById("picture").style.bottom = "245px";
				icone=true;
				open3=true;
			}
		}
		var open2 = false;
		function info() {
			if (open2){
				document.getElementById("info").style.maxHeight = "70px";
				open2=false;				
			}else{
				document.getElementById("info").style.maxHeight = "430px";
				open2=true;
			}
		}
		$(document).add(parent.document).mouseup(function(e) {
    var cont = $('#nav_menu');
	var cont2 = $('#nav_control');
    if ((!cont.is(e.target) && cont.has(e.target).length === 0) && (!cont2.is(e.target) && cont2.has(e.target).length === 0)) {
		if(open){
			nav();
		}
    }
});
$(document).add(parent.document).mouseup(function(e) {
    var cont = $('#write_text');
	var cont2 = $('#write');
	var cont3 = $('#picture');
	var cont4 = $('#send');
    if ((!cont.is(e.target) && cont.has(e.target).length === 0) && (!cont2.is(e.target) && cont2.has(e.target).length === 0) && (!cont3.is(e.target) && cont3.has(e.target).length === 0) && (!cont4.is(e.target) && cont4.has(e.target).length === 0)) {
		if(open3){
			post(false);
		}
    }
});
function button(lol) {
	nav();
	setTimeout(function(){window.location.href=lol;}, 150);
}
function image(lol) {
	setTimeout(function(){ document.getElementById("flash").style.opacity = "0.8";setTimeout(function(){ document.getElementById("flash").style.opacity = "0"; }, 100);}, 100);
	if(image==null){
	document.getElementById("picture").style.backgroundColor = "red";
	}else{
	document.getElementById("picture").style.backgroundColor = "#51B14A";
	}
}