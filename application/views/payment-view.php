<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" integrity="sha512-EaaldggZt4DPKMYBa143vxXQqLq5LE29DG/0OoVenoyxDrAScYrcYcHIuxYO9YNTIQMgD8c8gIUU8FQw7WpXSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Razorpay App</title>
  </head>
  <body>
		<div class="container mt-2">
			<div class="row">
				<div class="col-md-4"><h3>Razorpay Payment page</h3></div>
				<div class="col-md-6">
					<h3>Customer Details</h3>
					<div class="card" style="width: 20rem;">
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Name :  <sapn><?php echo $customer_data['c_name']; ?></span></li>
							<li class="list-group-item">Email : <sapn><?php echo $customer_data['c_email']; ?></li>
							<li class="list-group-item">Mobile No : <sapn><?php echo $customer_data['c_mobileno']; ?></li>
							<li class="list-group-item">Address : <sapn><?php echo $customer_data['c_address']; ?></li>
						</ul>

						
					</div>
					<form class="mt-3" method="post" action="<?php echo base_url(); ?>checkout">
							<div class="form-group">
								<input type="number" class="form-control" placeholder="Enter price" name="price" style="width: 44%;" required>
								<?php
									if(!empty($this->session->flashdata('error'))){ ?>
										<div class="text-danger mt-1" id="myDIV">
											<?php echo $this->session->flashdata('error'); ?>
										</div>

										<script type ="text/javascript">
											setTimeout(() => {
												document.getElementById("myDIV").innerHTML = " ";
											}, 3000);
										</script>
									<?php	}
								?>
							</div>
							<button type="submit" name="submit" class="btn btn-primary"> <span class="icon"><i class="fa fa-money" aria-hidden="true"></i></span> Pay With Razorpay</button>
						</form>
				</div>
				<div class="col-md-2">
					<a href="<?php echo base_url();?>myorders"><button type="submit" name="submit" class="btn btn-warning"> <span class="icon"><i class="fa fa-truck" style="color: royalblue;"></i></span> My Orders</button></a>
				</div>
			</div>

		</div>
		

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		
		
  </body>
</html>