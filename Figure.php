<?php
include_once ("connect.php");
include_once ("header.php");
?>
<div class="container px-4 py-5" style="float:left">
        <h2 style="color:white">Figure</h2>
        <div class="row">
<?php
                $c = new connect();
                $dblink = $c->connectToPDO();
            
                
                $sql = "SELECT * FROM product WHERE cat_id LIKE ?";
               
                $re = $dblink->prepare($sql);
                             
                $re-> execute(array("C01" ));
                $rows = $re->fetchAll(PDO::FETCH_BOTH);
	          
                foreach ($rows as $r): 
                    
                ?>
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <img
                            src="./images/<?=$r['image']?>"
                            class="card-img-top"
                            alt="Product1>" style="margin: auto;
                            width: 300px; height: 250px"
                            >
                            <div class="card-body">
                                <a href="detail.php?id=<?=$r['pid']?>" class="text-decoration-none">
                                <h5 class="card-title"><?=$r['pname']?></h5></a>
                                <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$r['price']?></h6>
                                <a href="detail.php" class="btn btn-primary">Show more</a>
                            </div>
                        </div>
                    </div>
                            <?php
                            endforeach; 
                            ?>
        </div> 
        <?php
include_once ("footer.php");
?>  