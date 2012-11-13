<div class="space">
	<div class="subtitle">用户信息</div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" id="config1">
		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabel($model,'username'); ?></td>
			<td width="*"><?php echo $model->username; ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabel($model,'gid'); ?></td>
			<td width="*"><?php echo $model->group['group']; ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabel($model,'realname'); ?></td>
			<td width="*"><?php echo $model->realname; ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabel($model,'role'); ?></td>
			<td width="*"><?php echo $model->role; ?></td>
		</tr>

		<tr>
			<td width="20%" class="altbg1 right"><?php echo CHtml::activeLabel($model,'note'); ?></td>
			<td width="*"><?php echo $model->note; ?></td>
		</tr>
	</table>
</div>
