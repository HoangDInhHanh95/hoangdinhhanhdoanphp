<?php include 'header.php';//trong nay có session_start và connect database ?>
<style>
.btn-sx{
    margin-left: 40%;
}
</style>
<!---------------------------------------------------------------------->
<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $produc = mysqli_query($conn,"SELECT * FROM product  WHERE masp = $id");
        $result = mysqli_fetch_assoc($produc);
        $cateid = $result['cateid'];// $cateid dưa san trang relatedproduct.php
       //    var_dump( $result['masp']);exit;
        
    }    
?>

<!----------------------------------------------------------------------------------------------->
<div class="container">
    <div class="col-sm-3">
    <?php include 'categoryproduct.php'?>
    </div>
    <div class="col-sm-9">
        <div class="row">
                <div class="col-sm-5 change_box">
                    <div class="product-img">
                        <img src="uploads/<?php echo $result['anh']?>" alt="" width="100%" height="300px" class="rungrung"/>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title " style="text-align: center; color:brown; font-size: 2rem" >
                                Chi tiết sản phẩm
                            </h3>
                        </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Tên sản phẩm</td>
                                    <td><?php echo $result['tensp'] ?></td>
                                </tr>
                                <tr>
                                    <td>Dòng sản phẩm</td>
                                    <td><?php echo  $result['dongsp'] ?></td>
                                </tr>
                                
                                <tr>
                                    <td>Giá bán</td>
                                    <td><?php echo number_format($result['giacu'])?> đ</td>
                                </tr>
                                <tr>
                                    <td>Giá khuyến mãi</td>
                                    <td><?php echo number_format($result['giamoi']) ?> đ</td>
                                </tr>
                                <tr>
                                    <td>Thời gian mua</td>
                                    <td><?php echo $result['ngaybaohanh'] ?></td>
                                </tr>
                                <tr>
                                    <td>Mô tả sản phâm</td>
                                    <td><?php echo $result['mota'] ?></td>
                                </tr>
                                <tr>
                                    <td>Số lượng sản </br>  phẩm hiện có</td>
                                    <td><?php echo $result['soluong'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="addcart.php?id=<?=$result['masp']?>" class="btn btn-sx btn-info">
                                            Mua hàng 
                                        </a>
                                    </td>
                                    <tr>
                                        <td><?=$resul['masp']?></td>
                                    </tr>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!---------------------------------- Sản phẩm liên quan--------------------------------------------------->
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title " style="text-align: center; color:brown; font-size: 2rem; font-weight:bold;" >
                        Sản phẩm liên quan
                    </h3>
                </div>
            </div>
                <?php
                    include 'relatedproduct.php';
                ?>
        </div>
 <!------------------------------------------------------------------------------------->        
    </div>
</div>
<?php include 'footer.php';?>
