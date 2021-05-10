<?php 
//session_start();
include 'header.php';// trong này có kết nối csdl
//  include 'listproduct.php';
/* ******
    // lưu bài phan trang 
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;// số sản phẩm
    $current_page = !empty($_GET['page'])?$_GET['page']:1;// sô trang hiện tại
    $offset = ($current_page - 1) * $item_per_page; // so trang - 1 * với số sản phâm muốn hiển thị
    // code phân 
    $products = mysqli_query($conn,"SELECT * FROM product ORDER BY masp DESC LIMIT ".$item_per_page." OFFSET ".$offset);
    $totalRecords =mysqli_query($conn,"SELECT * FROM product"); // query tất cả các sản phẩm
    $totalRecords = $totalRecords->num_rows; // lây tông số sản phẩm hiên có trong table
    $totalPages = ceil($totalRecords/$item_per_page);// $totalPages tổng số trang hiển thị sản phẩm
* */

 ?>
<head>
<style>
.change_color_name:hover
{
    color: #ca00e3;
    font-weight: bold;
}
.change_color_price{
    font-size: 15px;
    color: red;
    

}

.product-price{
    font-size: 15px;
    color: red;
}
div.change_box{
    margin-top:2rem ;
    margin-bottom: 2rem;
}
.rungrung:hover {
    animation: shake 1.2s;
    animation-duration: 1.2s;
    animation-timing-function: ease;
    animation-delay: 0s;
    animation-iteration-count: infinite;
    animation-direction: normal;
    animation-fill-mode: none;
    animation-play-state: running;
    animation-name: shake;
    animation-iteration-count: infinite;
}


</style>
</head>
<?php
    // sử lý tính toán phân trang
    //************ lay gi tri nhap vao  **************** */
    // tam thoi de day neu ko dc chuyen sang file header.php
    $search = isset($_GET['name']) ? $_GET['name'] : "";
    //**************************** */
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 12;// số sản phẩm
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;// sô trang hiện tại
    $offset = ($current_page - 1) * $item_per_page; // so trang - 1 * với số sản phâm muốn hiển thị
    // code phân trang  SELECT * FROM `product` WHERE `tensp` LIKE '%Oppo%'
    if($search)
    {
        $products = mysqli_query($conn,"SELECT * FROM product WHERE `tensp` LIKE '%". $search ."%' ORDER BY masp DESC LIMIT ".$item_per_page." OFFSET ".$offset);
        // query tất cả các sản phẩm
        $totalRecords =mysqli_query($conn,"SELECT * FROM product WHERE `tensp` LIKE '%". $search ."%'"); 
    }
    else
    {
        $products = mysqli_query($conn,"SELECT * FROM product ORDER BY masp DESC LIMIT ".$item_per_page." OFFSET ".$offset);
        $totalRecords =mysqli_query($conn,"SELECT * FROM product"); // query tất cả các sản phẩm
    }

    $totalRecords = $totalRecords->num_rows; // lây tông số sản phẩm hiên có trong table
    $totalPages = ceil($totalRecords/$item_per_page);// $totalPages tổng số trang hiển thị sản phẩm
 ?>
 <div class="container " >
    <div class="col-sm-3">
        <?php include 'categoryproduct.php'?>
       
    </div>
    <div class="col-sm-9">
        <div class="row">
            <?php while($row = mysqli_fetch_array($products)) {?>
                <div class="col-sm-3 change_box">
                    <a href="detailproduct.php?id=<?php echo $row['masp'] ?>">
                    <div class="product-img">
                        <img src="uploads/<?php echo $row['anh']?>" alt="" width="100%" height="180px" class="rungrung"/>
                    </div>
                    </a>
                    <h3 > 
                        <a href="detailproduct.php?id=<?php echo $row['masp'] ?>"   style="text-decoration:none;">
                            <strong class="change_color_name"><?php echo $row['tensp']?></strong>
                        </a>  
                    </h3>
                    <label for=""> Giá:</label> <span ><del class="change_color_price"><?php echo number_format($row['giacu']) ?> </del> đ</span><br>
                    <label for="">Giảm còn:</label> <span class="product-price"><?php echo number_format($row['giamoi']) ?> </span>đ<br>
                    <p>Số lượng hiện có: <?php echo $row['soluong']?> </p>
                    <a href="addcart.php?id=<?=$row['masp']?>" class="btn btn-sx btn-info">
                       Mua hàng
                    </a>
                    
                </div>
            <?php } ?>
        </div>
        <?php include 'pagination.php'; ?>
    </div>
    
</div>


<?php include 'footer.php';?>