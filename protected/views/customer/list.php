<div class="space">
	<div class="subtitle">客户列表</div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" trmouse="Y">
		<tr class="altbg1">
			<td width="45" align="center">ID</td>
			<td width="250">公司名称</td>
			<td width="100">客户类型</td>
			<td width="150">电话</td>
			<td width="*">客户地址</td>
			<td width="150">联系人</td>
			<td width="150">操作</td>
		</tr>
		<?php foreach($cuList as $customer): ?>
		<tr>
			<td align="center"><?php echo $customer['cuid']; ?></td>
			<td><?php echo $customer['customer']; ?></td>
			<td><?php echo Yii::app()->params['customerType'][$customer['type']]; ?></td>
			<td><?php echo $customer['telephone']; ?></td>
			<td><?php echo $customer['address']; ?></td>
			<td>
				[<a href="<?php echo url('contact/list/cuid/' . $customer['cuid']); ?>">查看</a>]
				[<a href="<?php echo url('contact/add/cuid/' . $customer['cuid']); ?>">添加</a>]
			</td>
			<td>
				[<a href="<?php echo url('customer/view/cuid/' . $customer['cuid']); ?>">详情</a>]
				[<a href="<?php echo url('customer/edit/cuid/' . $customer['cuid']); ?>">编辑</a>]
				[<a href="<?php echo url('customer/delete/cuid/' . $customer['cuid']); ?>" onclick="return confirm('是否将此信息删除?')">删除</a>]
			</td>
		</tr>
		<?php endforeach;?>
		<?php $this->widget('CLinkPager',array(
		'header'=>'',
		'firstPageLabel' => '首页',
		'lastPageLabel' => '末页',
		'prevPageLabel' => '上一页',
		'nextPageLabel' => '下一页',
		'pages' => $pages,
		'maxButtonCount'=>13
	));?>
	</table>

</div>
