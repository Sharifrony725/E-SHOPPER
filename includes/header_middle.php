<div class="header-middle">
	<!--header-middle-->
	<div class="container">
		<div class="row">
			<div class="col-md-4 clearfix">
				<div class="logo pull-left">
					<a href="index.html"><img src="assets/front_end_assets/images/home/logo.png" alt="" /></a>
				</div>
				<div class="btn-group pull-right clearfix">
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
							USA
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="">Canada</a></li>
							<li><a href="">UK</a></li>
						</ul>
					</div>

					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
							DOLLAR
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="">Canadian Dollar</a></li>
							<li><a href="">Pound</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-8 clearfix">
				<div class="shop-menu clearfix pull-right">
					<ul class="nav navbar-nav">
						<li><a href=""><i class="fa fa-user"></i> Account</a></li>
						<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
						<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
						<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
						<?php if (isset($_SESSION['customer_id'])) { ?>
							<li><a href="logout.php"><i class="fa fa-lock"></i>Logout</a></li>
						<?php } else { ?>
							<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>