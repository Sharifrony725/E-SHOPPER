  <?php
    ob_start();
    session_start();
    require './classes/application.php';
    $obj_app = new Application();
    ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Home | E-Shopper</title>
      <link href="assets/front_end_assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/front_end_assets/css/font-awesome.min.css" rel="stylesheet">
      <link href="assets/front_end_assets/css/prettyPhoto.css" rel="stylesheet">
      <link href="assets/front_end_assets/css/price-range.css" rel="stylesheet">
      <link href="assets/front_end_assets/css/animate.css" rel="stylesheet">
      <link href="assets/front_end_assets/css/main.css" rel="stylesheet">
      <link href="assets/front_end_assets/css/responsive.css" rel="stylesheet">
      <link rel="shortcut icon" href="images/ico/favicon.ico">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <!--/head-->

  <?php include 'includes/header_top.php'; ?>
  <!-- /Header Top -->
  <?php include 'includes/header_middle.php'; ?>
  <!-- /Header_middle  -->
  <?php include 'includes/header_bottom.php'; ?>
  <!-- Header Bottom -->
  <?php
    if (isset($pages)) {
        if ($pages == 'shop') {
            include 'pages/shop_content.php';
        } elseif ($pages == 'product-details') {
            include 'pages/product_details_content.php';
        } elseif ($pages == 'cart') {
            include 'pages/cart_content.php';
        } elseif ($pages == 'category') {
            include 'pages/category_content.php';
        } elseif ($pages == 'checkout') {
            include 'pages/checkout_content.php';
        } elseif ($pages == 'shipping') {
            include 'pages/shipping_content.php';
        } elseif ($pages == 'payment') {
            include 'pages/payment_method.php';
        } elseif ($pages == 'customer_home') {
            include 'pages/customer_home_content.php';
        }
    } else {
        include './pages/home_content.php';
    }
    ?>

  <footer id="footer">
      <!--Footer-->
      <?php include('includes/footer_top.php'); ?>
      <!-- /Footer Top -->
      <?php include('includes/footer_widget.php'); ?>
      <!-- /Footer Widget -->
      <?php include('includes/footer_bottom.php'); ?>
      <!-- /Footer Bottom -->
  </footer>
  <!--/Footer-->


  <script src="assets/front_end_assets/js/jquery.js"></script>
  <script src="assets/front_end_assets/js/bootstrap.min.js"></script>
  <script src="assets/front_end_assets/js/jquery.scrollUp.min.js"></script>
  <script src="assets/front_end_assets/js/price-range.js"></script>
  <script src="assets/front_end_assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/front_end_assets/js/main.js"></script>
  </body>

  </html>