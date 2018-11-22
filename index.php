<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>许愿墙</title>
	<link rel="stylesheet" href="./Css/index.css" />
	<script type="text/javascript" src='./Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='./Js/index.js'></script>
	<!--点击删除按钮时，跳转到删除逻辑页面del.php  -->
	<script type="text/javascript">
	function del(key){
		if(confirm("确定删除吗?")){
			location.href="del.php?del="+key;
		}else {
			location.href="index.php";
		}
	}
</script>
</head>

<!-- 初始化许愿贴 -->
<?php
//设置编码格式
header('content-type:text/html;charset=utf-8');
//创建数据库连接
$connect=mysqli_connect('localhost','root','','wall');
//设置获取的编码方式为utf8
mysqli_query($connect,'set names utf8');
//获取许愿贴的sql语句
$sql='SELECT * FROM sticker';
//取结果集
$result=mysqli_query($connect,$sql);
//获取关联数组
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
// var_dump($data);
//关闭数据库资源
mysqli_close($connect);
?>

<body>
	<div id='top'>
		<span id='send'></span>
	</div>
	<div id='main'>
		<?php
		//检测获取的数据合理性
		if (is_array($data)&&count($data)>0):
		//设置许愿帖子的编号 从1开始
		$i=1;
		//遍历许愿帖子数据
		foreach ($data as $key => $val):
		?>
		<dl class='paper <?php echo $val['color']; ?>'>
			<dt>
				<span class='username'><?php echo $val['username']; ?></span>
				<span class='num'>No.<?php echo $i++; ?></span>
			</dt>
			<dd class='content'><?php echo $val['content']; ?></dd>
			<dd class='bottom'>
				<span class='time'><?php echo $val['create_time']; ?></span>
				<a href="#" onclick="del(<?php echo $val['id']; ?>)" class='close'></a>
			</dd>
		</dl>
		<?php
		endforeach;
		endif;
		?>
	</div>

<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>
</html>
