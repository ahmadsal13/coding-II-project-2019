                                
<?php
session_start();

  
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count                             = count($_SESSION["shopping_cart"]);
            $item_array                        = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="checkout.php"</script>';
        }
    } else {
        $item_array                   = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="checkout.php"</script>';
            }
        }
    }
}
?>  
<?php 
    include 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="main.js"></script>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team Dev 3.0 project!</title>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="shortcut icon" href="/css/pageicon.jpg" type="vortexlogo/ico"/>
    <script src="/jquery-3.3.1.min.js"></script>
  </head>
<body class="boxborder4" >  
    <?php
        require 'navbarpages.php';
    ?>
        <br />  
    <div class="container" style="width:100%;">
                <h3 class="titlecheckout">Summary & Purchase</h3><br><br><br>
                <h3 class="titlecategorycheckout"><br>Packages</h3><br><br>
                <?php
                    $query  = "SELECT * FROM tbl_product ORDER BY id ASC";
                    $result = mysqli_query($conn3, $query);

                    while ($row=mysqli_fetch_array($result)) {
                ?>  
            <div class="col-md-4">  
                <form class="formcheckout" method="post" action="checkout.php?action=add&id=
                        <?php echo $row["id"];?>">  
                    <div class="checkoutboxes" align="center">  
                        <img width="250" height="200" src= "<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                        <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                        <h4 class="text-danger">$ <?php echo $row["price"];?></h4>  
                        <input type="text" name="quantity" class="form-control" value="1" />  
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                        
                    </div>  
                </form>
            </div> 
            <?php } ?>  
            <div style="clear:both"></div>  
                <br />
            <div class="table-responsive">  
                <table class="tablecheckout">
                    <tr>
                        <th class="headertablecheckout" width="40%">Item Name</th>  
                        <th class="headertablecheckout" width="10%">Quantity</th>  
                        <th class="headertablecheckout" width="20%">Price</th>  
                        <th class="headertablecheckout" width="15%">Total</th>  
                        <th class="headertablecheckout" width="5%">Action</th>  
                    </tr>  
                        <?php
                            if (!empty($_SESSION["shopping_cart"])) {
                            $total = 0;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        ?>  
                    <tr>  
                        <td class="infocheckout"><br><?php echo $values["item_name"]; ?></td>  
                        <td class="infocheckout"><br><?php echo $values["item_quantity"]; ?></td>  
                        <td class="infocheckout"><br>$ <?php echo $values["item_price"]; ?></td>  
                        <td class="infocheckout"><br>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                        <td class="infocheckout"><br><a href="checkout.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                    </tr>  
                        <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                        ?>  
                    <tr> 
                        <td colspan="4" class="totalcheckout"><br><br>Total : </td>  
                        <td align="left"><br><br>  $ <?php echo number_format($total, 2); ?></td>  
                    </tr>  
                        <?php
                            }
                        ?>  
                </table>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="2R2F8U76JTM4Q">
<input class="submitbtncheckout" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

        <br><br> 
    </div>


<?php
    require 'footer.php';
?>
</body>  
</html>
<!--
    ___                                           _____      
    |__| |_  _____  ___  __|        ___ ___ __|     |     | - ___ ___
    |  | | | | | |  |_|  |_|        |_| | | |_|   |_| |_| | | |_| | |
    
      (
    ( ,)
   ). ( )
  (, )' (.     ____   _____                    _____    ______
 \WWWWWWWW/    |   \  |     \      /               /    |    |      
  '--..--'     |    \ |___   \    /          _____/     |    |             
     }{        |    / |       \  /               /      |    |             
     {}        |___/  |____    \/           ____/  []   |____|              
                                                                



__/\\\\\\\\\\\\______/\\\\\\\\\\\\\\\___/\\\________/\\\____________________________/\\\\\\\\\\______________/\\\\\\\____        
 _\/\\\////////\\\___\/\\\///////////___\/\\\_______\/\\\__________________________/\\\///////\\\___________/\\\/////\\\__       
  _\/\\\______\//\\\__\/\\\______________\//\\\______/\\\__________________________\///______/\\\___________/\\\____\//\\\_      
   _\/\\\_______\/\\\__\/\\\\\\\\\\\_______\//\\\____/\\\__________________________________/\\\//___________\/\\\_____\/\\\_     
    _\/\\\_______\/\\\__\/\\\///////_________\//\\\__/\\\__________________________________\////\\\__________\/\\\_____\/\\\_    
     _\/\\\_______\/\\\__\/\\\_________________\//\\\/\\\______________________________________\//\\\_________\/\\\_____\/\\\_   
      _\/\\\_______/\\\___\/\\\__________________\//\\\\\______________________________/\\\______/\\\__________\//\\\____/\\\__  
       _\/\\\\\\\\\\\\/____\/\\\\\\\\\\\\\\\_______\//\\\______________________________\///\\\\\\\\\/_____/\\\___\///\\\\\\\/___ 
        _\////////////______\///////////////_________\///_________________________________\/////////______\///______\///////_____


--->    
