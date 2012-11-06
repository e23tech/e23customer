<div class="space">
	<div class="subtitle">联系人录入</div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'contact'); ?></td>
			<td width="*"><?php echo$model['contact']; ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'rank'); ?></td>
			<td width="*"><?php echo $model['rank']; ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'telephone'); ?></td>
			<td width="*"><?php echo $model['telephone']; ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'email'); ?></td>
			<td width="*"><?php echo $model['email']; ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabelEx($model,'note'); ?></td>
			<td width="*"><?php echo $model['note']; ?></td>
		</tr>
	</table>
</div>