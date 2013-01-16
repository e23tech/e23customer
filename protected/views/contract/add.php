<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contract-add-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="space">
        <div class="subtitle">合同录入</div>
		<div><?php echo $form->errorSummary($model); ?></div>
        <table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
            <tbody>
			<tr>
                <td width="20%" class="altbg1 right"><?php echo $form->labelEx($model,'contractno'); ?></td>
                <td width="*"><?php echo $form->textField($model,'contractno'); ?><?php echo $form->error($model,'contractno'); ?></td>
            </tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'customer'); ?></td>
				<td><?php echo $form->textField($model,'customer'); ?><?php echo $form->error($model,'customer'); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'datesign'); ?></td>
				<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,
					'attribute'=>'datesign',
					'options'=>array(
						'showAnim'=>'slideDown', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'focus', // 'focus', 'button', 'both'
						'changeMonth'=>true,
						'changeYear'=>true,
						'mode'=>'datetime',
						'dateFormat'=>'yy-mm-dd',
						'htmlOptions'=>array(
							'readonly'=>"readonly",
							'size'=>43,
							'value'=>(!empty($model->time))?(is_numeric($model->time))?date('Y-m-d',$model->time):$model->time:date('Y-m-d')),

					)));?><?php //echo $form->error($model, 'datesign'); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'money'); ?></td>
				<td><?php echo $form->textField($model, 'money'); ?><?php echo $form->error($model, 'money'); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'contact'); ?></td>
				<td><?php echo $form->textField($model, 'contact'); ?><?php echo $form->error($model, 'contact'); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'contact_phone'); ?></td>
				<td><?php echo $form->textField($model, 'contact_phone'); ?><?php echo $form->error($model, 'contact_phone'); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'contact_email'); ?></td>
				<td><?php echo $form->textField($model, 'contact_email'); ?><?php echo $form->error($model, 'contact_email'); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'datestart'); ?></td>
				<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,
					'attribute'=>'datestart',
					'options'=>array(
						'showAnim'=>'slideDown', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'focus', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
						'buttonImageOnly'=>true,
						'htmlOptions'=>array('readonly'=>"readonly"),
						'changeMonth'=>true,
						'changeYear'=>true,
						'mode'=>'datetime',
						'dateFormat'=>'yy-mm-dd',
						'htmlOptions'=>array(
							'size'=>43,
							'value'=>(!empty($model->time))?(is_numeric($model->time))?date('Y-m-d',$model->time):$model->time:date('Y-m-d'),
						),
					)));?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'dateend'); ?></td>
				<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,
					'attribute'=>'dateend',
					'options'=>array(
						'showAnim'=>'slideDown', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'focus', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
						'buttonImageOnly'=>true,
						'htmlOptions'=>array('readonly'=>"readonly"),
						'changeMonth'=>true,
						'changeYear'=>true,
						'mode'=>'datetime',
						'dateFormat'=>'yy-mm-dd',
						'htmlOptions'=>array(
							'size'=>43,
							'value'=>(!empty($model->time))?(is_numeric($model->time))?date('Y-m-d',$model->time):$model->time:date('Y-m-d'),
						),
					)));?></td>
			</tr>

			<?php
			if($nowUserRole == EC_USER || $nowUserRole == EC_DIRECTOR):
				echo $form->hiddenField($model, 'uid', array('value' => user()->id));
			else:
			?>
			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'uid'); ?></td>
				<td><?php echo $form->dropDownList($model, 'uid' , $uidList, array('data-placeholder'=>'请选择业务员', 'style'=>'width:140px;')); ?></td>
			</tr>
			<?php endif;?>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'gid'); ?></td>
				<td><?php echo $form->dropDownList($model, 'gid' , $gidList, array('data-placeholder'=>'请选择业务部门', 'style'=>'width:140px;')); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'datemoney'); ?></td>
				<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,
					'attribute'=>'datemoney',
					'options'=>array(
						'showAnim'=>'slideDown', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'focus', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
						'buttonImageOnly'=>true,
						'htmlOptions'=>array('readonly'=>"readonly"),
						'changeMonth'=>true,
						'changeYear'=>true,
						'mode'=>'datetime',
						'dateFormat'=>'yy-mm-dd',
						'htmlOptions'=>array(
							'size'=>43,
							'value'=>(!empty($model->time))?(is_numeric($model->time))?date('Y-m-d',$model->time):$model->time:date('Y-m-d'),
							),
					)));?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'note'); ?></td>
				<td><?php echo $form->textArea($model, 'note', array('rows' => '5')); ?><?php echo $form->error($model, 'note'); ?></td>
			</tr>
        </tbody></table>
    </div>
    <center><?php echo CHtml::submitButton('Submit', array('value' => '提 交', 'class' => 'btn')); ?></center>
<?php $this->endWidget(); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/resources/js/chosen.jquery.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/resources/css/chosen.css'); ?>
<script type="text/javascript">
$(function(){
	$('#Contract_gid').chosen({no_results_text: "没有该部门"});
<?php if($nowUserRole != EC_USER && $nowUserRole != EC_DIRECTOR):?>
	$('#Contract_uid').chosen({no_results_text: "没有该业务员"});
<?php endif;?>
});
</script>