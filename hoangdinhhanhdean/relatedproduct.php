
<?php include 'bootstrap.php';?>
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
        $getid = $_GET['id'];// lấy gia tri id
        // hiển thị sản phẩm liên quan ban chuan theo 3 san pham
        // $cateid nam ben trang detailproduct.php 
        $selectloai = "SELECT * FROM product  WHERE cateid = $cateid AND masp != $getid ORDER BY RAND() limit 0, 3";
        $resultother = mysqli_query($conn,$selectloai);
        $n = mysqli_num_rows($resultother);    
        while($queries = mysqli_fetch_array($resultother)) {  
        ?>       
            <div class="col-sm-4">
                <a href="detailproduct.php?id=<?php echo $queries['masp'] ?>">
                    <div class="product-img">
                        <img src="uploads/<?php echo $queries['anh']?>" alt="" width="100%" height="200px" class="rungrung"/>
                    </div>
                 </a>
                <h3 > 
                    <a href="detailproduct.php?id=<?php echo $queries['masp'] ?>"   style="text-decoration:none;">
                            <strong class="change_color_name"><?php echo $queries['tensp']?></strong>
                    </a>  
                </h3>
                    <label for=""> Giá:</label> <span ><del class="change_color_price"><?php echo number_format($queries['giacu']) ?> </del> đ</span><br>
                    <label for="">Giảm còn:</label> <span class="product-price"><?php echo number_format($queries['giamoi']) ?> </span>đ<br>
                    <p>Số lượng hiện có: <?= $queries['soluong']?> </p>
                    <a href="addcart.php?id=<?=$queries['masp']?>">
                        <button type="button" class="btn btn-primary">Mua hàng</button>  
                    </a>
            </div>
        <?php } ?>
            
