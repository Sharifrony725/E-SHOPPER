<?php
$customer_id = $_SESSION['customer_id'];
if (isset($_POST['shipping_btn'])) {
    $obj_app->save_shipping_info($_POST);
}
$query_result = $obj_app->select_customer_info_by_id($customer_id);
$customer_info = mysqli_fetch_assoc($query_result);
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2> Welcome <b> <?php echo $_SESSION['customer_name'] ?></b>You have to give us shipping information to complete your valuable order.If your billing information and shopping information are same then just press on Save Shipping Info Button.</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Shopping Point Here</h3>
                    <hr>
                    <form action="" method="POST" class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="first_name" class="col-md-4 control-label">Full Name</label>
                                <div class="col-md-8">
                                    <input value="<?php echo $customer_info['first_name'] . ' ' . $customer_info['last_name'] ?>" class="form-control" type="text" name="full_name" placeholder="Enter your first name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-8">
                                    <input value="<?php echo $customer_info['email'] ?>" class="form-control" type="email" name="email" placeholder="Enter your email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-8">
                                    <input value="<?php echo $customer_info['phone_number'] ?>" class="form-control" class="form-control" type="number" name="phone_number" placeholder="Enter your phone number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="address" id=""><?php echo $customer_info['address']; ?></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="city" class="col-md-4 control-label">City</label>
                                <div class="col-md-8">
                                    <input value="<?php echo $customer_info['city']; ?>" class="form-control" type="text" name="city" placeholder="Enter your city">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="district" class="col-md-4 control-label">District</label>
                                <div class="col-md-8">
                                    <input value="<?php echo $customer_info['district'] ?>" class="form-control" type="text" name="district" placeholder="Enter your district">
                                </div>
                            </div>
                            <!-- button -->
                            <div class="form-group">
                                <label for="shipping_btn" class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" id="shipping_btn" name="shipping_btn" class="btn btn-primary form-control">Save Shipping Info</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>