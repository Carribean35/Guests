<?php
/* @var $this AboutController */
/* @var $filialGallery FilialGallery */
/* @var $filial Filial */

$this->title_h3='Галерея';

$this->breadcrumbs=array(
	'О ресторане',
	'Филиалы' => $this->createUrl('about/filials'),
	'Ресторан на '.$filial->addressStreet => $this->createUrl('about/filialItem', array("id" => $filial->id)), 
	'Галерея'
);

$this->menuActiveItems[BController::ABOUT_FILIAL_MENU_ITEM] = 1;

$fancyboxPath = Yii::app()->assetManager->publish(
	Yii::getPathOfAlias('webroot').'/plugins/fancybox/source/'
);

Yii::app()->clientScript->registerScriptFile(
	$fancyboxPath.'/jquery.fancybox.pack.js',
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
	$fancyboxPath.'/jquery.fancybox.css',
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
<div class="main-gallery">
		<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
	

			<div data-provides="fileupload" class="fileupload fileupload-new pull-left">
				<span class="btn btn-file">
				<span class="fileupload-new">Select file</span>
				<span class="fileupload-exists">Change</span>
				<?php echo CHtml::activeFileField($filialGallery, 'image'); ?>
				</span>
				<span class="fileupload-preview"></span>
				<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#"></a>
			</div>
			
			<?php echo CHtml::htmlButton('<i class="icon-plus"></i> Добавить', array('class' => 'btn blue', 'type' => 'submit', 'style' => 'margin-left: 20px')); ?>
		<?php echo CHtml::endForm(); ?>
	
		<div class="row-fluid">
			<?php foreach ($filialGallery->images AS $image) { ?>
			<div class="span3">
				<div class="item">
					<a href="<?php echo $filialGallery->ImagesUrl."1000x600/".$filialGallery->id."/".$image?>" title="Photo" data-rel="fancybox-button" class="fancybox-button">
						<div class="zoom">
							<?php echo CHtml::image($filialGallery->ImagesUrl."1000x600/".$filialGallery->id."/".$image);?>
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

<script type="text/javascript">
	$(document).ready(function() {
		Gallery.init();

		$(".details .remove").on("click", function() {
			if (confirm("Вы действительно хотите удалить это изображение?")) {
				var name = $(this).attr("rel");
				
				$.ajax({
					type: "POST",
					url : '/about/deletePhotoFilialGallery/',
					data : {'name' : name, 'id' : <?php echo $filialGallery->id?>},
					success : function(response) {
 						window.location.reload();
					}
				});
			}
		});
	})
</script>