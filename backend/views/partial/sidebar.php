<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->        
	<ul class="page-sidebar-menu">
		<li>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::DESKTOP_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="/">
				<i class="icon-home"></i> 
				<span class="title">Главная</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php if(Yii::app()->user->checkAccess('Menu.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::MENU_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('menu/index') ?>">
				<i class="icon-reorder"></i> 
				<span class="title">Меню</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('Access.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::ACCESS_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('access/index') ?>">
				<i class="icon-key"></i> 
				<span class="title">Права доступа</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('Action.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::ACTION_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('action/index') ?>">
				<i class="icon-bullhorn"></i> 
				<span class="title">Акции</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('News.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::NEWS_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('news/index') ?>">
				<i class="icon-coffee"></i> 
				<span class="title">Новости</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('Pages.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::PAGES_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('pages/index') ?>">
				<i class="icon-coffee"></i>
				<span class="title">Типовые страницы</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('Team.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::TEAM_MENU_GALLERY])
											|| !empty($this->menuActiveItems[BController::TEAM_MENU_WORKER])
											|| !empty($this->menuActiveItems[BController::TEAM_MENU_JOB])
											|| !empty($this->menuActiveItems[BController::TEAM_MENU_RESUME])
									) { echo 'active'; } ?>">
			<a href="javascript: ;">
				<i class="icon-flag"></i>
				<span class="title">Наша команда</span>
				<span class="selected"></span>
				<span class="arrow <?php if (!empty($this->menuActiveItems[BController::TEAM_MENU_GALLERY])
											|| !empty($this->menuActiveItems[BController::TEAM_MENU_WORKER])
											|| !empty($this->menuActiveItems[BController::TEAM_MENU_JOB])
											|| !empty($this->menuActiveItems[BController::TEAM_MENU_RESUME])
									) { echo 'open'; } ?>"></span>
			</a>
			<ul class="sub-menu" <?php if (empty($this->menuActiveItems[BController::TEAM_MENU_GALLERY])
											&& empty($this->menuActiveItems[BController::TEAM_MENU_WORKER])
											&& empty($this->menuActiveItems[BController::TEAM_MENU_JOB])
											&& empty($this->menuActiveItems[BController::TEAM_MENU_RESUME])
									) { echo 'style="display:none;"'; } ?>>
				<li class="<?php if (!empty($this->menuActiveItems[BController::TEAM_MENU_GALLERY])) { echo 'active'; } ?>">
					<a href="<?php echo $this->createUrl('team/gallery') ?>">Галерея</a>
				</li>
				<li  class="<?php if (!empty($this->menuActiveItems[BController::TEAM_MENU_WORKER])) { echo 'active'; } ?>">
					<a href="<?php echo $this->createUrl('team/worker') ?>">Сотрудники</a>
				</li>
				<li class="<?php if (!empty($this->menuActiveItems[BController::TEAM_MENU_JOB])) { echo 'active'; } ?>">
					<a href="<?php echo $this->createUrl('team/job') ?>">Вакансии</a>
				</li>
				<li  class="<?php if (!empty($this->menuActiveItems[BController::TEAM_MENU_RESUME])) { echo 'active'; } ?>">
					<a href="<?php echo $this->createUrl('team/resume') ?>">Анкеты</a>
				</li>
			</ul>
		</li>
		<?php endif;?>
		
		<?php if(Yii::app()->user->checkAccess('About.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::ABOUT_RESTAURANT_MENU_ITEM])
											|| !empty($this->menuActiveItems[BController::ABOUT_FILIAL_MENU_ITEM])
									) { echo 'active'; } ?>">
			<a href="javascript: ;">
				<i class="icon-flag"></i>
				<span class="title">О ресторане</span>
				<span class="selected"></span>
				<span class="arrow <?php if (!empty($this->menuActiveItems[BController::ABOUT_RESTAURANT_MENU_ITEM])
											|| !empty($this->menuActiveItems[BController::ABOUT_FILIAL_MENU_ITEM])
									) { echo 'open'; } ?>"></span>
			</a>
			<ul class="sub-menu" <?php if (empty($this->menuActiveItems[BController::ABOUT_RESTAURANT_MENU_ITEM])
											&& empty($this->menuActiveItems[BController::ABOUT_FILIAL_MENU_ITEM])
									) { echo 'style="display:none;"'; } ?>>
				<li class="<?php if (!empty($this->menuActiveItems[BController::ABOUT_RESTAURANT_MENU_ITEM])) { echo 'active'; } ?>">
					<a href="<?php echo $this->createUrl('about/') ?>">О ресторане</a>
				</li>
				<li  class="<?php if (!empty($this->menuActiveItems[BController::ABOUT_FILIAL_MENU_ITEM])) { echo 'active'; } ?>">
					<a href="<?php echo $this->createUrl('about/filials') ?>">Филиалы</a>
				</li>
			</ul>
		</li>
		<?php endif;?>
		
	</ul>
	<!-- END SIDEBAR MENU -->
</div>