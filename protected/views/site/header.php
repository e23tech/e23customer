<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset;?>">
<meta http-equiv="x-ua-compatible" content="ie=7" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/resources/css/admin.css" />
<script type="text/javascript">
var cpMenu = new Array('home','setting','website','member','item','product','review','article','module');
function gotoMenu(obj, tab) {
	var selmenu = obj.parentNode;
	var menus = document.getElementById('menu').getElementsByTagName('li');
	if(selmenu) {
		selmenu.className = "selected";
		for(var i = 0;i < menus.length;i++) {
			if(menus[i] != selmenu) menus[i].className = "unselected";
		}
		//showSubmenu(action);
//		parent.menu.location = '/modoer/admin.php?module=modoer&act=cpmenu&tab=' + tab;
		parent.menu.location = '/index.php?r=' + tab + '/menu';
		if(tab == 'site')
		{
			parent.main.location = '/index.php?r=site/welcome';
		}
		else
		{
			parent.main.location = '/index.php?r=' + tab;
		}
	}
	return false;
}
function showSubmenu(Id) {
	for(var i=0;i<cpMenu.length;i++) {
		var obj = parent.menu.document.getElementById('menu_' + cpMenu[i]);
		if(obj){
			obj.style.display = (Id==cpMenu[i]) ? 'block' : 'none';
		}
	}
}
//更新框架
function admin_refresh() {
	if(parent) {
		parent.location.reload();
	}
}
</script>
</head>
<body style="margin:0px;">
<div id="header">
    <div class="op">
        你好：<b>admin</b>，欢迎使用<?php echo Yii::app()->name; ?>。
        <a href="#" onclick="admin_refresh();">刷新</a>&nbsp;
        <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>" target="_top">退出</a>
    </div>
	<div id="product"><?php echo Yii::app()->name; ?></div>
	<div id="nav">
    <ul id="menu">
    <li class="selected"><a href="#" onclick="return gotoMenu(this,'site');" onfocus="this.blur()">后台首页</a></li>
	<li class="unselected"><a href="#" onclick="return gotoMenu(this,'contract');" onfocus="this.blur()">合同管理</a></li>
	<li class="unselected"><a href="#" onclick="return gotoMenu(this,'customer');" onfocus="this.blur()">客户管理</a></li>
	<li class="unselected"><a href="#" onclick="return gotoMenu(this,'query');" onfocus="this.blur()">查询分析</a></li>
	<li class="unselected"><a href="#" onclick="return gotoMenu(this,'user');" onfocus="this.blur()">用户管理</a></li>
    </ul>
  </div>
  <div style="clear:both"></div>
</div>
</body>
</html>