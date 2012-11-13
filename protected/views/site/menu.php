		<li>
			<span class="folder">快捷操作</span>
			<ul>
				<li><span class="file"><?php echo CHtml::link('欢迎页', url('site/welcome'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('合同录入', url('contract/add'), array('target' => 'main')) ?></span></li>
			</ul>
		</li>
		<li>
			<span class="folder">个人信息</span>
			<ul>
				<li><span class="file"><?php echo CHtml::link('个人信息', url('user/view'), array('target' => 'main')) ?></span></li>
				<li><span class="file"><?php echo CHtml::link('密码管理', url('user/edit'), array('target' => 'main')) ?></span></li>
			</ul>
		</li>
