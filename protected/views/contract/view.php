<div class="space">
    <div class="subtitle">合同详情</div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabel($model,'contractno'); ?></td>
			<td width="*"><?php echo $model['contractno']; ?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'cuid'); ?></td>
			<td><?php echo $model->customer['customer']; ?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'datesign'); ?></td>
			<td><?php echo $model['datesign'] ?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'money'); ?></td>
			<td><?php echo $model['money']; ?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'coid'); ?></td>
			<td><?php echo $model->contact['contact']; ?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'datestart'); ?></td>
			<td><?php $model['datestart'];?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'dateend'); ?></td>
			<td><?php echo $model['dateend'];?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'uid'); ?></td>
			<td><?php echo $model->salesman['realname']; ?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'gid'); ?></td>
			<td><?php echo $model->group['group']; ?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'datemoney'); ?></td>
			<td><?php echo $model['datemoney'];?></td>
		</tr>

		<tr>
			<td class="altbg1 right" valign="top"><?php echo CHtml::activeLabel($model, 'note'); ?></td>
			<td><?php echo $model['note']; ?></td>
		</tr>
	</table>
</div>
