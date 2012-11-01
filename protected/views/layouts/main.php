<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset;?>">
<meta http-equiv="x-ua-compatible" content="ie=7" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/resources/css/admin.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/common.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/admin.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(document).keydown(resetEscAndF5);
});
</script>
</head>
<body>
<?php echo $content; ?>
</body>
</html>
</html>
