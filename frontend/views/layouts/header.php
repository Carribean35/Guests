<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script type="text/javascript" src="/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/scripts.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="/css/style.css" type="text/css" />
	<link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
</head>

<body>
	<div class="header">
		<div class="site-menu-block">
			<div class="site-menu">
				<ul>
					<li>
						<a href="javascript:void(0);" id="showSubmenu">МЕНЮ</a>
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
		<?php echo $this->dropdownMenu?>
		<div class="logo">
			<a href="/">
				<img src="/img/logo.png">
			</a>
		</div>
		
		<div class="private-office">
			<a href="#">Личный кабинет</a>
		</div>