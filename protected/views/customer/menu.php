		<li>
			<span class="folder">客户管理</span>
			<ul>
				<li><span class="file"><?php echo CHtml::link('客户列表', url('customer/list'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('客户录入', url('customer/add'), array('target' => 'main')) ?></span></li>
			</ul>
		</li>
		<li>
			<span class="folder">联系人管理</span>
			<ul>
				<li><span class="file"><?php echo CHtml::link('联系人列表', url('contact/list'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('联系人录入', url('contact/add'), array('target' => 'main')) ?></span></li>
			</ul>
		</li>
