<?php
    include 'header.php';
?>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Cart</h1>
            <!-- <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p> -->
        </div>
    </div>

   

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">

        	<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
				 				<?php
				 				foreach($cart_prd_arr as $cart)
								{
				 				?>
				 				<div class="product">
				 					<div class="row">
					 					<div class="col-md-3">
					 						
					 						<img class="" height="200px" width="200px" src="assets/img/<?= $cart->image ?>">
					 						
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-3 product-name">
							 							<div class="product-name">
								 							<a href="#">
																<?= $cart->name ?>
															</a>
								 							<!-- <div class="product-info">

																<div>Display: <span class="value">5 inch</span></div>
									 							<div>RAM: <span class="value">4GB</span></div>
									 							<div>Memory: <span class="value">32GB</span></div>
									 							
									 						</div> -->

									 					</div>
							 						</div>
							 						<div class="col-md-4 quantity">
							 							<label for="quantity">Quantity:</label>
							 							<input type="number" value="<?= $cart->qty ?>" max="5" min="1">
							 						</div>
							 						<div class="col-md-5 price">
							 							<span>
															<?= $cart->price ?>
														</span>


							 							<br>
														<span>
															&nbsp;&nbsp;
															<?php  
															
															$subtotal = $cart->price * $cart->qty;

															echo $subtotal;

															$total[] = $subtotal;
															
															?>
														</span>

							 							
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>

				 				<?php
				 					}
								?>

				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>

			 					<div class="summary-item"><span class="text">Discount </span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Shipping </span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Total : </span><span class="price">$<?php print_r(array_sum($total))?></span></div>
			 					<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>

				 			</div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
  
        </div>
    </div>
    <!-- End Contact -->

<?php
    include 'footer.php';
?>