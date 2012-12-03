<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-edit-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="space">
	<div class="subtitle">个人信息管理</div>
	<div><?php echo $form->errorSummary($model); ?></div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'username'); ?></td>
				<td width="*"><?php echo $form->textField($model,'username', array('disabled' => 'disabled')); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'password'); ?></td>
				<td width="*"><?php echo $form->textField($model,'password', array('value' => '')); ?>留空就是不修改</td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'realname'); ?></td>
				<td width="*"><?php echo $form->textField($model,'realname'); ?><?php echo $form->error($model,'realname'); ?></td>
			</tr>

			<?php if($this->isFounder(user()) && $model->username != user()->name):?>
			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'gid'); ?></td>
				<td width="*"><?php echo $form->dropDownList($model, 'gid' , $groupOption, array('data-placeholder'=>'请选择部门', 'style'=>'width:140px;')); ?></td>
			</tr>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'role'); ?></td>
				<td width="*"><?php echo $form->dropDownList($model, 'role' , $roleOption, array('data-placeholder'=>'请选择角色', 'style'=>'width:140px;')); ?></td>
			</tr>
			<?php endif;?>

			<tr>
				<td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'note'); ?></td>
				<td width="*"><?php echo $form->textArea($model,'note', array('rows' => '5')); ?><?php echo $form->error($model,'note'); ?></td>
			</tr>
		</table>
<center><?php echo CHtml::submitButton('Submit', array('value' => '提 交', 'class' => 'btn')); ?></center>
<?php $this->endWidget(); ?>
</div>
<?php if($this->isFounder(user())):?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/resources/js/chosen.jquery.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/resources/css/chosen.css'); ?>
<script type="text/javascript">
$(function(){
	$('#User_gid').chosen({no_results_text: "没有该部门"});
	$('#User_role').chosen({no_results_text: "没有该角色"});
});
</script>
<?php endif;?>