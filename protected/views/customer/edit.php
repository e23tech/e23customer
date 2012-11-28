<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-edit-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="space">
		<div class="subtitle">客户编辑</div>
		<div><?php echo $form->errorSummary($model); ?></div>
		<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'customer'); ?></td>
				<td width="*"><?php echo $form->textField($model,'customer'); ?><?php echo $form->error($model,'customer'); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'type'); ?></td>
				<td width="*"><?php echo $form->dropDownList($model,'type', Yii::app()->params['customerType']); ?><?php echo $form->error($model,'type'); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'telephone'); ?></td>
				<td width="*"><?php echo $form->textField($model,'telephone'); ?><?php echo $form->error($model,'telephone'); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'address'); ?></td>
				<td width="*"><?php echo $form->textField($model,'address'); ?><?php echo $form->error($model,'address'); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'note'); ?></td>
				<td width="*"><?php echo $form->textArea($model,'note', array('rows' => '5')); ?><?php echo $form->error($model,'note'); ?></td>
			</tr>
		</table>
	</div>
<center><?php echo CHtml::submitButton('Submit', array('value' => '提 交', 'class' => 'btn')); ?></center>
<?php $this->endWidget(); ?>
