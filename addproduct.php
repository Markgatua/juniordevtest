<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="./styles/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Product Add</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form class="d-flex" role="search" method="POST" action="addproduct.php">
                        <input type="submit" name="submit" value="submit" class="btn btn-outline-success"
                            placeholder="Save">
                        <a class="btn btn-outline-primary" href="index.php" type="submit">Cancel</a>

                </div>
            </div>

        </nav>


    </header>

    <body>
        <hr>
        <div classs="container-fluid" id="container-form">

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-10">
                    <input type="text" name="sku" class="form-control" id="inputEmail3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="pname" class="form-control" id="inputPassword3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Price ($)</label>
                <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="inputPassword3" required>
                </div>
            </div>
            <div class="col-auto">
                <label class="visually-hidden" for="autoSizingSelect">Type Switcher</label>
                <select name="type" class="form-select" id="autoSizingSelect" required>
                    <option selected>Choose Type...</option>
                    <option value="Disc">Disc</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
            </div>
            <br>
            <div class="disc-input">
                <h4>Disc</h4>
                <div class="row mb-3" id="dimensions"><label for="inputEmail3"
                        class="col-sm-2 col-form-label">Size(MB)</label>
                    <div class="col-sm-6"><input name="size" type="text" class="form-control" id="inputEmail3"></div>
                </div>
            </div>
            <div class="furniture-input">
                <h4>Furniture</h4>
                <div class="row mb-3" id="dimensions"><label for="inputEmail3"
                        class="col-sm-2 col-form-label">Height(CM)</label>
                    <div class="col-sm-6"><input name="fheight" type="text" class="form-control" id="inputEmail3"></div>
                </div>
                <div class="row mb-3" id="dimensions"><label for="inputEmail3"
                        class="col-sm-2 col-form-label">Width(CM)</label>
                    <div class="col-sm-6"><input name="fwidth" type="text" class="form-control" id="inputEmail3"></div>
                </div>
                <div class="row mb-3" id="dimensions"><label for="inputEmail3"
                        class="col-sm-2 col-form-label">Length(CM)</label>
                    <div class="col-sm-6"><input name="fbredth" type="text" class="form-control" id="inputEmail3"></div>
                </div>
            </div>
            <div class="book-input">
                <h4>Book</h4>
                <div class="row mb-3" id="dimensions"><label for="inputEmail3"
                        class="col-sm-2 col-form-label">Weight(KG)</label>
                    <div class="col-sm-6"><input name="weight" type="text" class="form-control" id="inputEmail3"></div>
                </div>
            </div>

            <script>
            $('select').on('change', function() {
                if (this.value == "Disc") {
                    $('.disc-input').show();
                    $('.book-input').hide();
                    $('.furniture-input').hide();
                } else if (this.value == "Furniture") {
                    $('.furniture-input').show();
                    $('.disc-input').hide();
                    $('.book-input').hide();
                } else if (this.value == "Book") {
                    $('.book-input').show();
                    $('.disc-input').hide();
                    $('.furniture-input').hide();
                }
            });
            </script>


            </form>
            <?php 
  
        if (isset($_POST['submit'])) {
            $sku = $_POST['sku'];
            $pname = $_POST['pname'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $psize = $_POST['size'];
            $fheight = $_POST['fheight'];
            $fwidth = $_POST['fwidth'];
            $fbredth = $_POST['fbredth'];
            $weight = $_POST['weight'];
    

        
            include 'database.php';
            $d = new database();
            $d->insert('productsTable',['sku'=>$sku,'pName'=>$pname, 'pPrice'=>$price, 'pType'=> $type, 'pSize'=>$psize, 'fheight'=>$fheight, 'fwidth'=>$fwidth, 'fbredth'=>$fbredth, 'pweight'=>$weight]);

           
            if ($d == true) {
                header('location:index.php');
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        }
?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
    </body>

    <div class="container my-5">

        <footer class="bg-dark text-center text-lg-start text-white">
            <!-- Grid container -->
            <div class="container p-4" id="p4">
                <h4>Scandiweb Test Assignment</h4>
            </div>
        </footer>

    </div>

</html>