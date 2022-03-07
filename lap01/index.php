<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="author" content="babydragon" />
    <link href="/lap01/site.css" rel="stylesheet" />
    <title>Xếp loại kết quả tuyển sinh</title>
</head>
<body>
    <div id="wrapper">
        <h2> Xếp loại kết quả tuyển sinh </h2>
        <form action="#" method="post">
            <!-- Môn Toán -->
            <div class="row">
                <div class="lbltitle">
                    <label>Điểm môn Toán</label>
                </div>
                <div class="lblinput">
                    <input type="number" name="Toan" value="<?php echo isset($_POST["Toan"]) ? $_POST["Toan"] : "" ; ?>" />
                </div>
            </div>
            <!-- Môn Lý, Hóa tương tự -->
            <div class="row">
                <div class="lbltitle">
                    <label>Điểm môn Lý</label>
                </div>
                <div class="lblinput">
                    <input type="number" name="Ly" value="<?php echo isset($_POST["Ly"]) ? $_POST["Ly"] : "" ; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="lbltitle">
                    <label>Điểm môn Hóa</label>
                </div>
                <div class="lblinput">
                    <input type="number" name="Hoa" value="<?php echo isset($_POST["Hoa"]) ? $_POST["Hoa"] : "" ; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="lbltitle">
                    <label>Chọn khu vực</label>
                </div>
                <div class="lblinput">
                    <select name="KhuVuc">
                        <option value="" selected>--Chọn Khu Vực--</option>
                        <option value="1">Khu vực 1</option>
                        <option value="2">Khu vực 2</option>
                        <option value="3">Khu vực 3</option>
                        <option value="4">Khu vực 4</option>
                        <option value="5">Khu vực 5</option>
                    </select>
                </div>
            </div>
            <!-- Nút gửi form -->
            <div class="row">
                <div class="submit">
                    <input type="submit" name="btnsubmit" value="Xếp loại" />
                </div>
            </div>
            <!-- Nút thêm môn -->
            <div class="row">
                <div class="submit">
                    <input type="submit" name="btnnew" value="Thêm môn" />
                </div>
            </div>
            <!-- Thêm môn mới -->
            <div class="row">
                <div class="lbltitle">
                    <input type="text" name="New"/>
                </div>
                <div class="lblinput">
                    <input type="number" name="New" value="<?php if(isset ($_POST["btnnew"])){echo isset($_POST["New"]) ? $_POST["New"] : "" ;}  ?>" />
                </div>
            </div>
        </form>
        <!-- Hiển thị kết quả tính toán -->
        <div id="result">
            <h2>Kết quả xếp loại</h2>
                <div class="row">
                    <div class="lbltitle">
                        <label>Tổng điểm</label>
                </div>
                <div class="lbloutput">
                    <?php
                    if (isset ($_POST["btnsubmit"])) {
                        echo isset ($_POST["btnsubmit"]) ? $_POST["Toan"] + $_POST["Ly"] + $_POST["Hoa"] : "" ;
                    }
                    else if (isset ($_POST["btnnew"])) {
                        echo isset ($_POST["btnnew"]) ? $_POST["Toan"] + $_POST["Ly"] + $_POST["Hoa"] + $_POST["New"] : "" ;
                    }   
                    ?>
                </div>
            </div>  
        </div>
        <div class="row">
            <div class="lbltitle">
                <label>Xếp loại</label>
            </div>
            <div class="lbloutput">
                <?php
                    if(isset ($_POST["btnsubmit"])){
                        $TongDiem = $_POST["Toan"] + $_POST["Ly"] + $_POST["Hoa"] ;
                        if($TongDiem>=24)
                        echo "Giỏi";
                        else if($TongDiem>=21)
                        echo "Khá";
                        else if($TongDiem>=15)
                        echo "Trung Bình";
                        else{
                            echo "Yếu";
                        }
                    }
                ?>
            </div>
            <div class="lbloutput">
                <?php
                    if(isset ($_POST["btnnew"])){
                        $TongDiem = $_POST["Toan"] + $_POST["Ly"] + $_POST["Hoa"] + $_POST["New"] ;
                        if($TongDiem>=24)
                        echo "Giỏi";
                        else if($TongDiem>=21)
                        echo "Khá";
                        else if($TongDiem>=15)
                        echo "Trung Bình";
                        else{
                            echo "Yếu";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="lbltitle">
                <label>Điểm ưu tiên</label>
            </div>
            <div class="lbloutput">
                <?php
                    if(isset ($_POST["btnsubmit"]) || isset ($_POST["btnnew"])){
                        $DiemUuTien = empty($_POST["KhuVuc"]) ? 0 : $_POST["KhuVuc"];
                        switch ($DiemUuTien){
                            case 0:
                            case 4:
                            case 5:
                                echo "0";
                                break;
                            case 1:
                            case 2:
                                echo "5";
                                break;
                            case 3:
                                echo "3";
                                break;
                            default:
                                break;
                        }
                        
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>