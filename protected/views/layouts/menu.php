<?php $this->beginContent('//layouts/main'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/resources/css/treeview.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/treeview.js"></script>
<div class="tvborder">
	<ul id="left_menu" class="filetree treeview">
	<?php echo $content; ?>
	</ul>
</div>
<?php $this->endContent();?>