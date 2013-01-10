<div class="space">
	<div class="subtitle">合同列表</div>
	<table class="maintable" border="0" cellspacing="0" cellpadding="0" trmouse="Y">
		<tr class="altbg1">
			<td width="45" align="center">ID</td>
			<td width="200">用户名</td>
			<td width="200">真实姓名</td>
			<td width="*">操作</td>
		</tr>
		<?php foreach($uList as $val): ?>
		<tr>
			<td align="center"><?php echo $val['uid']; ?></td>
			<td><?php echo $val['username']; ?></td>
			<td><?php echo $val['realname']; ?></td>
			<td>
				[<a href="<?php echo url('user/view/uid/' . $val['uid']); ?>">详情</a>]
				[<a href="<?php echo url('user/edit/uid/' . $val['uid']); ?>">编辑</a>]
				[<a href="<?php echo url('user/delete/uid/' . $val['uid']); ?>" onclick="return confirm('是否将此信息删除?')">删除</a>]
			</td>
		</tr>
		<?php endforeach;?>
        <tr class="altbg1">
			<td colspan="4" align="center">
                <?php $this->widget('CLinkPager',array(
                    'header'=>'',
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '末页',
                    'prevPageLabel' => '上一页',
                    'nextPageLabel' => '下一页',
                    'pages' => $pages,
                    'maxButtonCount'=>13
                ));?>
            </td>
		</tr>
	</table>
</div>
