<div class="space">
	<div class="subtitle">合同列表</div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" trmouse="Y">
		<tr class="altbg1">
			<td width="45" align="center">ID</td>
			<td width="200">部门</td>
			<td width="300">部门</td>
			<td width="200">操作</td>
		</tr>
		<?php foreach($group as $val): ?>
		<tr>
			<td align="center"><?php echo $val['gid']; ?></td>
			<td><?php echo $val['group']; ?></td>
			<td><?php echo $val['note']; ?></td>
			<td>
				[<a href="<?php echo url('group/edit/gid/' . $val['gid']); ?>">编辑</a>]
				[<a href="<?php echo url('group/delete/gid/' . $val['gid']); ?>" onclick="return confirm('是否将此信息删除?')">删除</a>]
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
