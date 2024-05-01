<?php
include 'Cart.class.php'; 
include 'connect.php';
$cart = new Cart;
$redirectLoc = 'shop.php'; 
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 

    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){ 
        $productID = $_REQUEST['id']; //id from link to a variable

         // Get product details 
        $query = "SELECT * FROM product WHERE p_id = ".$productID; 
        $run = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($run); 
        $itemData = array( 
            'id' => $row['p_id'], 
            'name' => $row['p_name'], 
            'price' => $row['p_price'], 
            'img' => $row['p_image'], 
            'qty' => 1 
        ); 
 //echo $itemData["qty"];
     $insertItem = $cart->insert($itemData); 
       $redirectLoc = $insertItem?'shop-cart.php':'shop.php'; 
    }
    elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){ 
        // Update item data in cart 
        $itemData = array( 
            'rowid' => $_REQUEST['id'], 
            'qty' => $_REQUEST['qty'] 
        ); 
        $updateItem = $cart->update($itemData); 
         
        // Return status 
        echo $updateItem?'ok':'err';die; 
    }
    elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){ 
        // Remove item from cart 
        $deleteItem = $cart->remove($_REQUEST['id']); 
         
        // Redirect to cart page 
        $redirectLoc = 'shop-Cart.php'; 
    }

    else if($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0){ 
     //   echo "after";
       // $redirectLoc = 'checkout.php'; 
     
        // Store post data 
        $_SESSION['postData'] = $_POST; 

       
       
        $name = $_POST['fname']; 
        $fname = $_POST['lname']; 
        $email = $_POST['email']; 
        $addresss = $_POST['address'];
        $total = $_POST['grandtotal'];
      
    
                // Insert order info in the database 
                //$q="INSERT INTO order (o_f_Name, o_l_Name, o_email_address, o_grand_total, created) VALUES ('".$name."','".$fname."','".$email."', '".$cart->total()."', NOW())";
                $q="INSERT INTO `order`(`o_f_Name`, `o_l_Name`, `o_email_address`,`o_address`, `o_grand_total`, `created`) VALUES ('".$name."','".$fname."','".$email."','".$addresss."','".$cart->total()."', NOW())";
                $run=mysqli_query($con,$q);
                //echo "abc";
                if($run){ 
                    $orderID = $con->insert_id; 
                    //echo "abc1";
                    // Retrieve cart items 
                    $cartItems = $cart->contents(); 
                     
                    //echo "abc2";
                    // Prepare SQL to insert order items 
                    $sql = ''; 
                    foreach($cartItems as $item){ 
                        //$sql .= "INSERT INTO order_items (o_id, p_id, o_i_quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');"; 
                        $sql .= "INSERT INTO `order_items`(`o_id`, `p_id`, `o_i_quantity`) VALUES ('".$orderID."','".$item['id']."','".$item['qty']."');";
                    } 
                    //echo "abc3";
                    // Insert order items in the database 
                    $insertOrderItems = $con->multi_query($sql); 
                    //echo "abc4";
                    if($insertOrderItems){ 
                        // Remove all items from cart 
                        $cart->destroy(); 
                        //echo "abc5";
                        // Redirect to the status page 
                        $redirectLoc = 'orderSuccess.php?id='.$orderID; 
                    }
                }
           else{
               echo mysqli_error($con);
           }
        
      //  $_SESSION['sessData'] = $sessData; 
    } 
} 
 
// Redirect to the specific page 
header("Location: $redirectLoc"); 
exit();
?>