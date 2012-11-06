<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-add-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="space">
		<div class="subtitle">联系人录入</div>
		<div><?php echo $form->errorSummary($model); ?></div>
		<?php echo $form->hiddenField($model, 'cuid', array('value' => $cuid)); ?>
		<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'contact'); ?></td>
				<td width="*"><?php echo $form->textField($model,'contact'); ?><?php echo $form->error($model,'contact'); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'rank'); ?></td>
				<td width="*"><?php echo $form->textField($model,'rank'); ?><?php echo $form->error($model,'rank'); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'telephone'); ?></td>
				<td width="*"><?php echo $form->textField($model,'telephone'); ?><?php echo $form->error($model,'telephone'); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'email'); ?></td>
				<td width="*"><?php echo $form->textField($model,'email'); ?><?php echo $form->error($model,'email'); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'note'); ?></td>
				<td width="*"><?php echo $form->textArea($model,'note', array('rows' => '5')); ?><?php echo $form->error($model,'note'); ?></td>
			</tr>
		</table>
	</div>
	<center><?php echo CHtml::submitButton('Submit', array('value' => '提 交', 'class' => 'btn')); ?></center>
<?php $this->endWidget(); ?>