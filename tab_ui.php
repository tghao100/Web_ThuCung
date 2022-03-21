<?php 
    $id_dv = $_GET['id_dv'];
    $result_tab = mysqli_query($conn, "SELECT * FROM thong_tin WHERE thong_tin.id_dv='$id'");
?>

<div class="description">
    <div class="tab-item active">
        <i class="fas fa-audio-description"></i>
        Mô tả
    </div>
    <div class="tab-item">
        <i class="fas fa-heart"></i>
        Đánh giá
    </div>
    <div class="tab-item">
        <i class="fas fa-location-arrow"></i>
        Địa chỉ
    </div>
    <!-- <div class="line"></div> -->
</div>

<div class="description-content">
    <div class="tab-card active">
        <h1 class="painted-info">Thông tin</h1>
        <?php 
            $r = mysqli_fetch_array($result_tab); ?>
                <ul class="painted-check">
                    <li><i class="fas fa-bone"></i> <p class="painted-p">Màu sắc: </p>  <span><?= $r['color']; ?></span></li>
                    <li><i class="fas fa-bone"></i> <p class="painted-p">Giới tính: </p>    <span><?= $r['sex'] ?></span></li>
                    <li><i class="fas fa-bone"></i> <p class="painted-p">Tuổi: </p> <span><?= $r['age'] ?></span><span>  tháng tuổi</span></li>
                    <li><i class="fas fa-bone"></i> <p class="painted-p">Nguồn gốc: </p>    <span><?= $r['source'] ?></span></li>
                    <li><i class="fas fa-bone"></i> <p class="painted-p">Tình trạng tiêm ngừa: </p>    <span><?= $r['shots'] ?></span></li>
                </ul> 
            <?php ;?>    

        <div class="intro">
            <h1 class="painted-info">Giới Thiệu</h1>

            <p class="intro-text"><span><?= $r['introduce'] ?></span><span></p>
            <h1 class="painted-info">Đặc điểm</h1>
            <ul class="painted-check">
                <li><i class="fas fa-check-circle"></i> <p class="intro-p">Tuổi thọ: </p>   <span><?= $r['longevity'] ?></span><span>  năm</span></li>
                <li><i class="fas fa-check-circle"></i> <p class="intro-p">Khả năng học tập:</p>    <span><?= $r['study'] ?></span></li>
                <li><i class="fas fa-check-circle"></i> <p class="intro-p">Cân nặng: </p>   <span><?= $r['weight'] ?></span><span>kg</span></li>
                <li><i class="fas fa-check-circle"></i> <p class="intro-p">Chiều cao: </p>  <span><?= $r['height'] ?></span><span>cm</span></li>
            </ul>
            <h1 class="painted-info">Tính cách</h1>

            <p class="intro-text"><span><?= $r['chara'] ?></span><span></p>
        </div>
    </div>

    <div class="tab-card">
        
    <?php 
        if(isset($_SESSION['username'])){
            $cmt ="";
            $id_user = $_SESSION['id'];
            if(isset($_POST['btn-cmt-content'])){
                $cmt = $_POST['cmt'];
                $sql_insert = mysqli_query($conn, "INSERT INTO danhgia(cmt, id_user, id_dv) VALUES('$cmt', $id_user, $id_dv)");
            }
        }
    ?>
        <div class="cmt-comtainer">
            <div class="cmt-item">
                <div class="cmt-header">
                    <h2>Đánh giá thú cưng</h2>
                </div>
                <div class="cmt-body">
                    <form action="#" method="POST">
                        <input type="text" name="cmt" placeholder="Mời bạn nhập đánh giá">
                        <button type="submit" name="btn-cmt-content">Gửi</button>
                    </form>
                </div>   
                
                <div class="cmt-values">
                    <?php 
                        $sql_cmt = mysqli_query($conn, "SELECT danhgia.cmt, user.name, user.email, dong_vat.id_dv FROM danhgia 
                        INNER JOIN user ON user.id_user = danhgia.id_user
                        INNER JOIN dong_vat ON dong_vat.id_dv = danhgia.id_dv
                        WHERE dong_vat.id_dv = '$id_dv'");
                    ?>
                    <?php
                        while($row_cmt = mysqli_fetch_array($sql_cmt)){?>
                        <div class="cmt-text">
                            <div class="cmt-text-name">
                                <h1> <?php echo $row_cmt['name'] ?> </h1>   <i class="fas fa-at"><p>Email:</p></i>  <p><?php echo $row_cmt['email'] ?></p>
                            </div>  
                            
                            <div class="cmt-text-content">
                                <p>Nội dung đánh giá: </p><span><?php echo $row_cmt['cmt']; ?></span>
                            </div>    
                        </div>
                    <?php }?>    
                </div>
            </div>    
        </div>    
    </div>

    <div class="tab-card">
        <div class="tab-adress-container">
            <div class="tab-adress">
                <div class="tab-adress-header">
                    <h2>Hệ thống thú cưng pet park</h2>
                </div>
                <div class="tab-adress-body">
                    <span>Pet Park Quận 1</span>
                    <p>Số 7 Trần Khắc Chân, P.Tân Định, Quận 1, TPHCM</p>
                    <p>Điện thoại: 0902 360 086</p>
                    <div class="tab-adress-img">
                        <img src="./img/adress1.jpg">
                    </div>
                </div>

                <div class="tab-adress-body">
                    <span>Pet Park Quận 4</span>
                    <p>Số 313 Hoàng Diệu, P6, Quận 4, TPHCM</p>
                    <p>Điện thoại: 0903 11 48 22</p>
                    <div class="tab-adress-img">
                        <img src="./img/adress2.jpg">
                    </div>
                </div>

                <div class="tab-adress-body">
                    <span>Pet Park Võ Văn Tần</span>
                    <p>Số 217 Võ Văn Tần, P5, Quận 3, TPHCM</p>
                    <p>Điện thoại: 0922 333 111</p>
                    <div class="tab-adress-img">
                        <img src="./img/adress3.jpg">
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
<script src="./js/tab.js"></script>