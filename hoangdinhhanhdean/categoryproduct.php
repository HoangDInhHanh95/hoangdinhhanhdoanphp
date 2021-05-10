
<?php include 'connect.php';
// $search = isset($_GET['name']) ? $_GET['name'] : "";
// $param = "name=".$search;
// cái hiện dánh sách nhà sản xuất 

?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Website Bán Điện Thoại</title>
<link rel="stylesheet" href="site.css">
<meta charset="utf-8">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen">
<style>
  .font_size:hover{
      font-size: 3rem;
      color: #88328a;
      font-weight: bold;
  }
</style>
</head>
<!-------------------------------------------------------------------------------->
<?php
    $sql ="SELECT * FROM `category`";
    $category= mysqli_query($conn,$sql) or die($sql);
?>
<!-------------------------------------------------------------------------------->
<table class="table table-bordered table-hover " >
    <tr >
        <th style="font-size:2.5rem; text-align:center; background-color:#f04ca3; color:#8ded20">
            Danh Mục 
        </th>
    </tr>
    <?php while( $row = mysqli_fetch_array($category)){ //echo $row['cateid'];?>
        <tr>
            <td style="font-size:2rem; text-align:center">
                <a href="listproduct.php?id=<?php echo $row['cateid']?>"
                    class="font_size" style="font-weight: bold;text-decoration:none;"><?php echo $row['nhasanxuat'] ?>
                </a>
            </td>
        </tr>
        
     <?php } ?>
</table>