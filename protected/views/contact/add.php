<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-add-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="space">
	<div class="subtitle">联系人录入</div>
	<div><?php echo $form->errorSummary($model); ?></div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
		<tr>
			<td width="20%" class="altbg1"><?php echo $form->labelEx($model,'contact'); ?></td>
			<td width="*"><?php echo $form->textField($model,'contact'); ?><?php echo $form->error($model,'contact'); ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1"><?php echo $form->labelEx($model,'cuid'); ?></td>
			<td width="*"><?php echo $form->textField($model,'cuid'); ?><?php echo $form->error($model,'cuid'); ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1"><?php echo $form->labelEx($model,'telephone'); ?></td>
			<td width="*"><?php echo $form->textField($model,'telephone'); ?><?php echo $form->error($model,'telephone'); ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1"><?php echo $form->labelEx($model,'type'); ?></td>
			<td width="*"><?php echo $form->textField($model,'type'); ?><?php echo $form->error($model,'type'); ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1"><?php echo $form->labelEx($model,'email'); ?></td>
			<td width="*"><?php echo $form->textField($model,'email'); ?><?php echo $form->error($model,'email'); ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1"><?php echo $form->labelEx($model,'note'); ?></td>
			<td width="*"><?php echo $form->textArea($model,'note', array('rows' => '5')); ?><?php echo $form->error($model,'note'); ?></td>
		</tr>
	</table>
</div>
<center><?php echo CHtml::submitButton('Submit', array('value' => '提 交')); ?></center>

<?php $this->endWidget(); ?>

</div><!-- form -->