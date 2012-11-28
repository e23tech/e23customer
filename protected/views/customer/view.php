<div class="space">
		<div class="subtitle">客户查看</div>
		<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
			<tr>
				<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'customer'); ?></td>
				<td width="*"><?php echo CHtml::encode($model['customer']); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'type'); ?></td>
				<td><?php echo CHtml::encode(Yii::app()->params['customerType'][$model['type']]); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'telephone'); ?></td>
				<td><?php echo CHtml::encode($model['telephone']); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'address'); ?></td>
				<td><?php echo CHtml::encode($model['address']); ?></td>
			</tr>

			<tr>
				<td class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'note'); ?></td>
				<td><?php echo CHtml::encode($model['note']); ?></td>
			</tr>

			<tr>
				<td colspan="2"><center>[<a href="<?php echo url('contact/list/cuid/' . $model['cuid']); ?>">查看联系人</a>] [<a href="<?php echo url('customer/edit/cuid/' . $model['cuid']); ?>">编辑</a>]</center></td>
			</tr>

		</table>
	</div>

