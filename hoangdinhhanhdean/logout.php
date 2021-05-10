<?php 
    //session_start();
    include 'header.php';// đã có kết nối csdl  biên $conn 
    session_destroy();
    //header('Location: http://localhost:8080/hoangdinhhanhdean/login_customer.php');
    //header("Location: information_customer.php"); // tai sao nó bi lỗi
    echo '<script type="text/javascript">window.location.replace("login_customer.php")</script>';

?>
