<div class="modal-log-in js-modal-log-in">
    <div class="log-in-container js-log-in-container">
        <div class="close-log-in js-close-log-in">
            <i class="fas fa-times"></i>
        </div>
        <div class="modal-header">
            <p class="header-login">Đăng Nhập</p>            
        </div>
        <form action="dangnhap.php" method="POST">
            <div class="modal-body">
                <label for="" class="modal-label">
                    <input type="text" class="form-input" name="username" placeholder="Tên đăng nhập">
                    <i class="fa-solid fa-envelope"></i>
                </label>
                    
                <label for="" class="modal-label">
                    <input type="password" class="form-input" name="password" placeholder="Nhập mật khẩu">
                    <i class="fa-solid fa-lock"></i>
                </label>

                <button class="body-btn" name="login-btn">Đăng Nhập</button>
            </div>
        </form>
    </div>
</div>                        

<!--Dang ky-->

<div class="modal js-modal">
    <div class="modal-container js-modal-container">
        <div class="modal-close js-close">
            <i class="fas fa-times"></i>
        </div>
        <div class="modal-header">
            <p class="header-signin">Đăng Ký Tài Khoản Mới</p>
        </div>
        <form action="dangky.php" method="POST" name="form-sigin" onsubmit="return checkPassWord()">
            <div class="modal-body">
                <label for="" class="modal-label">
                    <input type="text" class="form-input" name="name" placeholder="Nhập họ và Tên" required>
                    <i class="fas fa-user"></i>
                </label>     

                <label for="" class="modal-label">
                    <input type="number" class="form-input clean" name="sdt" placeholder="Nhập số điện thoại" required>
                    <i class="fa-solid fa-phone"></i>
                </label>
                
                <label for="" class="modal-label">
                    <input type="text" class="form-input" name="email" placeholder="Nhập email" required>
                    <i class="fa-solid fa-envelope"></i>
                </label>
                   
                <label for="" class="modal-label">
                    <input type="text" class="form-input" name="username" placeholder="Tên đăng nhập" required>
                    <i class="fas fa-user-circle"></i>
                </label>

                <label for="" class="modal-label">
                    <input type="password" class="form-input" id="js-check-pass" name="password" value="" placeholder="Nhập mật khẩu" required>
                    <i class="fa-solid fa-lock"></i>
                </label>

                <label for="" class="modal-label">
                    <input type="password" class="form-input" id="js-check-retype-pass" name="password" value="" placeholder="Nhập lại mật khẩu" required>
                    <i class="fa-solid fa-lock"></i>
                </label>

                <button class="body-btn" name="dangky-btn">Đăng ký</button>
            </div>
        </form>
    </div>
</div>  
