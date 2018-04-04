<?php
// Collection of Causes
$products = json_decode('[{"id":10,"name":"Hunger","image":{"source":"images/panda.png","width":200,"height":200},"amounts":{"one":"$25","two":"$50","three":"$75","four":"$100"},"price":"0"},

{"id":20,"name":"Water","image":{"source":"images/whale1.png","width":230,"height":200},"amounts":{"one":"$25","two":"$50","three":"$75","four":"$100"},"price":"0"},
                       
{"id":30,"name":"Education","image":{"source":"images/chimp1.png","width":200,"height":200},"amounts":{"one":"$25","two":"$50","three":"$75","four":"$100"},"price":"0"}, 
                        
{"id":40,"name":"Healthcare","image":{"source":"images/jellyfish.png","width":220,"height":200},"amounts":{"one":"$25","two":"$50","three":"$75","four":"$100"},"price":"0"},

{"id":50,"name":"Child Soldiers","image":{"source":"images/horse.png","width":200,"height":200},"amounts":{"one":"$25","two":"$50","three":"$75","four":"$100"},"price":"0"},
                        
{"id":60,"name":"Climate Change","image":{"source":"images/seal.png","width":290,"height":170},"amounts":{"one":"$25","two":"$50","three":"$75","four":"$100"},"price":"0"}]');

$amounts = [
	'one' => '$25',
    'two' => '$50',
    'three' => '$75',
    'four' => '$100',
];

// Page
$a = (isset($_GET['a'])) ? $_GET['a'] : 'home';

require_once 'class.cart.php';

// Initialize cart object
$cart = new Cart([
	// Maximum item can added to cart, 0 = Unlimited
	'cartMaxItem' => 0,

	// Maximum quantity of a item can be added to cart, 0 = Unlimited
	'itemMaxQuantity' => 5,

	// Do not use cookie, cart items will gone after browser closed
	'useCookie' => false,
]);

// Shopping Cart Page
if ('cart' == $a) {
	$cartContents = '
	<div class="alert alert-warning">
		<i class="fa fa-info-circle"></i> There are no items in the cart.
	</div>
    <a href="?a=home" class="btn">Continue Shopping</a>';
    

	// Empty the cart
	if (isset($_POST['empty'])) {
		$cart->clear();
	}

	// Add item
	if (isset($_POST['add'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}

		$cart->add($product->id, $_POST['qty'], [
			
			'amount' => (isset($_POST['amount'])) ? $_POST['amount'] : '',
		]);
	}

	// Remove item
	if (isset($_POST['remove'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}

		$cart->remove($product->id, [
			
			'amount' => (isset($_POST['amount'])) ? $_POST['amount'] : '',
		]);
	}

	if (!$cart->isEmpty()) {
		$allItems = $cart->getItems();

		$cartContents = '
		<table class="table table-striped table-hover">
			<tbody>';

		foreach ($allItems as $id => $items) {
			foreach ($items as $item) {
				foreach ($products as $product) {
					if ($id == $product->id) {
						break;
					}
				}

				$cartContents .= '
				<tr>
					<td>
                    <p>Cause: '.$product->name.((isset($item['attributes']['amount'])) ? ('<p><strong>Amount: </strong>'.$amounts[$item['attributes']['amount']].'</p>') : '').'</td>
					
                    <td class="text-center">
                    <div class="form-group">
                    
                    <button class="btn delete btn-remove pull-right" 
                    style="width: 50px; height: 40px"
                    data-id="'.$id.'" data-amount="'.((isset($item['attributes']['amount'])) ? $item['attributes']['amount'] : '').'"><i class="fa fa-trash"></i></button>
                    
                    </div>
                    </div>
                    </td>
				</tr>';
			}
		}

		$cartContents .= '
			</tbody>
		</table>

		<p>
			<div class="pull-left">
				<button class="btn btn-empty-cart">Empty Cart</button>
			</div>
			<div class="pull-right text-right">
				<a href="?a=home" class="btn">Continue Shopping</a>
				<a href="payment.html" class="btn">Checkout</a>
			</div>
		</p>';
	}
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Donation Purchase Page</title>

        <!--navbar stuff-->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
    <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="causes.html">Causes</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="donate.php">Donate</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li><img src="images/shopping-cart.png" alt="Cart" class="cart-icon" onclick="window.location.href='donate.php?a=cart'"></li>
            </ul>
        </div>
    </nav>

        <?php if ('cart' == $a): ?>
        <div class="container">

            <center>
                <div class="title" style="color: #b0aac2">Shopping Cart</div>
            </center>
            <br>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="table-responsive">
                        <?php echo $cartContents; ?>
                    </div>
                </div>
            </div>

        </div>
        <?php else: ?>

        <div class="container">

            <center>
                <div class="title" style="color: #b0aac2; margin-bottom: 20px">Donate</div>
            </center>

            <div class="row">
                <?php
				foreach ($products as $product) {
					echo '
					<div class="col-md-6">
                        <div class="subtitle2" style="margin-bottom:20px">'.$product->name.'</div>

						<div>
							<div class="pull-left">
								<img src="'.$product->image->source.'" border="0" width="'.$product->image->width.'" height="'.$product->image->height.'" title="'.$product->name.'" />
							</div>
							<div class="pull-left" style="margin-left: 50px">
								
								<form style="width: 200px">
									<input type="hidden" value="'.$product->id.'" class="product-id" />';

					if ($product->amounts) {
						echo '
										<div class="form-group">
											<label>Amount:</label>
											<select class="form-control amount">';

						foreach ($product->amounts as $key => $value) {
							echo '
												<option value="'.$key.'"> '.$value.'</option>';
						}

						echo '
											</select>
										</div>';
					}

					echo '
									<div class="form-group">
										<button class="btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
                        <br><br><br><br>
					</div>';
				}
				?>
            </div>
        </div>
        <?php endif; ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.add-to-cart').on('click', function(e) {
                    e.preventDefault();

                    var $btn = $(this);
                    var id = $btn.parent().parent().find('.product-id').val();
                    var amount = $btn.parent().parent().find('.amount').val() || '';
                    var qty = $btn.parent().parent().find('.quantity').val();

                    var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="add" value=""><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="amount" value="' + amount + '"><input type="hidden" name="qty" value="' + qty + '">');

                    $('body').append($form);
                    $form.submit();
                });

                $('.btn-remove').on('click', function() {
                    var $btn = $(this);
                    var id = $btn.attr('data-id');
                    var amount = $btn.attr('data-amount');

                    var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="remove" value=""><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="amount" value="' + amount + '">');

                    $('body').append($form);
                    $form.submit();
                });

                $('.btn-empty-cart').on('click', function() {
                    var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="empty" value="">');

                    $('body').append($form);
                    $form.submit();
                });
            });

        </script>
    </body>

    </html>
