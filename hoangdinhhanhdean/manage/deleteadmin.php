<?php include '../bootstrap.php';// connected variable is $conn?>
<?php
    if(isset($_GET['id']))
    {
        $id =  $_GET['id'];// gtri id tren url
        $sql= "DELETE FROM manage WHERE idmanage = $id";
        $query = mysqli_query($conn,$sql);

        // kiem tra xem đã xóa thanh công chưa
        if($query)
        {
            echo '<script>alert("Bạn đã xóa thành công!");</script>';
            echo '<script type="text/javascript">window.location.replace("listadmin.php")</script>';
        }
        else{
            echo "Lỗi rồi".mysqli_error($conn);
        }
    }

?>