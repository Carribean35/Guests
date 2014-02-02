<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="/css/style.css" type="text/css" />
</head>

<body>
	<div class="header">
		<div class="site-menu-block">
			<div class="site-menu">
				<ul>
					<li>
						<a href="#">МЕНЮ</a>
					</li>
					<li>
						<a href="#">О РЕСТОРАНЕ</a>
					</li>
					<li>
						<a href="#">ДОСТАВКА</a>
					</li>
					<li>
						<a href="/news/" class="<?php if (!empty($this->menuActiveItems[FController::NEWS_MENU_ITEM]) ||
															!empty($this->menuActiveItems[FController::ACTION_MENU_ITEM])) { echo 'active'; } ?>">ВСЕ ИНТЕРЕСНОЕ</a>
					</li><li>
						<a href="/team/" class="<?php if (!empty($this->menuActiveItems[FController::TEAM_MENU_ITEM])) { echo 'active'; } ?>">НАША КОМАНДА</a>
					</li><li>
						<a href="#">БОНУСЫ</a>
					</li>
					<li>
						<a href="#"></a>
					</li>
				</ul>
			</div>
			<div class="serach-block">
				<input type="text" placeholder="Поиск">
			</div>
		</div>
	</div><!-- .header-->
	<div class="wrapper">
		<div class="submenu">
			<div class="submenu-content">
				<div class="column column-1">
					<div class="submenu-item">
						<div class="headline"><a href="#">СУШИ</a></div>
						<div><a href="#">Нигири</a></div>
						<div><a href="#">Гункан</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">РОЛЛЫ</a></div>
						<div><a href="#">Традиционные</a></div>
						<div><a href="#">Теплые</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">САЛАТЫ</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">ЗАКУСКИ</a></div>
						<div><a href="#">Холодные</a></div>
						<div><a href="#">Горячие</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">СУПЫ</a></div>
					</div>
				</div>
				<div class="column column-2">
					<div class="submenu-item">
						<div class="headline"><a href="#">ПАСТА</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">ГОРЯЧЕЕ</a></div>
						<div><a href="#">Из риса</a></div>
						<div><a href="#">Из лапши</a></div>
						<div><a href="#">Из рыбы</a></div>
						<div><a href="#">Из мяса</a></div>
						<div><a href="#">Из птицы</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">ХЛЕБ</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">ДЕСЕРТЫ</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">ДЕТСКОЕ МЕНЮ</a></div>
					</div>
				</div>
				<div class="column column-3">
					<div class="submenu-item">
						<div class="headline"><a href="#">БИЗНЕС-ОБЕДЫ</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">НАПИТКИ</a></div>
						<div><a href="#">Газированные напитки</a></div>
						<div><a href="#">Минеральная вода</a></div>
						<div><a href="#">Соки</a></div>
					</div>
					<div class="submenu-item">
						<div class="headline"><a href="#">ВИННАЯ КАРТА</a></div>
						<div><a href="#">Пиво бутылочное</a></div>
						<div><a href="#">Саке</a></div>
						<div><a href="#">Домашнее вино</a></div>
						<div><a href="#">Красное вино</a></div>
						<div><a href="#">Белое вино</a></div>
						<div><a href="#">Игристые вина</a></div>
						<div><a href="#">Крепкий коктейль</a></div>
					</div>
				</div>
			</div>
			<div class="bottom-bg"></div>
		</div>
		<div class="logo">
			<a href="/">
				<img src="/img/logo.png">
			</a>
		</div>
		
		<div class="private-office">
			<a href="#">Личный кабинет</a>
		</div>