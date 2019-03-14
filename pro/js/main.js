$(document).ready(function()
{
	$("#stdl").click(function(){
		$("#student").css("z-index",10);
		$("#facul").css("z-index",1);
	});
	$("#adl").click(function()
	{
		$("#facul").css("z-index",10);
		$("#student").css("z-index",1);
	}
	);

}
	);