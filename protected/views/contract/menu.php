		<li>
			<span class="folder">普通管理</span>
			<ul>
				<li><span class="file"><?php echo CHtml::link('合同列表', url('contract/list'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('合同录入', url('contract/add'), array('target' => 'main')) ?></span></li>
			</ul>
		</li>
		<li>
			<span class="folder">高级管理</span>
			<ul>
				<li><span class="file"><?php echo CHtml::link('合同分类', url('contract/sort'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('合同显示', url('contract/show'), array('target' => 'main')) ?></span></li>
			</ul>
		</li>
