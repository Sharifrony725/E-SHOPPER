<?php
if (isset($_GET['status'])) {
    $product_id = $_GET['id'];
    if ($_GET['status'] == 'unpublished') {
        $message = $ob_sub_admin->unpublished_product_by_id($product_id);
    } elseif ($_GET['status'] == 'published') {
        $message =  $ob_sub_admin->published_product_by_id($product_id);
    } elseif ($_GET['status'] == 'delete') {
        $message =  $ob_sub_admin->delete_product_by_id($product_id);
    }
}
$query_result = $ob_sub_admin->select_all_product_info();

?>
<div class="row col-lg-12">
    <div class="span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Products Info</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <!-- <div class="box-content"> -->
        <h2>
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </h2>

        <h2 style="color: green;">
            <?php if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </h2>

        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>

                <tr>
                    <!-- <th>Product ID</th> -->
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>manufacturer Name</th>
                    <th>Product Price</th>
                    <th>Stock Amount</th>
                    <!-- <th>Minimum Stock Amount</th>
                    <th>Product Image</th> -->
                    <th>Publication Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product_info = mysqli_fetch_assoc($query_result)) { ?>
                    <tr>

                        <td class="center"><?php echo $product_info['product_name'] ?></td>
                        <td class="center"><?php echo $product_info['category_name'] ?></td>
                        <td class="center"><?php echo $product_info['manufacturer_name'] ?></td>
                        <td class="center"><?php echo $product_info['product_price'] ?></td>
                        <td class="center"><?php echo $product_info['stock_amount'] ?></td>

                        <td class="center">
                            <?php
                            if ($product_info['publication_status'] == 1) {
                                echo 'Published';
                            } else {
                                echo 'Unpublished';
                            }
                            ?>
                        </td>
                        <td class="center">

                            <a class="btn btn-primary" href="view_product.php?id=<?php echo $product_info['product_id'] ?>" title="View">
                                <i class="halflings-icon white zoom-in"></i>
                            </a>

                            <?php if ($product_info['publication_status'] == 1) { ?>
                                <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $product_info['product_id'] ?>" title="Unpublished">
                                    <i class="halflings-icon white arrow-down"></i>
                                </a>
                            <?php } else { ?>


                                <a class="btn btn-danger" href="?status=published&&id=<?php echo $product_info['product_id'] ?>" title="Published">
                                    <i class="halflings-icon white arrow-up"></i>
                                </a>
                            <?php } ?>
                            <a class="btn btn-info" href="edit_product.php?id=<?php echo $product_info['product_id'] ?>" title="Edit">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $product_info['product_id']; ?>" title=" Delete" onclick="return check_delete();">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- box content end -->
    </div>
    <!--/span-->

</div>
<!--/row-->