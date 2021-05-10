<?php
  session_start();
 include 'connect.php';
 error_reporting(E_ALL & ~E_NOTICE);

?>
  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="site.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <title>Website Bán Điện Thoại Giá Rẻ</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

    ul li:hover{
      background-color: #00CAFF;
    }
    ul li a{
      font-size: 1.5rem;
      font-weight: bold;
    }
    #change_color_menu{
      color: black;
      font-weight: bold;

    }
    #change_color_menu:hover{
      color: #a6003b;
      font-weight: bold;
      font-style: italic;
      font-size: 2rem;
    }
    .menu__header{
      background: linear-gradient(90deg, rgba(230, 230, 230,0.08),rgba(255, 102, 102,0.8));

    }

  </style>
  </head>
  <body>


<div class="container-fluid" style="width: 100%;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="image/giare.gif" alt="Los Angeles" style="width:100%; height:400px" >
      </div>

      <div class="item">
        <img src="image/2.png" alt="Chicago" style="width:100%; height:400px">
      </div>

      <div class="item">
        <img src="image/7.gif" alt="Chicago" style="width:100%; height:400px">
      </div>

      <div class="item">
        <img src="image/hosanaa.gif" alt="Chicago" style="width:100%; height:400px">
      </div>

      <div class="item">
        <img src="image/3.gif" alt="New york" style="width:100%; height:400px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="container-fluid" >
     <header>
        <nav class="navbar  menu__header" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
            </div>

            <div class="collapse navbar-collapse" id="collapse">
            <!-- form search thong tin san pham-->
            <form action="" method="GET" style="height: 0px; ">
              <img src="image/logo.jpg" alt=""  height="50px">
              <input type="text" name="name" style="margin-left: 50px;" value="<?=isset($_GET['name'])?$_GET['name']:"";?>"  />
              <input type="submit" value="Tìm kiếm" class="btn btn-danger">
            </form>

                <ul class="nav navbar-nav navbar-right">

                    <li><a href="index.php" id="change_color_menu">Trang chủ</a></li>
                    <li><a href="introduce.php"  id="change_color_menu">Giới thiệu</a></li>
                    <li><a href="showproduct.php"  id="change_color_menu">Sản phẩm</a></li>
                    <li><a href="listcart.php"  id="change_color_menu">Giỏ hàng</a></li>
                    <?php
                     if(isset($_SESSION['username']))
                     {
                        $name = $_SESSION['username'];
                      ?>
                      <li>
                        <a href="information_customer.php?id=<?php echo $_SESSION['makh']; ?>" id="change_color_menu">
                      <?php echo $name ; ?>
                          <img src="image/img_avatar.png" alt="" width="20px" style="border-radius: 50%;">
                        </a>
                    </li>
                    <?php }else{ // nêu đang nhập thì ko hiên ra menu đang ký và đang nhâp  ?>
                    <li><a href="register_customer.php" id="change_color_menu">Đăng ký</a></li>
                    <li><a href="login_customer.php" id="change_color_menu">Đăng nhập</a></li>
                     <?php } ?>
                </ul>
            </div>
        </nav>
     </header>
</div>
