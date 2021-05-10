<?php
 include 'header.php';// TRONG NÀY CÓ SESION RÔI;
 //include 'addcart.php';
 /*session_destroy();
 print_r($_SESSION['cart']);
 print_r($_SESSION['quantity']);*/
?>  
<style>
.dathang{
    width: 100px;
    border-radius: 100px;
}
</style>
<!-----------------------------------code trang giỏ hàng--------------------------------------------->

<!-----------------------------------end shopping_cart--------------------------------------------->

<div class="container">
    <div class="row">
     <!---*************-->
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading" style="background-color: #fcc2d7;">
                    <h3 class="panel-title " style="text-align: center; color:brown; font-size: 3rem" >Thông tin giỏ hàng </h3>
                </div>
            <form action="#" method="POST">
                <div class="panel-body">
                    <?php if(isset($_SESSION['cart'])) :?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr style="background-color: #ccff00;">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Dòng sản phẩm</th>
                                
                                <th>Số lượng </th>
                                <th>Giá sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Mô tả sản phẩm</th>
                                <th>Thời gian bảo hành</th>
                                <th>Thành Tiền</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                
                        <tbody>
                            <?php 
                                $total = 0;
                                foreach($_SESSION['cart'] as $key => $value){
                                    $sql = "select * from product where masp = $value";
                                    $s = mysqli_query($conn, $sql);
                                    $val = mysqli_fetch_array($s);
                                    $thanhtien = $val['giamoi'] * $_SESSION['quantity'][$key];
                                    $total += $thanhtien;
                            ?>
                            <tr>
                                <td style="background-color: #e8d9c3;"> <?=$key ?></td>
                                <td> <?=$val['tensp']?></td><!--luu y bookname va cateid -->
                                <td> <?=$val['dongsp']?></td>

                                <td> 
                                    <input type="number"  value="<?php echo $_SESSION['quantity'][$key] ?>" id="soluong<?=$value?>" min="1"  style="width:40px;"/>
                                </td>
                                
                                <td style="color: red;"><?=number_format($val['giamoi'], 0, ',', '.')?>  đ</td>
                                <td> 
                                    <img src="uploads/<?= $val['anh']?>" alt="" width="100px"/>
                                 </td>
                                 <td> <?= $val['mota']?></td>
                                 <td> <?= $val['ngaybaohanh']?></td>
                                 <td id="thanhtien<?php echo $value ?>"><?=number_format($thanhtien, 0, ',', '.')?> đ</td>
                                 <td> 
                                     <a href="deletecart.php?id=<?=$val['masp']?>" class="btn btn-warning"> Xóa</a>
                                     <a class="btn btn-info update_quantity" rel="<?php echo $val['masp'] ?>">Cập nhật</a>
                                 </td>
                            </tr>
                            <?php }?>
    
                        </tbody>
                        <?php  else : ?>
                            <p> không tồn tại trong giỏ hang</p>
                        <?php endif ?>
                        <thead style="background-color: #d1d1d1;">
                                <th></th>
                                <th>Tông tiền</th>
                                <th></th>
                                <th></th>
                                <th> </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="color: red;" id="tongtien"><?=number_format($total, 0, ',', '.').' đ' ?></th>
                                <th></th>
                        </thead>
                    </table>
                    <a href="#" class="btn btn-danger dathang" >Đặt hàng</a>
                </div>
                
            </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.update_quantity', function(){
            var id = $(this).attr('rel');
            var quantity = $('#soluong'+id).val();
            $.post("updatecart.php", {id: id, quantity: quantity}, function(data){
                if (data == '1')
                    window.location.reload();
            });
        })
    });
</script>
<?php include 'footer.php';?>