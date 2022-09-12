<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="./styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Product List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form method="post" action="massdelete.php">
                    <a href="addproduct.php" class="btn btn-outline-success" type="submit">Add</a>
                    <button name="delete-product-btn" id="delete-product-btn" class="btn btn-outline-danger"
                        type="submit">Mass Delete</button>

            </div>
        </div>

    </nav>
    <hr>

</header>

<body>

    <div class="container">

        <?php 
         include 'database.php';
         $b = new database();
         $b->select("productsTable","*");
         $result = $b->sql;
        
        ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="hello">
            <div class="card">
                <div class="form">
                    <input class="delete-checkbox" type="checkbox" id="delete-checkbox" name="delete-checkbox[]"
                        value="<?=  $row['id']; ?>">
                </div>
                <div class="product-details">
                    <p><?php echo $row['sku']; ?></p>
                    <p><?php echo $row['pName']; ?></p>
                    <p>$<?php echo $row['pPrice']; ?></p>
                    <p><?php if($row['pType']=='Disc'){
                        echo 'Size '.$row["pSize"];
                    }elseif($row['pType']=='Furniture'){
                         echo 'Dimension '.$row["fheight"].' by'.$row["fwidth"]. ' by'.$row["fbredth"];
                        }elseif($row['pType']=='Book'){
                            echo 'Weight '.$row['pweight'].' KG';
                        }

                        ?>

                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    </form>
    <?php
        
if ($_POST['submit']==true) {
    include 'database.php';
    $e = new database();
    $
    $e->deleteall('productsTable');
}






?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>



</body>
<hr>
<div class="container my-5">

    <footer class="bg-dark text-center text-lg-start text-white">
        <!-- Grid container -->
        <div class="container p-4" id="p4">
            <h4>Scandiweb Test Assignment</h4>
        </div>
    </footer>

</div>

</html>