<?php include 'bootstrap.php'; // connected database  ?>
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
div.rungrung{
    height: 60px;

}
div.bodybox{
    width: 100%;
    height: 200px;
    margin-top: 2rem;
}

div.box-img{
    float: left;
    width: 40%;
  
    
}
div.muahang
{
    float: right;   

}


</style>
</head>
<?php
    $selectloai = "SELECT * FROM product  WHERE  masp  ORDER BY masp DESC limit 0, 3";
    $resultother = mysqli_query($conn,$selectloai);
    while($queries = mysqli_fetch_array($resultother)) { 

?>
        <!---------------------chỉnh sửa mới------->
        <div class="bodybox">
            <div class="box-img">
                <a href="detailproduct.php?id=<?php echo $queries['masp'] ?>">
                    <img src="uploads/<?php echo $queries['anh']?>" alt="" width="100%" height="200px" class="rungrung" style=" border-radius: 10px; height: 150px" />
                </a>
            </div>
            <div class="box-text">
                <h3 > 
                    <a href="detailproduct.php?id=<?php echo $queries['masp'] ?>"   style="text-decoration:none;">
                        <strong class="change_color_name"><?php echo $queries['tensp']?></strong>
                    </a>  
                </h3>
                <label for=""> Giá:</label> <span ><del class="change_color_price"><?php echo number_format($queries['giacu']) ?> </del> đ</span><br>
                    <label for="">Giảm còn:</label> <span class="product-price"><?php echo number_format($queries['giamoi']) ?> </span>đ<br>
                    <p>Số lượng hiện có: <?= $queries['soluong']?> </p>
                    <a href="addcart.php?id=<?=$queries['masp']?>">
                        <button type="button" class="btn btn-primary ">Mua hàng</button>  
                    </a>
            </div>
        </div>
    <?php } ?>