$(function(){
	$(".clixgrid_block td").mouseover(function(){
		if($(this).hasClass('clixgrid_clicked') !== true){
		$(this).css({'background':'#000000', 'filter': 'alpha(opacity=0.5)', 'opacity': '50'}); 
		}
	}).mouseout(function(){
		if($(this).hasClass('clixgrid_clicked') !== true){
		$(this).css({'background':'none', 'filter': 'alpha(opacity=1)', 'opacity': '100'}); 
		}
	});

});
function clixmove(tr,td){
	if(tr == 0 && td == 0){
		$("#position").html('Click anywhere on the picture');
	}else{
		$("#position").html(tr+' x '+td);
	}
}
function clixdo(tr,td){
	window.open('point_cal.php? x='+tr+'&y='+td);
}

function hidePoistion(){
	location.reload(true);
}