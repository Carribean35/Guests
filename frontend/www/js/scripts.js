(function( $ ){
	var methods = {
		
		count : 0,
		active : 0,
			
	    init : function() {
	    	var self = this;
	    	
	    	this.find(".paginat ul li").on("click", function(data) {
	    		self.active = $(data.currentTarget).attr("rel");
	    		methods.click_paginat.apply( self, Array.prototype.slice.call( arguments, 1 ))
	    	});
	    	
	    	setInterval(function() {
	    		methods.next.apply( self, Array.prototype.slice.call( arguments, 1 ))
	    	}, 5000);
	    	
	    	
	    	this.count = this.find(".ul-container ul li").length; 
	    	this.active = 0; 
	    	return this;
	    },
	    next : function() {
			if (this.active != this.count - 1)
				this.active++;
			else 
				this.active = 0;

			return methods.click_paginat.apply( this, Array.prototype.slice.call( arguments, 1 ));
	    },
	    prev : function() {
	    	if (this.active != 0)
				this.active--;
			else 
				this.active = this.count - 1;

	    	methods.click_paginat.apply( this, Array.prototype.slice.call( arguments, 1 ))
	    },
	    click_paginat : function() {
	    	this.find(".paginat ul li").removeClass("active");
	    	this.find(".paginat ul li").eq(this.active).addClass("active");
	    	this.find(".ul-container ul").animate({left: "-" + 655 * this.active});
	    	return this;
	    }
	};
	
	
	$.fn.galleryBen = function(method) {
	  
		// логика вызова метода
		if ( methods[method] ) {
			return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Метод с именем ' +  method + ' не существует для jQuery.tooltip' );
		}
	
	};
})( jQuery );

