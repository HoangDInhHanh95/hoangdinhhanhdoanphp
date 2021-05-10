
<?php 
include '../bootstrap.php';// trong này có ket noi vs csdl
//$product = mysqli_query($conn, "SELECT product.*,category.nhasanxuat AS 'name_cate' FROM product JOIN category ON product.cateid = category.cateid" );
?>
<style>
.form-search{
    margin-left: 35%;
    margin-top: 20px;
    margin-bottom: 20px;
}
#search{
    width: 300px;
    height: 32px;
    border-radius: 100px;
    float: left;
    margin-right: 10px;
}
#inputsearch{
    border-radius: 100px;
    width: 100px;
}
</style>
<!-------------------------------------------------------------------------------->
<?php 
   
    $search = isset($_GET['name']) ? $_GET['name'] : "";
    if($search)
    {
        $product = mysqli_query($conn, "SELECT product.*,category.nhasanxuat AS 'name_cate' FROM product JOIN category ON product.cateid = category.cateid  WHERE `tensp` LIKE '%". $search ."%' " );
    }else{
        $product = mysqli_query($conn, "SELECT product.*,category.nhasanxuat AS 'name_cate' FROM product JOIN category ON product.cateid = category.cateid" );  
    }
    
?>
<!---------------------------------start tim kiếm----------------------------------------------->
            <div>
                <form action="" method="GET" class="form-search">
                    <input type="text"  name="name" class="form-control" id="search" value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" >
                    <input type="submit" value="Tìm kiếm" class="btn btn-danger" id="inputsearch">
                </form>
            </div>
<!------------------------------------end tìm kiếm-------------------------------------------->
<div class="container">
    <div class="row">
     <!---*************-->
        <div class="col-md-12">
            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title " style="text-align: center; color:brown; font-size: 2rem" >Danh Sách Danh Mục</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Nhà sản xuất</th>
                                <th>Dòng sản phẩm</th>
                                <th>Số lượng </th>
                                <th>Giá sản phẩm</th>
                                <th>Giá khuyến mãi</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Mô tả sản phẩm</th>
                                <th>Thời gian bảo hành</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($product as $key => $value){

                            ?>
                            <tr>
                                <td> <?php echo $key +1; ?></td>
                                <td> <?php echo $value['tensp']?></td><!--luu y bookname va cateid -->
                                <td> <?php echo $value['name_cate']?></td>
                                <td> <?php echo $value['dongsp']?></td>
                                <td> <?php echo $value['soluong']?></td>
                                <td> <del> <?php echo number_format($value['giacu']) ?> VND</del></td>
                                <td> <?php echo number_format($value['giamoi']) ?> VND</td>
                                
                                
                                <td> 
                                    <img src="../uploads/<?php echo $value['anh']?>" alt="" width="100px"/>
                                 </td>
                                 <td> <?php echo $value['mota']?></td>
                                 <td> <?php echo $value['ngaybaohanh']?></td>
                                 <td> 
                                     <a href="delete.php?id=<?php echo $value['masp']?>" class="btn btn-danger"> Xóa</a>
                                    <br/>
                                     <a href="update.php?id=<?php echo $value['masp']?>" class="btn btn-info">Sửa</a>
                                 </td>
                            </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
</div>


<!----------->
    <div class="col-md-3" style="margin-left: 87rem;">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title " style="text-align: center;">
                        Danh Mục
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="add_product.php"  class="btn btn-info" style="margin-left:4rem;margin-bottom: 5px ; "> Thêm  mới sản phẩm</a><br/>
                    <a href="category.php" class="btn btn-success"   style="margin-left:4rem" >Thêm hãng điện thoại </a>
                </div>
            </div>
        </div>
</div>
<!----------->



<script src="bootstrap/js/bootstrap.min.js"></script> 