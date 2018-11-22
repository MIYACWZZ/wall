<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>许愿墙</title>
	<link rel="stylesheet" href="./Css/index.css" />
	<script type="text/javascript" src='./Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='./Js/index.js'></script>
</head>
<?php
header('content-type:text/html;charset=utf-8');
//创建数据库连接
$connect=mysqli_connect('localhost','root','','wall');
//设置获取的编码方式为utf8
mysqli_query($connect,'set names utf8');
//sql语句
$sql='SELECT * FROM sticker';
//取结果集
$result=mysqli_query($connect,$sql);
//获取为一个关联数组
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
				<a href="" class='close'></a>
			</dd>
		</dl>
		<?php
		endforeach;
		endif;
		?>

		<!-- <dl class='paper a2'>
			<dt>
				<span class='username'>慕课网</span>
				<span class='num'>No.00001</span>
			</dt>
			<dd class='content'>大家要好好学习PHP语言哦！</dd>
			<dd class='bottom'>
				<span class='time'>今天08:30</span>
				<a href="" class='close'></a>
			</dd>
		</dl> -->

		<!-- <dl class='paper a3'>
			<dt>
				<span class='username'>慕课网</span>
				<span class='num'>No.00001</span>
			</dt>
			<dd class='content'>大家要好好学习PHP语言哦！</dd>
			<dd class='bottom'>
				<span class='time'>今天08:30</span>
				<a href="" class='close'></a>
			</dd>
		</dl> -->

		<!-- <dl class='paper a4'>
			<dt>
				<span class='username'>慕课网</span>
				<span class='num'>No.00001</span>
			</dt>
			<dd class='content'>大家要好好学习PHP语言哦！</dd>
			<dd class='bottom'>
				<span class='time'>今天08:30</span>
				<a href="" class='close'></a>
			</dd>
		</dl> -->

		<!-- <dl class='paper a5'>
			<dt>
				<span class='username'>慕课网</span>
				<span class='num'>No.00001</span>
			</dt>
			<dd class='content'>大家要好好学习PHP语言哦！</dd>
			<dd class='bottom'>
				<span class='time'>今天08:30</span>
				<a href="" class='close'></a>
			</dd>
		</dl> -->

	</div>

<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>
</html>