(function( $ ){
	var methods = {
		
		count : 0,
		active : 0,
			
	    init : function() {
	    	var self = this;
	    	
	    	this.find(".left-arrow").on("click", function(data) {
	    		methods.prev.apply( self, Array.prototype.slice.call( arguments, 1 ))
	    	});
	    	
	    	this.find(".right-arrow").on("click", function(data) {
	    		methods.next.apply( self, Array.prototype.slice.call( arguments, 1 ))
	    	});
	    	
	    	this.count = this.find(".ul-container ul li").length; 
	    	this.active = 0; 
	    	return this;
	    },
	    next : function() {
			if (this.active != this.count - 1)
				this.active++;
			else 
				this.active = 0;

			return methods.click_paginat.apply( this, Array.prototype.slice.call( arguments, 1 ));
	    },
	    prev : function() {
	    	if (this.active != 0)
				this.active--;
			else 
				this.active = this.count - 1;

	    	methods.click_paginat.apply( this, Array.prototype.slice.call( arguments, 1 ))
	    },
	    click_paginat : function() {
	    	this.find(".paginat ul li").removeClass("active");
	    	this.find(".paginat ul li").eq(this.active).addClass("active");
	    	this.find(".ul-container ul").animate({left: "-" + 665 * this.active});
	    	return this;
	    }
	};
	
	
	$.fn.galleryTeam = function(method) {
	  
		// логика вызова метода
		if ( methods[method] ) {
			return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Метод с именем ' +  method + ' не существует для jQuery.tooltip' );
		}
	
	};
})( jQuery );

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
		var call = item.find(".call").html();
		var text = item.find(".text").html();
		var img = "/data/menu/dish/440x452/" + $(this).attr("rel") + ".jpg";
		var id = item.find(".dishId").val();
		
		$('#dishModal').find(".name").html(name);
		$('#dishModal').find(".price").html(price);
		$('#dishModal').find(".weight").html(weight);
		$('#dishModal').find(".call").html(call);
		$('#dishModal').find(".text").html(text);
		$('#dishModal').find(".img-container img").attr("src", img);
		$('#dishModal').find(".dishId").val(id);
		
		$('#dishModal').modal('show');
		
		return false;
	})
	
	
	$(".gallery-team").galleryTeam();
	$(".gallery-ben").galleryBen();
	
	
	
	/* фома заказа*/
	
	$('#show-order-form').on("click", function() {
		if ($.cookie('cart') !== undefined) {
			var dishes = JSON.parse($.cookie('cart'));
			
			if(dishes.length > 0)
				$('#orderModal').modal('show');
			else 
				alert("Корзина пуста!");
		} else 
			alert("Корзина пуста!");
	})
	
	var orderModelStep1 = function() {
		$('#order-modal-header-step-3').removeClass("black").addClass("white");
		$('#order-modal-header-step-2').removeClass("black").addClass("white");
		$('#order-modal-line-2').removeClass("black").addClass("white");
		$('#order-modal-content-step1').show();
		$('#order-modal-content-step2').hide();
		$('#order-modal-content-step3').hide();
	}
	
	var orderModelStep2 = function() {
		$('#order-modal-header-step-3').removeClass("black").addClass("white");
		$('#order-modal-header-step-2').removeClass("white").addClass("black");
		$('#order-modal-line-2').removeClass("white").addClass("black");
		$('#order-modal-content-step1').hide();
		$('#order-modal-content-step2').show();
		$('#order-modal-content-step3').hide();		
	}
	
	var orderModelStep3 = function() {
		$('#order-modal-header-step-3').removeClass("white").addClass("black");
		$('#order-modal-content-step1').hide();
		$('#order-modal-content-step2').hide();
		$('#order-modal-content-step3').show();
	}
	
	$('.order-modal-go-to-step-1').on("click", function() {
		orderModelStep1();
	})
	
	$('.order-modal-go-to-step-2').on("click", function() {
		orderModelStep2();
	})
	
	$('.order-modal-go-to-step-3').on("click", function() {
		if (submitOrder())
			orderModelStep3();
	})
	
	$("#orderPhone").inputmask({"mask": "+7 (999) 999-99-99"});
	$("#orderPorch, #orderFloor, #orderPersonCount").inputmask({"mask": "99", "placeholder" : " "});
	$("#orderApartment").inputmask({"mask": "999", "placeholder" : " "});
	
	$("#orderOddMOney").inputmask({"mask": "99999", "placeholder" : " "});
	$("#orderDate").inputmask({"mask": "d.m.y"});
	$("#orderHour").inputmask({"mask": "h", "placeholder" : " "});
	$("#orderMin").inputmask({"mask": "s", "placeholder" : " "});

	var submitOrder = function() {
		
		var form = $("#order-modal-content-step2 form");
		
		var serializeData = form.serializeArray();
		
		var data = [];
		for(var i = 0; i < serializeData.length; i++) {
			data[serializeData[i].name] = serializeData[i].value;
		}
		
		if(!$("#orderPhone").inputmask("isComplete")){
			alert("Необходимо указать номер телефона!");
			return false;
	    }
		
		if (data['Order[deviliry]'] == 2) {
			if (data['Order[street]'] === "") {
				alert("Необходимо указать улицу!");
				return false;
			}
			
			if (data['Order[house]'] === "") {
				alert("Необходимо указать дом!");
				return false;
			}
			
			if(data['Order[apartment]'] === ""){
				alert("Необходимо указать квартиру!");
				return false;
			}
		}
		
		var dishes = $.cookie('cart');
		
		serializeData.push({name : 'Order[dishes]', value : dishes});
		
		$.ajax({
			url : '/menu/submitOrder/',
			dataType : 'json',
			type : 'POST',
			cache : false,
			data : serializeData,
			success : function(response) {
				
			}
		})
		
		$.removeCookie('cart', { path: '/' });
		form[0].reset();
		
		return true;
	}
	
	/* фома заказа end*/
	
	$(".call-me-show").on("click", function() {
		$('#callMeModal').modal('show');
	})
	
	$("#call-me-phone, #review-phone").inputmask({"mask": "+7 (999) 999-99-99"});
	
	$("#call-me-submit").on("click", function() {
		if(!$("#call-me-phone").inputmask("isComplete")){
			return false;
	    }
		var self = $(this)
		
		$.ajax({
			url: '/site/callMeSubmit/',
			dataType: 'json',
			type: 'POST',
			data: {'name' : $("#call-me-name").val(), 'phone' : $("#call-me-phone").val(), 'comment' : $("#call-me-comment").val()},
			success: function(response) {
				$('#callMeModal').modal('hide');
				self.parent()[0].reset();
			}
			
		})
	})
	
	$("#review-email").inputmask('Regex', { regex: "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}" });
	
	$("#review-submit").on("click", function() {
		
		var email = $("#review-email").val();
		var name = $("#review-name").val();
		var phone = $("#review-phone").val();
		var text = $("#review-text").val();
		var type = $("#review-type").val();
		regex = new RegExp('[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}');

		if(!regex.test(email)){
			return false;
	    }
		var self = $(this)

		$.ajax({
			url: '/review/submit/',
			dataType: 'json',
			type: 'POST',
			data: {'name' : name, 
				'phone' : phone,
				'email' : email,
				'text' : text,
				'type' : type,
				},
			success: function(response) {
				self.parent()[0].reset();
				alert('Ваш отзыв отправлен!');
			}
			
		})
	})
	
	$("#search-button").on("click", function() {
		var q = $("#search-input").val();
		if (q.length != 0) {
			document.location = '/search/?q=' + q;
		}
	})
	
	$("#deviliry1").on("change", function() {
		$("#order-add-block").hide();
	})
	
	$("#deviliry2").on("change", function() {
		$("#order-add-block").show();		
	})
	
	$("#dateType1").on("change", function() {
		$("#order-time-block").hide();
	})
	
	$("#dateType2").on("change", function() {
		$("#order-time-block").show();		
	})
	
	$(document).on("click", ".dish-cart-count", function() {
		$(".dish-cart-count-list").hide();
		$(this).parent().find(".dish-cart-count-list").show();
	})
	
	$(document).on("click", ".dish-cart-count-list li", function() {
		$(this).parent().parent().find(".dish-cart-count").val($(this).html());
		$(this).parent().parent().find(".dish-cart-count").change();
		$(this).parent().hide();
	})
	
})

