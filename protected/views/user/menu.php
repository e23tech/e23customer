		<li>
			<span class="folder">快捷操作</span>
			<ul>
				<li><span class="file"><?php echo CHtml::link('用户列表', url('user/list'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('部门管理', url('user/group'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('添加用户', url('user/add'), array('target' => 'main')) ?></span></li>
			</ul>
		</li>
		<li>
			<span class="folder">个人信息</span>
			<ul>
				<li><span class="file"><?php echo CHtml::link('个人信息', url('user/edit'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('密码管理', url('user/password'), array('target' => 'main')) ?></span></li>
			</ul>
		</li>
