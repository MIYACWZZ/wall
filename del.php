<?php
if (isset($_GET['del'])) {
  //获取删除id
  $id=$_GET['del'];
  //创建数据库连接
  $connect=mysqli_connect('localhost','root','','wall');
  //sql
  $sql="DELETE FROM sticker WHERE id=$id";
  echo $sql;
  $result=mysqli_query($connect,$sql);
  if (!$result) {
    //关闭数据库资源
    mysqli_close($connect);
    echo "<script>alert('删除失败！');location.href='index.php'</script>";
    // die("Could not enter data:".mysql_error());
  }else {
    //关闭数据库资源
    mysqli_close($connect);
    echo "<script>alert('删除成功！');location.href='index.php'</script>";
  }

}

 ?>
