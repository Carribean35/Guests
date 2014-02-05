<?php
/* @var $this SiteController */

$this->title_h3='Рабочий стол';

$this->breadcrumbs=array(
);

$this->menuActiveItems[BController::DESKTOP_MENU_ITEM] = 1;

Yii::app()->assetManager->publish(
	Yii::getPathOfAlias('webroot').'/plugins/fancybox/source/'
);

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/fancybox/source/jquery.fancybox.pack.js'
	),
	CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-fileupload/bootstrap-fileupload.js'
	),
	CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/scripts/gallery.js'
	),
	CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/fancybox/source/jquery.fancybox.css'
	),
	'',
	CClientScript::POS_END
);
Yii::app()->clientScript->registerCssFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-fileupload/bootstrap-fileupload.css'
	),
	'',
	CClientScript::POS_END
);



?>


<div class="portlet box blue main-gallery">
	<div class="portlet-title">
		<div class="caption"><i class="icon-picture"></i>Баннеры</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a>
		</div>
	</div>
	<div class="portlet-body">
		

		<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
	

			<div data-provides="fileupload" class="fileupload fileupload-new pull-left">
				<span class="btn btn-file">
				<span class="fileupload-new">Select file</span>
				<span class="fileupload-exists">Change</span>
				<?php echo CHtml::activeFileField($mainGallery, 'image'); ?>
				</span>
				<span class="fileupload-preview"></span>
				<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#"></a>
			</div>
			
			<?php echo CHtml::htmlButton('<i class="icon-plus"></i> Добавить', array('class' => 'btn blue', 'type' => 'submit', 'style' => 'margin-left: 20px')); ?>
		<?php echo CHtml::endForm(); ?>
	
		<div class="row-fluid">
			<?php foreach ($mainGallery->images AS $image) { ?>
			<div class="span3">
				<div class="item">
					<a href="<?php echo $mainGallery->ImagesUrl."655x346/".$image?>" title="Photo" data-rel="fancybox-button" class="fancybox-button">
						<div class="zoom">
							<?php echo CHtml::image($mainGallery->ImagesUrl."655x346/".$image);?>
							<div class="zoom-icon"></div>
						</div>
					</a>
					<div class="details">
						<a class="icon remove" href="#" rel="<?php echo $image;?>"><i class="icon-remove"></i></a>    
					</div>
				</div>
			</div>
			<?php }?>
		</div>
		
		
	
	</div>
</div>




<script type="text/javascript">
	$(document).ready(function() {
		Gallery.init();

		$(".details .remove").on("click", function() {
			if (confirm("Вы действительно хотите удалить это изображение?")) {
				var name = $(this).attr("rel");
				
				$.ajax({
					type: "POST",
					url : '/site/deleteMainGallery/',
					data : {'name' : name},
					success : function(response) {
 						window.location.reload();
					}
				});
			}
		});
	})
</script>