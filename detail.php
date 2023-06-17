<?php
include_once 'header.php';
?>
<div class="container px-4 py-5">
    <?php
    if(isset($_GET['id'])):
        $pid = $_GET['id'];
        require_once 'connect.php';
        $c = new connect();
        $db_link = $c -> connectToPDO();
        $sql = "SELECT * FROM product where pid = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
    <div class="container px-4 py-5" style="float:left">
    <h2 style="color:white"><?=$re['pname']?></h2>
    <div style="display:flex">
        <div>
            <img src="./images/<?=$re['image']?>" style="width:90%">
        </div>
    <ul style="list-style-type: none; color:white;" class="list-group">
        Price: <li class="list-group-item" ><?=$re['price']?></li>
        Quantity: <li class="list-group-item" ><?=$re['quantity']?></li>
        Description: <li class="list-group-item" ><?=$re['des']?></li>
        Dowload:
    <form action="cart.php" method="GET">
        <div>
            <input type="hidden" name="pid" value="<?=$pid?>">
            <input type="submit" class="btn btn-primary shop button" name="btnAdd" value="Add to DOWNLOAD" /> 
        </div>
    </form>
    </ul>
    </div>
    </div>
<?php
    else:
        ?>
        <h2>Nothing to show</h2>
        <?php
    endif;
    ?>
</div>
<?php
include_once'footer.php';
?>