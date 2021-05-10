<?php
    include 'header.php';
    
    $queries = mysqli_query($conn,"SELECT giacu FROM product");
    $array_price = array();
    while($price = mysqli_fetch_array($queries)) {
        array_push($array_price, $price['giacu']);
    }
    $n = count($array_price);

    for($i= 0; $i < ($n-1); $i++)
    {
        for($j= ($i+1); $j< $n; $j++)
        {
            if($array_price[$i] > $array_price[$j])
            {
                $tmp = $array_price[$j];
                $array_price[$j] = $array_price[$i];
                $array_price[$i] = $tmp;
            }
        }

    }

       //print_r($array_price); 

    for ($i = 0; $i < $n; $i++){
        print_r($array_price[$i]. '  ') ;
    }
?>




