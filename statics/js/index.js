$(document).ready($(function() {
		$("#tabs-7").tabs({event: "mouseover"});
		$("#lefttabs1").tabs({event: "mouseover"});
		$("#tabs-3").tabs({event: "mouseover"});
		$("#tabs-4").tabs({event: "mouseover"});
		$("#tabs-5").tabs({event: "mouseover"});
		$("#tabs-6").tabs({event: "mouseover"});
		$('#lefttabs1 li a').mouseover(function(i){
			
			if($(i.toElement).hasClass('zzcx_cur')){			
				$(i.toElement).removeClass('zzcx_cur');				
			}else{				
				$(i.toElement).addClass('zzcx_cur');
			}
		});
		
		$('#lefttabs1 li a').focus(function(i){
			if($(i.toElement).hasClass('zzcx_cur')){
				$(i.toElement).removeClass('zzcx_cur');			
			}else{				
				$(i.toElement).addClass('zzcx_cur');
			}
		});
		//$('#lefttabs1 li a').removeClass('zzcx_cur');	
		//$('#zzcx_tab_first').addClass('zzcx_cur');
	}));
