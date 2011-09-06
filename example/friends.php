<?php
include_once('./init.php');
try {
	//取得好友
	$friends = $fun->Api('/v1/me/friends','GET',array("start"=>0,"count"=>10));
} catch (ApiException $e) {
	  echo "錯誤代碼：".$e->getCode();
	  echo "說明：".$e->getMessage();
	  exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://api.fun.wayi.com.tw/assets/jqplugin/v1.min.js"></script>
<title>Untitled Document</title>
<style type="text/css">
body {
		background-color: #F4FAFF;
}
</style>
</head>

<body>
<script language="javascript">
$(window).load(function() {
	$(this).fun.iframe.setAutoResize();
});
</script>
<div style=" text-align:center;">
  <p><strong>FUN名片串接範例(淡藍色區塊都屬於外部應用程式範圍) </strong></p>
  <p><a href="user.php">取得個人資料(PHP)</a> | <a href="friends.php">取得好友(PHP)</a> | <a href="index.php">jQuery邀請朋友畫面</a> | <a href="flash.php">AS3存取API</a></p>
  
  <table width="200" border="1" align="center">
    <tr style="color:#FFF;">
      <td align="center" bgcolor="#0080FF"><strong>UID</strong></td>
      <td align="center" bgcolor="#0080FF"><strong>頭像</strong></td>
      <td align="center" bgcolor="#0080FF"><strong>暱稱</strong></td>
      <td align="center" bgcolor="#0080FF"><strong>姓別</strong></td>
    </tr>
    <?php foreach($friends as $key=>$value):?>
    <tr>
      <td align="center"><?php echo $value['uid']?></td>
      <td align="center"><img src="<?php echo $value['avatar_small']?>" border="0" /></td>
      <td align="center"><?php echo $value['username']?></td>
      <td align="center"><?php echo $value['sex']?></td>
    </tr>
    <?php endforeach;?>
  </table>
  <p><br/>
</p>
</div>
</body>
</html>