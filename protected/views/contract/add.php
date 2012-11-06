<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contract-contractform-form',
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
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'cuid'); ?></td>
				<td><?php echo $form->textField($model, 'cuid'); ?><?php echo $form->error($model, 'cuid'); ?></td>
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
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'coid'); ?></td>
				<td><?php echo $form->textField($model, 'coid'); ?><?php echo $form->error($model, 'coid'); ?></td>
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

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'uid'); ?></td>
				<td><?php echo $form->textField($model, 'uid'); ?><?php echo $form->error($model, 'uid'); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right" valign="top"><?php echo $form->labelEx($model, 'gid'); ?></td>
				<td><?php echo $form->textField($model, 'gid'); ?><?php echo $form->error($model, 'gid'); ?></td>
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