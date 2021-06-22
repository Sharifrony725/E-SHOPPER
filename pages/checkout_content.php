<?php
if (isset($_POST['signup'])) {
    $obj_app->save_customer_info($_POST);
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>You have to login to complete your valuable order.If you are not registered then please register first.</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Registration Point Here</h3>
                    <hr>
                    <form action="" method="POST" class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="first_name" placeholder="Enter your first name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="last_name" placeholder="Enter your last name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" name="email" placeholder="Enter your email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" name="password" placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="col-md-4 control-label">Phone no.</label>
                                <div class="col-md-8">
                                    <input class="form-control" class="form-control" type="number" name="phone_number" placeholder="Enter your phone number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="blood_group" class="col-md-4 control-label">Blood Group</label>
                                <div class="col-md-8">
                                    <select name="blood_group" class="form-control" id="">
                                        <option value="-1">Select</option>
                                        <option value="1">A+</option>
                                        <option value="2">B+</option>
                                        <option value="3">AB+</option>
                                        <option value="4">O+</option>
                                        <option value="5">A-</option>
                                        <option value="6">B-</option>
                                        <option value="7">AB-</option>
                                        <option value="8">O-</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="address" id=""></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="city" class="col-md-4 control-label">City</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="city" placeholder="Enter your city">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="district" class="col-md-4 control-label">District</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="district" placeholder="Enter your district">
                                </div>
                            </div>
                            <!-- button -->
                            <div class="form-group">
                                <label for="signup" class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" id="signup" name="signup" class="btn btn-primary form-control">Sign Up</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!-- Login Point Here -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Login Point Here</h3>
                    <hr>
                    <form action="" class="form-horizontal">
                        <fieldset>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Email</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" name="email" placeholder="Enter your email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" name="password" placeholder="Enter your password">
                                </div>
                            </div>
                            <!-- button -->
                            <div class="form-group">
                                <label for="signup" class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" id="login" name="login" class="btn btn-primary form-control">Login</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>