<!DOCTYPE html>
<html>
<head>
<meta charset="<?php echo Yii::app()->charset;?>">
<title><?php echo Yii::app()->name;?>管理员控制中心</title>
<style>
html, body { background: #E6EFF7; font: 14px Arial, Helvetica, sans-serif; }
.login_table { margin: 80px auto 0; border: 1px solid #007399; background: #FFFFFF; color: #330000; }
.table_title { font-size: 16px; font-weight: bold; color: #FFF; background: #0099CC; }
.button { padding: 3px 5px; }
.input { width: 150px; font: 14px Verdana,Tahoma,sans-serif;padding: 1px 0;}
td { padding: 10px; }
a { color: #0000FF; }
</style>
<script type="text/javascript">
var siteurl = "";
if(self.parent.frames.length != 0){
	self.parent.location = document.location;
}
function redirect(url){
	window.location.replace(url);
}
</script>
</head>
<body>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,

)); ?>
<input type="hidden" name="url_forward" value="" />
<input type="hidden" name="adminlogin" value="1" />
<table width="400" border="0" cellpadding="8" cellspacing="0" class="login_table">
    <tr><td colspan="2" class="table_title"><?php echo Yii::app()->name;?>控制中心</td></tr>
    <tr><td colspan="2" height="10"></td></tr>
    <tr>
        <td width="150" align="right">用户名：</td>
        <td width="250"><?php echo $form->textField($model,'username', array('class' => 'input')); ?>
			<?php echo $form->error($model,'username'); ?></td>
    </tr>
    <tr>
        <td align="right">密　码：</td>
        <td><?php echo $form->passwordField($model,'password', array('class' => 'input')); ?>
			<?php echo $form->error($model,'password'); ?></td>
    </tr>
        <tr>
        <td></td>
        <td>
            <input type="submit" name="loginsubmit" class="button" value=" 登 录 " />
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" height="30">
			<small>Powered by <a href="http://www.e23.cn" target="_blank">舜网</a> &copy; 2007 - 2012, Design by Tisswb</small><br />
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>
</body>
</html>