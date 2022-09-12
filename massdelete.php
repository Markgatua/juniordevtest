<?php

if (isset($_POST['delete-product-btn'])) {
    $all_id= $_POST['delete-checkbox'];
    $extract_id = implode(',', $all_id);
    echo $extract_id;

    include './connect/conn.php';

    $query = "DELETE FROM productsTable WHERE id IN($extract_id)";
    $query_run = mysqli_query($conn, $query);

    if ($query_run){
        header('Location:index.php');
    }else{
        echo "Error";
    } 
}


?>