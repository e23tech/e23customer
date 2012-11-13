<div class="space">
	<h2>全局查询</h2>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'query-form',
	)); ?>
	<p>
		全公司，在
		<?php echo CHtml::dropDownList('query[year]', $year['select'], $year['list']); ?>
		年
		<?php echo CHtml::dropDownList('query[morq]', $morq['select'], $morq['list']); ?>
		的<select name="query[type]">
			<option value="datesign">签约</option>
			<option value="datemoney">回款</option>
		</select>情况查询。
		<?php echo CHtml::submitButton('Submit', array('value' => '查询')); ?>
	</p>
	<?php $this->endWidget();?>
</div>
<?php if($moneyall):?>
<div class="space">
	<h2>共计金额：<?php echo $moneyall;?>元</h2>
</div>
<?php endif;?>
<?php if(empty($cList)):?>
<div class="space">
	<h2>无结果</h2>
</div>
<?php else:?>
<div class="space">
	<div class="subtitle">合同列表</div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" trmouse="Y">
		<tr class="altbg1">
			<td width="45" align="center">ID</td>
			<td width="100">合同号</td>
			<td width="150">客户</td>
			<td width="100">联系人</td>
			<td width="100">业务员</td>
			<td width="100">合同金额(元)</td>
			<td width="200">合同时间</td>
		</tr>
		<?php foreach($cList as $contract): ?>
		<tr>
			<td align="center"><?php echo $contract['cid']; ?></td>
			<td><?php echo $contract['contractno']; ?></td>
			<td><?php echo $contract->customer['customer']; ?></td>
			<td><?php echo $contract->contact['contact']; ?></td>
			<td><?php echo $contract->salesman['realname']; ?></td>
			<td><?php echo $contract['money']; ?></td>
			<td><?php echo $contract['datestart']; ?> 至 <?php echo $contract['dateend']; ?></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
<?php endif;?>