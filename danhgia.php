<?php 
    if(isset($_SESSION['username'])){
        $cmt ="";
        $id_dv=$_GET['id_dv'];
        $id_user = $_SESSION['id'];
        if(isset($_POST['sbm-cmt'])){
            $cmt = $_POST['cmt'];
        }

        $sql_insert = mysqli_query($conn, "INSERT INTO danhgia(cmt, id_user, id_dv) VALUES('$cmt', $id_user, $id_dv)");
    }
    ?>
    <form action="#" method="POST">
        <input type="text" name="cmt">
        <button type="submit" name="sbm-cmt">Send</button>
    </form>


    <div class="description-info">
                    <h1 class="painted-info">Thông tin</h1>
                    <?php 
                        $r = mysqli_fetch_array($result); ?>
                            <ul class="painted-check">
                                <li><i class="fas fa-bone"></i> <p class="painted-p">Màu sắc: </p>  <span><?= $r['color'] ?></span></li>
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