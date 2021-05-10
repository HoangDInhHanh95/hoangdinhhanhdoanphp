<?php 
//session_start();
include 'header.php';// đã có kết nối csdl  biên $conn 

?>
<!-------------------------------------------------------------------------->
<?php 
    if(isset($_POST['submid']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "" || $password == "" )
        {
            echo '<script>alert("Vui lòng điền đầy đủ thông tin");</script>';
        }
        else{
            // so sánh dữ liệu trong table mysqli vs người đang nhập có trùng nhau ko
            $sql ="SELECT * FROM `customer` WHERE tendangnhap = '$username' AND matkhau = '$password' ";
            $query = mysqli_query($conn,$sql);
            // lấy dữ liệu sô cột trong table về
            $num_rows = mysqli_num_rows($query);
            if($num_rows)
            {
                $rows = mysqli_fetch_assoc($query);
                $_SESSION['is_logined'] = $rows;
                $_SESSION['makh'] = $rows['makh'];
                $_SESSION['username'] = $rows['tendangnhap'];
                //header('location: index.php'); // khi đang nhập thành công chuyển đên trang chủ     
                echo '<script type="text/javascript">window.location.replace("http://localhost:8080/hoangdinhhanhdean/index.php")</script>';
            }
            else{
                echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng!");</script>';
            }

        }

    }
?>
<!-------------------------------------------------------------------------->
<head>
 <style>
div.background_img
{
    background-image: url('image/anhdong.gif');
    
    max-width: 1320px;
    margin-bottom: -1.5rem;
}
div.login_box
{
 margin-left: 38%;
 margin-top: 15%;
 margin-bottom: 20%;
 
}
.form-control{
    border-radius: 100px;
    background: none ;
}
 </style>
</head>
<div class="container-fluid background_img">
    <div class="row login_box ">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align: center;">
                       <img src="image/img_avatar.png" alt="" style="border-radius: 50%;width: 100px;"/>
                    </h3> 
                </div>
                <div class="panel-body">
                    <form action="" method="POST" role="form" autocomplete="off">
                        <!--*************-->
                        <div class="form-group">
                            <label for="">Tên tài khoản</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập Họ và tên" name="username">
                        </div>
                        <!--*************-->
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" id="" placeholder="Nhập Mật khẩu" name="password">
                        </div>        
                        <!--*************-->
                        <button type="submit" class= "btn btn-primary" name="submid" >Đăng nhập</button>  
                    </form>      
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>