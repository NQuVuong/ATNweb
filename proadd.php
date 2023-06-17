<?php
include_once "connect.php";


if(isset($_POST['btnSubmit'])){

    

    $img = str_replace(' ', '_', $_FILES['Pro_image']['name']);
    $storedImage = "./images/";
    $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'], $storedImage.$img);

    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $des = $_POST['des'];
    $quantity = $_POST['quantity'];
    $cat_id = $_POST['cat_id'];
    $user_id = $_POST['user_id'];
    $supid = $_POST['supid'];
    // $date = date('Y-m-d', strtotime($_POST['created']));
    
    
    if($flag){
    $c = new connect();
    $dblink = $c->connectToPDO();

  
    $sql = "INSERT INTO `product`(`pid`, `pname`, `price`, `status`, `image`, `des`, `quantity`, `cat_id`,`user_id`,`supid`) VALUES (?,?,?,?,?,?,?,?,?,?)";

    $re = $dblink->prepare($sql);
    // $stmt = $re-> execute(array("P09","LOL2","0",1,"$img","Action",100,"C01"));
    $stmt = $re-> execute(array("$pid","$pname","$price","$status","$img","$des","$quantity","$cat_id","$user_id","$supid"));
       
    if ($stmt == TRUE)
    {
        echo '<p style="color: red">"Add product successfully"</p>';
    }             
    else{
        echo '<p style="color: red">"Add product Failed"</p>';
    }
    }
}
?>
<head>
        <link rel="stylesheet" href="css/mycustomweb.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>      
        <meta name="viewport" content="width:device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta charset="UTF-8">
        <title>Epic Game Store</title>
    </head>
    
<div id="main" class="container mt-4">     
                        <form class="form form-vertical" method="POST" action="#"  enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">

                                <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_pid" style="color:white" >Product ID</label>
                                            <input type="text" name="pid" id="pid" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_pname" style="color:white">Product Name</label>
                                            <input type="text" name="pname" id="name" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_price" style="color:white">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_status" style="color:white">Status</label>
                                            <input type="text" name="status" id="status" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image-vertical" style="color:white">Image</label>
                                            <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_description" style="color:white">Description</label>
                                            <input type="text" name="des" id="des" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_quantity" style="color:white">Quantity</label>
                                            <input type="text" name="quantity" id="quantity" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_cat_id" style="color:white">Category ID</label>
                                            <input type="text" name="cat_id" id="cat_id" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_user_id" style="color:white">User ID</label>
                                            <input type="text" name="user_id" id="user_id" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txt_sup_id" style="color:white">Supplier ID</label>
                                            <input type="text" name="supid" id="supid" class="form-control" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-flex mt-3 justify-content-left">
                                        <button class="btn btn-warning me-1 mb-1 rounded-pill" ><a href="index.php">Back to index</a></button>
                                        <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" name="btnSubmit">Submit</button>
                                        <button type="reset" class="btn btn-warning me-1 mb-1 rounded-pill" name="Reset" value="Reset" tabindex="50">
                                        Clear the fields</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
    </div> 
    
    

    <!--main-->