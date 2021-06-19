<?php
$product_id = $_GET['id'];
$query_result = $ob_sub_admin->select_product_info_by_id($product_id);
$product_info =  mysqli_fetch_assoc($query_result);
echo "<pre>";
print_r($product_info);
exit;
if (isset($_POST['btn'])) {
    $message = $ob_sub_admin->update_product_info($_POST);
}
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product Form</h2>
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
            <form name="edit_product_form" class="form-horizontal" action="" method="POST">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Name </label>
                        <div class="controls">
                            <input value="<?php echo $product_info['product_name'] ?>" name="product_name" type="text" placeholder="enter manufacturer name">

                            <input value="<?php echo $product_info['product_id']; ?>" name="product_id" type="hidden">

                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <input value="<?php echo $product_info['category_name'] ?>" name="category_name" type="text" placeholder="enter manufacturer name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Manufacturer Name </label>
                        <div class="controls">
                            <input value="<?php echo $product_info['manufacturer_name'] ?>" name="manufacturer_name" type="text" placeholder="enter manufacturer name">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Price </label>
                        <div class="controls">
                            <input value="<?php echo $product_info['product_price'] ?>" name="product_price" type="number" placeholder="enter manufacturer name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Stock Amount </label>
                        <div class="controls">
                            <input value="<?php echo $product_info['stock_amount'] ?>" name="stock_amount" type="number" placeholder="enter manufacturer name">

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
                        <button name="btn" type="submit" name="" class="btn btn-primary">Update Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->
<script>
    document.forms['edit_product_form'].elements['publication_status'].value = "<?php echo $product_info['publication_status']; ?>"
</script>