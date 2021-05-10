<?php include 'bootstrap.php';
    $param = "name=".$search;

?>
 <!-- hiển thị trang đầu--->
<?php if($current_page > 3){ $first_page = 1; ?>
    <a class="btn btn-default" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$first_page?>">First</a>
<?php } ?>
<!-- *************--->
<!-- in ra trang  lui về trước 1 trang---->
<?php if($current_page > 1){ $prev_page = $current_page -1; ?>
    <a class="btn btn-default" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$prev_page?>">Prev</a>
<?php }?>

<!-- *********start num page ****--->
    <?php for($num = 1; $num<=$totalPages;$num++){ ?>
        <?php if($num!=$current_page){ ?>
            <?php if($num> $current_page-3 && $num<$current_page+3){ // $num số trang?>
                
                    <a class="btn btn-default" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
            <?php }?>
        <?php }else{?>
            <strong class="btn btn-warning"><?=$num?></strong>
        <?php }?>
        
    <?php }?>
    <!-- ******end num page *******--->
    <!-- in ra trang kế tiếp---->
<?php if($current_page < $totalPages - 1)// nếu trang next mà = trang cuối thì ko cần hiển thị
{ $next_page = $current_page + 1; ?>
    <a class="btn btn-default" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$next_page?>">Next</a>
<?php }?>
    <!-- hiển thị trang cuối--->
<?php if($current_page < $totalPages -3){ $end_page = $totalPages; ?>
    <a class="btn btn-default" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$end_page?>">Last</a>
<?php } ?>


    