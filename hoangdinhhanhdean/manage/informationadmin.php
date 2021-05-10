<?php
 //session_start();
 //session_destroy();
 include '../bootstrap.php'; 

 ?>
<style>
th{
    text-align: center;
    background: rgb(60, 179, 113);
    color: #ffff;
    font-size: 17px;
    font-family: sans-serif;
    font-weight: bold;
    width: 150px;
}
td{
    color: rgba(44, 130, 201, 1);
    font-size: 17px;
    font-family: sans-serif;
    font-weight: bold;
    text-align: center;
}
body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: url('../image/laptop1.jpg') no-repeat;
    background-size: cover;
}
.col-md-5{
    margin-top: 120px;
}
.btn-danger{
    margin-left: 4%;
    width:  100px;
    border-radius: 100px;
}

</style>

<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $manage = mysqli_query($conn,"SELECT * FROM `manage` WHERE  idmanage = $id");
    $mana = mysqli_fetch_array($manage);

    //echo $mana['idmanage'];exit;
}
?>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <table class="table table-bordered table-hover">
                    <tr>
                        <th>STT</th>
                        <td><?=$mana['idmanage']?></td>
                    </tr>
                    <tr>
                        <th>Họ và tên</th>
                        <td><?=$mana['hovaten']?></td>
                    </tr>
                    <tr>
                        <th>Tên đang nhập</th>
                        <td><?=$mana['tendangnhap']?></td>
                    </tr>
                    <tr>
                        <th>Mật khẩu</th>
                        <td><?=$mana['matkhau']?></td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td><?=$mana['email']?></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td><?=$mana['sdt']?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="logoutadmin.php" class="btn btn-danger" >Đăng xuất</a>
                            <a href="manageadmin.php" class="btn btn-danger">Quay lại</a>
                        </td>
                    </tr>
            </table>

        </div>
    </div>
</div>
</body>