<?php 
    include 'ketnoi.php';

    if(isset($_POST['dangky-btn'])){
        $name = $_POST['name'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $password = md5($password);

    $sql = "SELECT * FROM user where username = '$username'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($query);

    if($result > 0){
        echo "<script>
            alert('Tên đăng nhập đã tồn tại. Mời bạn nhập lại Tên đăng nhập!');
            window.location = './index.php';
        </script>";
    }else{
        $sql_user = "INSERT INTO user(name, sdt, email, username, password) VALUE('$name', $sdt, '$email', '$username', '$password')";
        $query_user = mysqli_query($conn,$sql_user);
        
        echo "<script>
            alert('Chúc mừng bạn đã tạo thành công tài khoản');
            window.location = './index.php';
        </script>"; 
    }
?>