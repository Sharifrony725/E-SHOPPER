<?php
if (isset($_POST['btn'])) {
    $message = $obj_app->upate_cart_product_info($_POST);
}

if (isset($_GET['status'])) {
    $cart_product_id = $_GET['id'];
    $message = $obj_app->delete_cart_product_info($cart_product_id);
}

$session_id = session_id();
$query_result = $obj_app->select_cart_product_by_session_id($session_id);

?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <h2><?php if (isset($message)) {
                        echo $message;
                        unset($message);
                    } ?></h2>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $sum = 0;
                    while ($cart_product = mysqli_fetch_assoc($query_result)) { ?>

                        <tr>
                            <td class="cart_product">
                                <a href=""><img width="100" src="assets/<?php
                                                                        echo $cart_product['product_image'] ?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $cart_product['product_name'] ?></a></h4>
                                <p>Product ID: <?php echo $cart_product['product_id'] ?></p>
                            </td>
                            <td class="cart_price">
                                <p>BDT <?php echo $cart_product['product_price'] ?></p>
                            </td>
                            <td class="cart_quantity">
                                <form action="" method="POST">
                                    <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="text" name="product_quantity" value="<?php echo $cart_product['product_quantity'] ?>" autocomplete="off" size="2">
                                        <input class="cart_quantity_input" type="hidden" name="temp_cart_id" value="<?php echo $cart_product['temp_cart_id'] ?>" autocomplete="off" size="2">
                                        <input name="btn" type="submit" value="Update">
                                    </div>
                                </form>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">BDT
                                    <?php
                                    $total = $cart_product['product_price'] * $cart_product['product_quantity'];
                                    echo $total;
                                    ?>
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="?status=delete&&id=<?php echo $cart_product['temp_cart_id']; ?>">
                                    <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php $sum = $sum + $total;
                    } ?>

                </tbody>
            </table>
            <table class="table table-bordered table-condensed" style="width:60%;float:right;text-align:center">
                <thead>
                    <tr>
                        <td class="cart_price" style="background-color: #FE980F;color:white;">
                            <h5>Sub Total</h5>
                        </td>
                        <td class="cart_price" style="color: #FE980F;font-size:18px">BDT <?php echo $sum; ?></td>
                    </tr>
                    <tr>
                        <td class="cart_price" style="background-color:#FE980F;color:white;">
                            <h5>Vat Total</h5>
                        </td>
                        <td class="cart_price" style="color: #FE980F;font-size:18px">BDT
                            <?php $vat = ($sum * 15) / 100;
                            echo  $vat;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_price" style="background-color: #FE980F;color:white;">
                            <h5>Grand Total</h5>
                        </td>
                        <td class="cart_price" style="color: #FE980F;font-size:18px">BDT
                            <?php
                            $grand_total = $sum + $vat;
                            $_SESSION['order_total'] = $grand_total;
                            echo $grand_total;
                            ?></td>
                    </tr>

                </thead>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    $customer_id = isset($_SESSION['customer_id']);
                    $shipping_id = isset($_SESSION['shipping_id']);
                    if ($customer_id == NULL && $shipping_id == NULL) { ?>
                        <a href="checkout.php" class="btn btn-primary pull-right">Checkout</a>
                    <?php } elseif ($customer_id != NULL && $shipping_id == NULL) { ?>
                        <a href="shipping.php" class="btn btn-primary pull-right">Checkout</a>
                    <?php } elseif ($customer_id != NULL && $shipping_id != NULL) { ?>
                        <a href="payment.php" class="btn btn-primary pull-right">Checkout</a>
                    <?php } ?>
                    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>