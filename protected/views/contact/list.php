<div class="space">
	<div class="subtitle">联系人列表</div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" trmouse="Y">
		<tr class="altbg1">
			<td width="45">coid</td>
			<td width="200">联系人</td>
			<td width="150">职务</td>
			<td width="200">公司</td>
			<td width="150">电话</td>
			<td width="150">邮箱</td>
			<td width="*">操作</td>
		</tr>
		<?php foreach($coList as $contact): ?>
		<tr>
			<td><?php echo $contact['coid']; ?></td>
			<td><?php echo $contact['contact']; ?></td>
			<td><?php echo $contact['rank']; ?></td>
			<td><?php echo $contact->company->customer; ?></td>
			<td><?php echo $contact['telephone']; ?></td>
			<td><?php echo $contact['email']; ?></td>
			<td>
				[<a href="<?php echo url('contact/view/coid/' . $contact['coid']); ?>">详情</a>]
				[<a href="<?php echo url('contact/edit/coid/' . $contact['coid']); ?>">编辑</a>]
				[<a href="<?php echo url('contact/delete/coid/' . $contact['coid']); ?>" onclick="return confirm('是否将此信息删除?')">删除</a>]
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