<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <div>payment is processing...</div>
  <a href="<?php echo base_url(); ?>">Go Back</a>
  <button id="rzp-button1" style="display:none;">Pay</button>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>
    var options = { 
      "key": "<?php echo $key; ?>",
      "amount": "<?php echo $order['amount']; ?>",
      "currency": "INR",    
      "name": "KT Razorpay",
      "description": "Test Transaction",
      "image": "https://example.com/your_logo",
      "order_id": "<?php echo $order['id']; ?>",
      "callback_url": "<?php echo base_url(); ?>paymentstatus",
      "prefill": {
        "name": "<?php echo $customerdata['c_name']; ?>",
        "email": "<?php echo $customerdata['c_email']; ?>",
        "contact": "<?php echo $customerdata['c_mobileno']; ?>" 
      }, 
      "notes": {
        "address": "KT Corporate Office" 
      },
      "theme": {
        "color": "#3399cc" 
      }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e){ 
      rzp1.open();    
      e.preventDefault();
    }

    document.getElementById('rzp-button1').click();
  </script>
  </body>
</html>