<?php
 include 'header.php';// TRONG NÀY CÓ SESION RÔI;
 exit;


?>  
<!-----------------------------------code trang giỏ hàng--------------------------------------------->
<?php
  if(!isset($_SESSION['cart']))
  {
    $_SESSION['cart'] = array();// nếu chưa tồn tại thi bang 1 array rỗng
  }
 if(isset($_GET['action']))
 {
     switch($_GET['action'])
     {
         case "add";
    
         foreach($_POST['soluong'] as $id => $soluong )
         {
            $_SESSION['cart'][$id] = $soluong;
         }
         
        break;
     }
 }
 if(!empty($_SESSION['cart']))
 {
     //SELECT * FROM `product` WHERE `masp` IN (38,29,26,36)
     //array_keys($_SESSION['cart'])
     //implode(",", array_keys($_SESSION['cart']))
    //var_dump("SELECT * FROM `product` WHERE `masp` IN (".implode(",", array_keys($_SESSION['cart'])).")");exit;
     $strsql = mysqli_query($conn, "SELECT * FROM `product` WHERE `masp` IN (".implode(",", array_keys($_SESSION['cart'])).")");
   
 }

?>
<!-----------------------------------end shopping_cart--------------------------------------------->
<div class="container">
    <div class="row">
     <!---*************-->
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading" style="background-color: #fcc2d7;">
                    <h3 class="panel-title " style="text-align: center; color:brown; font-size: 3rem" >Thông tin giỏ hàng </h3>
                </div>
            <form action="shopping_cart.php?action=submit" method="POST">
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
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
                            $num =1;
                            while($rows = mysqli_fetch_array($strsql)){?>
                            <tr>
                                <td> <?=$num++ ?>  </td>
                                <td> <?=$rows['tensp']?></td><!--luu y bookname va cateid -->
                                <td> <?php echo $rows['dongsp']?></td>
                                <td> 
                                    <input type="text"  value="<?=$_SESSION['cart'][$rows['masp']]?>" name="soluong[<?=$rows['masp']?>]"  style="width:40px;"/>
                                </td>
                                
                                <td style="color: red;"><?=number_format($rows['giamoi'])?>  đ</td>
                                <td> 
                                    <img src="uploads/<?=$rows['anh']?>" alt="" width="100px"/>
                                 </td>
                                 <td> <?php echo $rows['mota']?></td>
                                 <td> <?php echo $rows['ngaybaohanh']?></td>
                                 <td><?=number_format($rows['giamoi'])?> đ</td>
                                 <td> 
                                     <a href="delete.php?id=<?php echo $rows['masp']?>" class="btn btn-warning"> Xóa</a>
                                 </td>
                            </tr>
                                <?php $num++; }?>
                        </tbody>
                        <thead style="background-color: #d1d1d1;">
                                <th></th>
                                <th>Tông tiền</th>
                                <th></th>
                                <th></th>
                                <th> </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>tông</th>
                                <th></th>
                        </thead>
                    </table>
                    <div  style="border-top: 2px solid #d1d1d1; width:1100px; margin-bottom:20px">

                    </div>
                    <table >
                        <tr >
                               <td >Tên người nhận</td>
                               <td>
                                   <input type="text" name="nguoinhan" class="form-control" style="margin-left: 30px; margin-top:10px">
                               </td>
                        </tr>
                        <tr >
                               <td>Điện thoại</td>
                               <td>
                                   <input type="text" name="dienthoai" class="form-control" style="margin-left: 30px; margin-top:10px">
                               </td>
                        </tr>
                        <tr  >
                               <td>Địa chỉ người nhận</td>
                               <td>
                                   <input type="text" name="diachi" class="form-control" style="margin-left: 30px; margin-top:10px">
                               </td>
                        </tr>
                        <tr >
                               <td>Ghi chú</td>
                               <td>
                               <textarea rows="5" cols="" name="ghichu" id="input" class="form-control" style="margin-left: 30px; margin-top:10px" >
                                </textarea>
                               </td>
                        </tr>

                     </table>
                    <input type="submit" name="orderclick" value="Đặt hàng" class="btn btn-success">
                    <input type="submit" name="updateclick" value="Cập nhật" class="btn btn-success">
                </div>
                
            </form>
            </div>
        </div>
    </div>
</div>
