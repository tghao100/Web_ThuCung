<?php
  session_start();
  include 'ketnoi.php';
  if(isset($_POST["login-btn"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);
  if(!$username || !$password){
      echo "<script>
        alert('Vui lòng nhập đầy đủ thông tin đăng nhập');
        window.location = './index.php';
      </script>";
      
  }else{
    $slq = "SELECT * FROM user WHERE username='$username' and password = '$password' ";
    $query = mysqli_query($conn,$slq);
    $num_rows = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    if($num_rows==0){
        echo "<script>
        alert('Tên đăng nhập hoặc mật khẩu không đúng');
        window.location = './index.php';
        </script>";
    }else{
        $_SESSION['username']=$row['name'];
        $_SESSION['id']=$row['id_user'];
        
        echo "<script>
            alert('Bạn đã đăng nhập thành công');
            window.location = './index.php';
        </script>";
    }
  }
}
?>