<?php
    session_start();
    session_destroy();
    echo "<script>
        alert('Bạn đã đăng xuất. Hãy đăng nhập để mua hàng!');
        window.location = './index.php';
    </script>";
?>