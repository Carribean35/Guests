<div class="check">
	<div class="check-middle">
		<div class="check-top">
			<div class="check-headline">ВАШ ЗАКАЗ</div>
			<div class="order-list">
				<div class="border"></div>
				
				<div data-bind="foreach: cartItems">
					<div class="order-list-item">
						<div class="name" data-bind="text: fullName"></div>
						<div class="price">
							<b data-bind="text: fullPrice"></b> руб.
						</div>
						<div class="remove" data-bind="click: $root.removeGoods">X</div>
						<div class="clear"></div>
					</div>
				</div>
				
				<div class="order-list-item result">
					<div class="name">ИТОГО</div>
					<div class="price">
						<b data-bind="text: totalPrice()">500</b> руб.
					</div>
					<div class="clear"></div>
				</div>
				<div class="border"></div>
			</div>
			<div class="button-issue" id="show-order-form"></div>							
		</div>
	</div>
	<div class="check-bottom"></div>
</div>