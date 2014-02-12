<div class="banner-block">
	<div class="left">
		<div class="delivery-icon"></div>
		<div class="delivery">ДОСТАВКА</div>
		<div class="phone"><?php echo $this->site->phone?></div>
		<div class="more-info">
			<a href="/delivery/">Узнать подробнее>></a>
		</div>
		<div class="call-me">
			<div class="call-me-icon call-me-show"></div>
			<a href="javascript: void(0);" class="call-me-show">
				Заказать звонок
			</a>
		</div>
	</div>
	<div class="right">
		<div class="gallery-ben">
			<div class="ul-container">
				<ul>
					<?php foreach($mainGallery->images AS $key => $val) :?>
					<li><img src="<?php echo $mainGallery->ImagesUrl."655x346/".$val?>"></li>
					<?php endforeach;?>
				</ul>
			</div>
			<div class="paginat" style="width:<?php echo count($mainGallery->images) * 15?>px">
				<ul>
					<?php foreach($mainGallery->images AS $key => $val) :?>
						<li <?php if ($key == 0) :?>class="active"<?php endif;?> rel="<?php echo $key?>"></li>
					<?php endforeach;?>
					
				</ul>
			</div>
			
			<div class="corner tl"></div>
			<div class="corner tr"></div>
			<div class="corner br"></div>
			<div class="corner bl"></div>
		</div>
	
	</div>
</div>
<?php echo $newsMainBlock; ?>
<div class="wave-biege white"></div>
<div class="review-block">
	<div class="review-block-content white">
		<div class="h2"><span>Разочарованный гость</span></div>
		<div class="review-headline">
			Уважаемый клиент!
		</div>
		<div class="review-text">
			<p>
				Нам очень важно Ваше мнение!Отрицательный отзыв для нас (и для нашей компании) гораздо важнее, чем благодарственное письмо (но мы искренне рады и им!).Ведь благодаря отрицательным отзывам мы сможем улучшать наши услуги и наш сервис.<br>
				Ситуации могут быть разными… Если вы не смогли получить нужную помощь от наших сотрудников, если они не выдерживают сроки, если вы чем-то недовольны, то мы обязательно разберёмся и поможем.</p>
			<p>
				Спасибо за ваши предложения!
			</p>
			<p>
				ПОЖАЛУЙСТА, ЗАПОЛНИТЕ ПОЛЯ ФОРМЫ ЗАПРОСА:
			</p>
		</div>
		<form class="review-form-block">
			<input type="hidden" id="review-type" value="2">
			<input type="text" id="review-name" class="input-text input-280" placeholder="Ваше имя">
			<input type="text" id="review-phone" class="input-text input-280" placeholder="Телефон">
			<input type="text" id="review-email" class="input-text input-280" placeholder="*Email">
			<textarea id="review-text" placeholder="Комментарии" class="textarea textarea-280"></textarea>
			<p class="note">Поля, помеченные*, обязательны для заполнения.</p>
			<div id="review-submit" class="submit-button"></div>
		</form>
				
	</div>
</div>

<div class="wave-white"></div>