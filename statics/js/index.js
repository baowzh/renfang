$(document).ready($(function() {
	$("#tabs-7").tabs({
		event : "mouseover"
	});
	$("#lefttabs1").tabs({
		event : "mouseover"
	});
	$("#tabs-3").tabs({
		event : "mouseover"
	});
	$("#tabs-4").tabs({
		event : "mouseover"
	});
	$("#tabs-5").tabs({
		event : "mouseover"
	});
}));
var switchclass1 = function(class1, class2, selclass, obj) {
	$('.' + selclass + ' li a').each(function(obj1, obj2) {
		if (obj != obj2) {
			$(obj2).removeClass(class1);
			$(obj2).addClass(class2);
		}
	})
	$(obj).addClass(class1);
	$(obj).removeClass(class2);
}
var openpage = function(url) {
	window.location.href = url;
}
