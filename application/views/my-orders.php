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
		<div class="container mt-1">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-center">My Orders Page</h3>
            <div class="float-right mb-2">
              <a class="btn-success btn" href="<?php echo base_url(); ?>"><li class="btn-success btn">Go Back</li></a>
            </div>
          </div>
        </div>
        
			<div class="row">
				<div class="col-md-12">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>Order Id</th>
              <th>Razorpay Order Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Amount</th>
              <th>Currency</th>
              <th>payment Status</th>
              <th>Created Date</th>
            </tr>
          </thead>
          <tbody>

            <?php 
              foreach ($orders as $key => $order) { ?>
              <tr>
                <td><?php echo $order['checkout_order_id']; ?></td>
                <td><?php echo $order['razorpay_order_id']; ?></td>
                <td><?php echo $order['c_name']; ?></td>
                <td><?php echo $order['c_email']; ?></td>
                <td><?php echo $order['amount'] . '₹'; ?></td>
                <td><?php echo $order['currency']; ?></td>
                <td><?php echo $order['payment_status']; ?></td>
                <td><?php echo $order['created_at']; ?></td>
              </tr>
            <?php  } ?>
          </tbody>
        </table>
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