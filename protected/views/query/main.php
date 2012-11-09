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
		的情况查询。
		<?php echo CHtml::submitButton('Submit', array('value' => '查询')); ?>
	</p>
	<?php $this->endWidget();?>
</div>
<div class="space">
</div>