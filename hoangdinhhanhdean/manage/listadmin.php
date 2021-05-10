<?php
    session_start();
    include '../bootstrap.php';

?>
<style>
 body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: #915234; 
 }
 th{
     font-size: 20px;
     background:  rgb(60, 179, 113);
     text-align: center;
     font-weight: bold;
    color: #ffff;
 }
 td{
     font-size: 17px;
     color: #ffff;
     font-weight: bold;
     font-family: sans-serif;
     text-align: center;
 }
</style>
<?php
    $query = mysqli_query($conn,"SELECT * FROM manage");
?>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Tên đang nhập</th>
                        <th>Mật khẩu</th>
                        <th>E-mail</th>
                        <th>Số điện thoại</th>
                        <th>Phím chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($query as $key => $valua){ ?>
                    <tr>
                        <td><?=$key+1 ?></td>
                        <td><?=$valua['hovaten']?></td>
                        <td><?=$valua['tendangnhap']?></td>
                        <td><?=$valua['matkhau']?></td>
                        <td><?=$valua['email']?></td>
                        <td><?=$valua['sdt']?></td>
                        <td>
                             <a href="updateadmin.php?id=<?=$valua['idmanage']?>" class="btn btn-info">Sửa thông tin</a>
                             <a href="deleteadmin.php?id=<?=$valua['idmanage']?>" class="btn btn-success">Xóa</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>