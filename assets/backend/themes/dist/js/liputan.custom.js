/*
 *
 * 	- Liputa Customized JS
 *
 */

$(function(){

})

var showLoading = function(){
	$(".loader_icon").show();
}

var hideLoading = function(){
	$(".loader_icon").hide();
}

var setSubname = function(subName){
	/*var x = (subName != 'list_active')? 'INACTIVE' : 'ACTIVE';
	return x;*/
	var sub = '';
	if (subName == 'list_all') {sub = 'ALL'}
	else if(subName == 'list_active') {sub = 'ACTIVE'}
	else if(subName == 'list_inactive') {sub = 'INACTIVE'}
		return sub;
}