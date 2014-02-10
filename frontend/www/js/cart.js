$(document).ready(function() {
	// Class to represent a row in the seat reservations grid
	function Goods(id, name, price, text, count) {
		var self = this;
		
		self.id = id;
		self.name = name;
		self.price = price;
		self.count = ko.observable(count);
		self.hiddenCount = count;
		self.text = text;
		
		self.fullPrice = ko.computed(function() {
			return self.price * self.count();
		})
		
		self.fullName = ko.computed(function() {
			return self.name + " " + parseInt(self.count()) + "шт.";			
		})
		
		self.img = ko.computed(function() {
			return "/data/menu/dish/199x129/" + self.id + ".jpg";			
		})
	}
	
	// Overall viewmodel for this screen, along with initial state
	function CartViewModel() {
	    var self = this;
	
	    // Editable data
	    self.cartItems = ko.observableArray([]);
	    
	    self.load = function() {
	    	if ($.cookie('cart') !== undefined) {
	    		var goods = JSON.parse($.cookie('cart'));
	    		for (var i = 0; i < goods.length; i++) {
	    			self.cartItems.push(new Goods(goods[i].id, goods[i].name, goods[i].price, goods[i].text, goods[i].hiddenCount));
	    		}
	    	}
	    }
	    
	    self.load();
	    
	    self.save = function() {
	    	var jsonCart = JSON.stringify(self.cartItems());
	    	$.cookie('cart', jsonCart, { path: '/' });
	    }
	    
	    self.addGoods = function(id, name, price, text, count) {
	        self.cartItems.push(new Goods(id, name, price, text, count));
	        self.save();
	    }
	    
	    self.removeGoods = function(goods) {
	    	self.cartItems.remove(goods);
	    	self.save();
	    }
	    
	    self.totalPrice = ko.computed(function() {
	       var total = 0;
	       for (var i = 0; i < self.cartItems().length; i++)
	           total += self.cartItems()[i].fullPrice();
	       return total;
	    });
	    
	    self.afterRenderFunction = function(data) {
	    	var element = $(data[1]);
	    	element.find(".dish-cart-count").inputmask({"mask": "99", "placeholder" : " "});
	    }
	    
	}
	
	ko.applyBindings(new CartViewModel());
});