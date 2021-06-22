<?php
if (isset($_POST['btn'])) {
    $obj_app->save_order_info($_POST);
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2> You have to give us payment information to complete your valuable order.</h2>
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
                    <h3 class="text-center text-success">Select your Payment method</h3>
                    <hr>
                    <form action="" method="POST" class="form-horizontal">
                        <table class="table table-bordered">
                            <tr>
                                <td>Cash on Delivery</td>
                                <td><input type="radio" name="payment_type" value="cash_on_delivery"></td>
                            </tr>

                            <tr>
                                <td>Bkash</td>
                                <td><input type="radio" name="payment_type" value="baksh"></td>
                            </tr>

                            <tr>
                                <td>Nagat</td>
                                <td><input type="radio" name="payment_type" value="nagat"></td>
                            </tr>

                            <tr>
                                <td>Rocket</td>
                                <td><input type="radio" name="payment_type" value="rocket"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" name="btn" value="Confirm Order" class="btn btn-primary"></td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>