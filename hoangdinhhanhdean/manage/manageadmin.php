<?php
    session_start();
    include '../bootstrap.php';// connect csdl
?>
<style>

#avatar{
    width: 100px;
    margin-left: 120px;
    border-radius: 1000px;

}
.text-left{
    font-size: 30px;
    padding-left: 40px;
    
    color: orangered; 
}
p{
    text-align: center;
    color: #ffff;
    font-size: 25px;
}
.col-md-4
{
    margin-top: 100px;
    
}
.btn-danger{
    width: 100%;
    font-size: 17px;
    border-radius: 100px;
}
#box-img{
    background: rgba(0,0,0,0.9); 
    color: #ffff;
}

body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: url('../image/computer.jpg') no-repeat;
    background-size: cover;
}

</style>
<!-------------------------------------------------------------------------->
<?php
    if(isset($_SESSION['usernameadmin']))
    {
        $name = $_SESSION['usernameadmin'];
        $idmanage = $_SESSION['idmanage'];
    }
?>

<!-------------------------------------------------------------------------->

<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered table-hover">
                <tr>
                    <td id="box-img">
                        <img src="../image/avatar.png" alt="avatar" id="avatar">
                        <p><?=$name?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://localhost:8080/hoangdinhhanhdean/product/category.php" class="text-left" style=" text-decoration: none;">Thêm nhà sản xuất</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://localhost:8080/hoangdinhhanhdean/product/add_product.php" class="text-left" style=" text-decoration: none;">Thêm sản phẩm</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://localhost:8080/hoangdinhhanhdean/product/product.php" class="text-left" style=" text-decoration: none;">Danh sách sản phẩm</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="informationadmin.php?id=<?=$_SESSION['idmanage']?>" class="text-left" style=" text-decoration: none;">Thông tin cá nhân</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="logoutadmin.php" class="btn btn-danger" >Đang xuất</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>

