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
	
	
	$(".gallery-team").galleryTeam();
	$(".gallery-ben").galleryBen();
	
	
	
})

