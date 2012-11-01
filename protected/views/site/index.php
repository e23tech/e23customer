<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html><head>
<title><?php echo Yii::app()->name; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset;?>">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/admin.js"></script>
<style>
html,body{ height:100%; position:relative;}
</style>
<script type="text/javascript">
$(document).ready(function() {
	$(document).keydown(resetEscAndF5);
});
</script>
</head>
<body style="margin: 0px;" scroll="no">
<div style="position: absolute;top: 0px;left: 0px; z-index: 2;height: 55px;width: 100%">
<iframe frameborder="0" id="header" name="header" src="<?php echo Yii::app()->createUrl('/site/header'); ?>" scrolling="no" style="height: 55px; visibility: inherit; width: 100%; z-index: 1;"></iframe>
</div>
<table border="0" cellPadding="0" cellSpacing="0" height="100%" width="100%" style="table-layout: fixed;">
<tr><td width="173" height="55"></td><td></td></tr>
<tr>
<td width="173"><iframe frameborder="0" id="menu" name="menu" src="<?php echo Yii::app()->createUrl('/site/menu'); ?>" scrolling="auto" style="height:100%;visibility:inherit;width:100%;z-index:1;overflow-x:hidden;overflow-y:auto; "></iframe></td>
<td width="*"><iframe frameborder="0" id="main" name="main" src="<?php echo Yii::app()->createUrl('/site/welcome'); ?>" scrolling="yes" style="height: 100%; visibility: inherit; width: 100%; z-index: 1;overflow: auto;"></iframe></td>
</tr></table>
</body>
</html>
