<?php
    include '../connect.php';
    if(isset($_GET['id']))
    {
        $id =  $_GET['id'];// gtri id tren url
        $sql= "DELETE FROM product WHERE masp = $id";
        $query = mysqli_query($conn,$sql);

        // kiem tra
        if($query)
        {
            header('location: product.php');
        }
        else{
            echo "Lỗi rồi".mysqli_error($conn);
        }
    }

?>