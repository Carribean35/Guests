	</div><!-- .wrapper -->
	<div class="footer">
		<div class="footer-menu">
			<ul>
				<li><a href="/menu/">Меню</a></li>
				<li><a href="/about/">О ресторане</a></li>
				<li><a href="/delivery/">Доставка</a></li>
				<li><a href="/news/">Все интересное</a></li>
				<li><a href="/team/">Наша команда</a></li>
				<li><a href="/partner/">Поставщикам</a></li>
				<li><a href="/bonus/">Бонусы</a></li>
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="footer-content">
			<div class="sotsseti-block">
				<div class="sotsseti-block-headline">Мы в соцсетях:</div>
				<div class="sotsseti-block-links">
					<?php if (!empty($this->site->vkLink)) :?>
						<a href="<?php echo $this->site->vkLink?>" target="_blank" class="sotseti-icon vk"></a>
					<?php endif;?>
					<?php if (!empty($this->site->facebookLink)) :?>
						<a href="<?php echo $this->site->facebookLink?>" target="_blank" class="sotseti-icon facebook"></a>
					<?php endif;?>
					<?php if (!empty($this->site->instakLink)) :?>
						<a href="<?php echo $this->site->instakLink?>" target="_blank" class="sotseti-icon instagramm"></a>
					<?php endif;?>
					<?php if (!empty($this->site->foursquareLink)) :?>
						<a href="<?php echo $this->site->foursquareLink?>" target="_blank" class="sotseti-icon foursquare"></a>
					<?php endif;?>
					<?php if (!empty($this->site->twitterLink)) :?>
						<a href="<?php echo $this->site->twitterLink?>" target="_blank" class="sotseti-icon twitter"></a>
					<?php endif;?>
				</div>
			</div>
			<div class="addr-block">
				<div class="addr-block-headline">Адреса ресторанов:</div>
				<div class="addr-block-addr">
					ул. Цюрупы, 12
				</div>
				<div class="addr-block-addr">
					ул. С.Перовской, 42
				</div>
				<div class="clear"></div>
				<div class="addr-block-addr-phone-note">Наш единый номер телефона</div>
				<div class="addr-block-addr-phone"><?php echo $this->site->phone?></div>
			</div>
			<div class="smile-block">
				<a href="/review/good/" class="good smile">Довольный гость</a>
				<a href="/review/bad/" class="bad smile">Разочарованный гость</a>
				<a href="/review/notice/" class="offer smile">Предложение</a>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="footer-copyright">
			2012 © Рестораны на каждый день ­«Гости»
			<div class="footer-build">Разработано в <a href="http://www.vector-web.ru/">Вектор Web</a></div>
		</div>
	</div><!-- .footer -->
	
	<?php $this->renderPartial("//menu/orderModal")?>
	
	<?php $this->renderPartial("//site/callMeModal")?>
	
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	(function (d, w, c) {
	    (w[c] = w[c] || []).push(function() {
	        try {
	            w.yaCounter24109060 = new Ya.Metrika({id:24109060,
	                    clickmap:true,
	                    trackLinks:true,
	                    accurateTrackBounce:true});
	        } catch(e) { }
	    });
	
	    var n = d.getElementsByTagName("script")[0],
	        s = d.createElement("script"),
	        f = function () { n.parentNode.insertBefore(s, n); };
	    s.type = "text/javascript";
	    s.async = true;
	    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
	
	    if (w.opera == "[object Opera]") {
	        d.addEventListener("DOMContentLoaded", f, false);
	    } else { f(); }
	})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="//mc.yandex.ru/watch/24109060" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->

</body>
</html>