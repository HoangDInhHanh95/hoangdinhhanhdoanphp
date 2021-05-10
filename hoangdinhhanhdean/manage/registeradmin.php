<?php include '../bootstrap.php';// connect database table in xampp?>

<head>
    <meta charset="utf-8">
    <title>Register admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>

body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: url('../image/computer2.jpg') no-repeat;
    background-size: cover; 
    background-attachment: fixed;
}
h3{
    font-size: 25px;
    color: #ffff;
}
h1{
    font-size: 50px;
    color: #ffff;
}
.form-control{
    background: rgba(255,255,255,0.1);
    margin-top: 12px;
    color: gray;
    font-size: 18;
    border-radius: 1000px;
    border: 0px;
}
.col-md-4{
    background: rgba(0,0,0,0.9);
    margin-top: 15px;
    height: 500px;
    border-radius: 5px;
}
.btn-info{
    margin-top: 20px;
    width: 100%;
    border-radius: 1000px;
    font-size: 20px;
}
h2{
    font-size: 40px;
    color: #3f729b;
    margin-top: 20px;
    margin-left: 60px;
}
p{
    font-size: 18px;
    color: rgba(244, 67, 54, 0.7);
    margin-left: 60px;
}
.btn-danger{
    font-size: 18px;
    margin-top: 10px;
    margin-left: 60px;
    width: 180px;
    border-radius: 100px;
    border: 0px;
}
h3{
    color: black;
    margin-top: 60px;
    font-family: sans-serif;
    font-weight: bold;
}
</style>
</head>
<!----------------------------------start code php------------------------------------------------>
<?php
    if(isset($_POST['submid']))// khi nhân submit thì sẽ thực thi các lệnh sau
    {
     //INSERT INTO `manage`(`idmanage`, `hovaten`, `tendangnhap`, `matkhau`, `rematkhau`, `email`, `sdt`) VALUES (
      $hovaten = $_POST['hovaten'];
      $tendangnhap = $_POST['tendangnhap'];
      $matkhau = $_POST['matkhau'];
      $rematkhau = $_POST['rematkhau'];
      $email = $_POST['email'];
      $sdt = $_POST['sdt'];
      
       //var_dump("ban da dang nhap thanh cong");
      if($hovaten =="" || $tendangnhap == ""|| $matkhau == "" || $rematkhau == "" ||
        $email == "" || $sdt == "")// kt xem ngươi dùng đã  nhập đầy dủ thông tin chưa
      {
          echo '<script>alert("Vui lòng điền đầy đủ thông tin");</script>';
      }else
      {
          // max hóa password: $matkhau = md5 ($matkhau); 
           // kt xem người dùng đã nhập đúng mật khẩu chưa
          if($matkhau!==$rematkhau)
          {
              echo '<script>alert("Bạn nhập mật khẩu không khớp");</script>';
          }
          //thực thi các lệnh 
          //INSERT INTO `manage`(`idmanage`, `hovaten`, `tendangnhap`, `matkhau`, `rematkhau`, `email`, `sdt`) VALUES (
          $sql = "INSERT INTO `manage`(`hovaten`, `tendangnhap`, `matkhau`, `rematkhau`, `email`, `sdt`) VALUES ('$hovaten', '$tendangnhap', '$matkhau','$rematkhau','$email', '$sdt')";
          $query = mysqli_query($conn,$sql);
          if($query)
          {
             echo '<script>alert("Bạn đã đang ký thành công. Bây giờ bạn có thể đang nhập");</script>';
              //header('location: login_customer.php');
              echo '<script type="text/javascript">window.location.replace("loginadmin.php")</script>';
              
          }
          else{
              echo "Lỗi rồi".mysqli_error($conn);
          }
  
       }
  
    }

?>
<!----------------------------------end code php-------------------------------------------------->
<body>
    <div class="container">
        <div class="row">
            <form action=""  method="POST" role="form" autocomplete="off">
            <h3 class="text-left"></h3>
            <div class="col-md-4">
                <h1 class="text-left">Register Now !!!</h1>
                <input type="text" class="form-control" name="hovaten" placeholder="Full name ">
                <input type="text" class="form-control" name="tendangnhap" placeholder="User name ">
                <input type="password" class="form-control" name="matkhau" placeholder="Password">
                <input type="password" class="form-control" name="rematkhau" placeholder="Enter the password">
                <input type="email" class="form-control" name="email" placeholder="E-mail">
                <input type="text" class="form-control" name="sdt" placeholder="Number Phone ">
                <button type="submit" class= "btn btn-info" name="submid" >Register</button>
                <a href="loginadmin.php"  class= "btn btn-info">Login</a> 
            </div>

            <div class="col-md-7">
                <h2 class="text-left">
                    Welcome to our website coded by Hoàng Đình Hanh !!!.
                </h2>
                <p class="text-lelf">
                    Here you can sell your favorite cell phone products to everyone. To fully experience my website, what are you waiting for please register, to become the main administrator of your own product.
                </p>
                <a href="../index.php">
                    <div class="btn btn-danger">Purchose</div>
                </a>
            </div>
            </form>
        </div>
    </div>
</body>