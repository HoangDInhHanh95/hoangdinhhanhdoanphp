<?php 
//session_start();
include 'header.php';// trong này có kết nối csdl
//  include 'listproduct.php';

 ?>
<head>
<style>
.change_color_name:hover
{
    color: blue;
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

    /*
        // bản lưu hoàn chỉnh

        // sử lý tính toán phân trang 
        // bai hoan chinh
        // lấy giá trị id của bang product
        $cate_id = $_GET['id'];
        // lấy tất cả sản phẩm thuộc cate_id
        $sql = "SELECT * FROM product WHERE cateid = $cate_id"; 
        //cateid = $cateid AND => thu
        $query = mysqli_query($conn,$sql); 
     // start phân trang 
    $getidlist = "id=".$cate_id;
    $item_per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 8;// số sản phẩm
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;// sô trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    //echo $item_per_page.'<br />';
    // lấy sp theo giới hạn để phân trang, limit offset, limit
    $products = mysqli_query($conn,"SELECT * FROM product where cateid = $cate_id ORDER BY masp DESC LIMIT $offset, $item_per_page");
    //$totalRecords = mysqli_query($conn,"SELECT * FROM product"); 
    $totalRecords = $query->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    //****end  phân trang ******  
    */
     // sử lý tính toán phân trang 
     // bai hoan chinh
     // truy vấn search : SELECT * FROM `product` WHERE `tensp` LIKE '%Oppo%'
     //$sql = "SELECT * FROM product WHERE cateid = $cate_id or 'tensp` LIKE '%" .$search. "%' "; 
    // lấy giá trị id của bang product
    $search = isset($_GET['name']) ? $_GET['name'] : "";
    // lấy tất cả sản phẩm thuộc cate_id
    $cate_id = isset($_GET['id']) ? $_GET['id'] : "";  // lay gia tri id cua catei id
     // start phân trang 
    $getidlist = "id=".$cate_id;
    $item_per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 12;// số sản phẩm
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;// sô trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    // diều kiện ktra tim kiếm
    if($search)
    {
        
        //  $products = mysqli_query($conn,"SELECT * FROM product where cateid = $cate_id ORDER BY masp DESC LIMIT $offset, $item_per_page");
        //$sql = "SELECT * FROM product WHERE 'tensp` LIKE '%". $search ."%' "; 
        //$query = mysqli_query($conn,"SELECT * FROM product WHERE 'tensp` LIKE '%". $search ."%' "); 
        // dung de lay san pham ra
        $products = mysqli_query($conn,"SELECT * FROM product WHERE `tensp` LIKE '%". $search ."%' ORDER BY masp DESC LIMIT ".$item_per_page." OFFSET ".$offset);
        // dung de  danh so trang
        $totalRecords =mysqli_query($conn,"SELECT * FROM product WHERE `tensp` LIKE '%". $search ."%'");
        $totalRecords = $totalRecords->num_rows; // lây tông số sản phẩm hiên có trong table
        $totalPages = ceil($totalRecords/$item_per_page);// $totalPages tổng số trang hiển thị sản phẩm
    }
    else
    {
        $sql = "SELECT * FROM product WHERE cateid = $cate_id"; 
        //cateid = $cateid AND => thu
        $query = mysqli_query($conn,$sql); 
         // lấy sp theo giới hạn để phân trang, limit offset, limit
        $products = mysqli_query($conn,"SELECT * FROM product where cateid = $cate_id ORDER BY masp DESC LIMIT $offset, $item_per_page");
        //thu 
        $totalRecords = $query->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
    }
    
    //$totalRecords = mysqli_query($conn,"SELECT * FROM product"); 
   
    //****end  phân trang ****** 
  
?>
 
<div class="container">
    <div class="col-sm-3">
        <?php include 'categoryproduct.php';
        ?>
    </div>
    <div class="col-sm-9">
        <div class="row">
            <?php while($rows = mysqli_fetch_array($products)) {?>
                <div class="col-sm-3 change_box">
                    <a href="detailproduct.php?id=<?php echo $rows['masp'] ?>">
                        <div class="product-img">
                            <img src="uploads/<?php echo $rows['anh']?>" alt="" width="100%" height="180px" class="rungrung"/>
                        </div>
                    </a>
                    <h3 class="change_color_name"> 
                        <a href="detailproduct.php?id=<?php echo $rows['masp'] ?>" style="text-decoration:none;">
                            <strong><?php echo $rows['tensp']?></strong>
                        </a>  
                    </h3>
                    <label for=""> Giá:</label> <span ><del class="change_color_price"><?php echo number_format($rows['giacu']) ?> </del> đ</span><br>
                    <label for="">Giảm còn:</label> <span class="product-price"><?php echo number_format($rows['giamoi']) ?> </span>đ<br>
                    <p>Số lượng hiện có: <?php echo $rows['soluong']?> </p>
                    <a href="shopping_cart.php">
                        <button type="button" class="btn btn-primary">Mua hàng</button> 
                    </a> 
                </div>
            <?php } ?>
        </div>
        <?php include 'category_listproduct.php';?>
    </div>
   
</div>
 


<?php include 'footer.php';?>