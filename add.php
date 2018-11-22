<?php
//设置编码格式
header('content-type:text/html;charset=utf-8');
//设置时区
date_default_timezone_set('PRC');
//创建数据库连接
$connect=mysqli_connect('localhost','root','','wall');
//设置获取的编码方式为utf8
mysqli_query($connect,'set names utf8');

//如果新增了许愿贴，处理wish.php传来的数据
if(isset($_POST['submit'])){
		//获取wish.php传递的数据
		$color=$_POST['idvalue'];
		$content=$_POST['content'];
		$username=$_POST['name'];
		//sql插入语句
		$sql="INSERT INTO sticker(color,content,username) VALUES ('$color','$content','$username')";
		// echo $sql;
		//插入数据库
		$result=mysqli_query($connect,$sql);
		if (!$result) {
      //关闭数据库资源
      mysqli_close($connect);
			echo "<script>alert('许愿失败了！');location.href='index.php'</script>";
			// die("Could not enter data:".mysql_error());
		}else {
      //关闭数据库资源
      mysqli_close($connect);
			echo "<script>alert('许愿成功了！');location.href='index.php'</script>";
		}
}
 ?>
