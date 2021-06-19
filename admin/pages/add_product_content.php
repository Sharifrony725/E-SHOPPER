<?php
require '../classes/application.php';
$obj_app = new Application();
$category_query_result = $obj_app->select_all_published_category();
$manufacturer_query_result = $obj_app->select_all_published_manufacture();
if (isset($_POST['btn'])) {
    $message = $ob_sub_admin->save_product_info($_POST);
}


?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color:green"><?php if (isset($message)) {
                                    echo $message;
                                } ?></h2>
        <div class="box-content">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <div class=" control-group">
                        <label class="control-label" for="typeahead">Product Name </label>
                        <div class="controls">
                            <input name="product_name" type="text" placeholder="enter product name">
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Name</label>
                        <div class="controls">
                            <select name="category_id" id="">
                                <option value="">---Select Category Name--</option>
                                <?php while ($category_info = mysqli_fetch_assoc($category_query_result)) { ?>

                                    <option value="<?php echo $category_info['category_id'] ?>"> <?php echo $category_info['category_name'] ?> </option>
                                <?php  }  ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Manufacturer Name</label>
                        <div class="controls">
                            <select name="manufacturer_id" id="">
                                <option value="">---Select Manufacturer Name--</option>
                                <?php while ($manufacture_info = mysqli_fetch_assoc($manufacturer_query_result)) { ?>
                                    <option value="<?php echo $manufacture_info['manufacturer_id'] ?>"> <?php echo $manufacture_info['manufacturer_name']; ?>
                                    </option>
                                <?php }  ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Price </label>
                        <div class="controls">
                            <input name="product_price" type="number" placeholder="enter product price">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Stock Amount </label>
                        <div class="controls">
                            <input name="stock_amount" type="numberr" placeholder="enter stock amount">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Minimum Stock Quantity </label>
                        <div class="controls">
                            <input name="minimum_stock_amount" type="numberr" placeholder="enter minimum stock quantity">
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Short Description</label>
                        <div class="controls">
                            <textarea name="product_short_description" class="cleditor" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Long Description</label>
                        <div class="controls">
                            <textarea name="product_long_description" class="cleditor" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Image</label>
                        <div class="controls">
                            <input name="product_image" type="file">
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Publication Status</label>
                        <div class="controls">
                            <select name="publication_status" id="">
                                <option value="">---Select Publication Status--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button name="btn" type="submit" name="" class="btn btn-primary">Add Product</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->