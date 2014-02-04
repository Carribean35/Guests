$(document).ready(function() {
	$("#showSubmenu").on("click", function() {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$("#submenu").hide();
		} else {
			$(this).addClass("active");
			$("#submenu").show();
		}
	})
	
	$(".detailDish").on("click", function() {
		var item = $(this).parent().parent();
		
		var name = item.find(".name").html();
		var price = item.find(".price").html();
		var weight = item.find(".weight").html();
		var text = item.find(".text").html();
		var img = "/data/menu/dish/440x452/" + $(this).attr("rel") + ".jpg";
		
		$('#dishModal').find(".name").html(name);
		$('#dishModal').find(".price").html(price);
		$('#dishModal').find(".weight").html(weight);
		$('#dishModal').find(".text").html(text);
		$('#dishModal').find(".img-container img").attr("src", img);
		
		$('#dishModal').modal('show');
		
		return false;
	})
	
})