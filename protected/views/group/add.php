<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-add-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="space">
	<div class="subtitle">新部门录入</div>
	<div><?php echo $form->errorSummary($model); ?></div>

	<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
		<tr>
			<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'group'); ?></td>
			<td width="*"><?php echo $form->textField($model,'group'); ?><?php echo $form->error($model,'group'); ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'note'); ?></td>
			<td width="*"><?php echo $form->textArea($model,'note', array('rows' => '5')); ?><?php echo $form->error($model,'note'); ?></td>
		</tr>
	</table>
</div>
<center><?php echo CHtml::submitButton('Submit', array('value' => '提 交', 'class' => 'btn')); ?></center>
<?php $this->endWidget(); ?>
