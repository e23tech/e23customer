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
			<td width="50">回款情况</td>
			<td width="*">操作</td>
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
			<td><?php echo $contract['datemoney'] == 0 ? '未回款' : '已回款'; ?></td>
			<td>
				[<a href="<?php echo url('contract/view/cid/' . $contract['cid']); ?>">详情</a>]
				[<a href="<?php echo url('contract/edit/cid/' . $contract['cid']); ?>">编辑</a>]
				[<a href="<?php echo url('contract/delete/cid/' . $contract['cid']); ?>" onclick="return confirm('是否将此信息删除?')">删除</a>]
			</td>
		</tr>
		<?php endforeach;?>
        <tr class="altbg1">
			<td colspan="9" align="center">
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
