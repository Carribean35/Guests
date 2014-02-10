	</div><!-- .wrapper -->
	<div class="footer">
		<div class="footer-menu">
			<ul>
				<li><a href="/menu/">Меню</a></li>
				<li><a href="/about/">О ресторане</a></li>
				<li><a href="/delivery/">Доставка</a></li>
				<li><a href="/news/">Все интересное</a></li>
				<li><a href="/team/">Наша команда</a></li>
				<li><a href="#">Поставщикам</a></li>
				<li><a href="/bonus/">Бонусы</a></li>
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="footer-content">
			<div class="sotsseti-block">
				<div class="sotsseti-block-headline">Мы в соцсетях:</div>
				<div class="sotsseti-block-links">
					<a href="<?php echo $this->site->vkLink?>" target="_blank" class="sotseti-icon vk"></a>
					<a href="<?php echo $this->site->facebookLink?>" target="_blank" class="sotseti-icon facebook"></a>
					<a href="<?php echo $this->site->instakLink?>" target="_blank" class="sotseti-icon instagramm"></a>
					<a href="<?php echo $this->site->foursquareLink?>" target="_blank" class="sotseti-icon foursquare"></a>
					<a href="<?php echo $this->site->twitterLink?>" target="_blank" class="sotseti-icon twitter"></a>
				</div>
			</div>
			<div class="addr-block">
				<div class="addr-block-headline">Адреса ресторанов:</div>
				<div class="addr-block-addr">
					ул. Цюрюпы, 12
				</div>
				<div class="addr-block-addr">
					ул. С.Перовской, 42
				</div>
				<div class="clear addr-block-addr-phone"><?php echo $this->site->phone?></div>
			</div>
			<div class="smile-block">
				<a href="#" class="good smile">Благодарность</a>
				<a href="#" class="bad smile">Жалоба</a>
				<a href="#" class="offer smile">Предложение</a>
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer-copyright">
			2012 © Рестораны на каждый день ­«Гости»
		</div>
	</div><!-- .footer -->
	
	<?php $this->renderPartial("//menu/orderModal")?>

</body>
</html>