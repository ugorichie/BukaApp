<?php
    require_once("partials/header.php");
?>


<section>
    <div class="container">

        <div class="row text-center">
            <div class="col-12">
                    <h2>  DONATE US  </h2>

                    <p > Help us donate to the less priviledge</p>

            </div>

            <div class="col-12 justify-content-center d-flex">
                            <form id="paymentForm">

                            <div class="form-group">

                            <label for="email">Email Address</label>

                            <input type="email"  class="form-control" id="email-address" required />

                            </div>

                            <div class="form-group">

                            <label for="amount">Amount</label>

                            <input type="tel" id="amount" class="form-control" required />

                            </div>

                            <div class="form-group">

                            <label for="first-name">First Name</label>

                            <input type="text" class="form-control" id="first-name" />

                            </div>

                            <div class="form-group">

                            <label for="last-name">Last Name</label>

                            <input type="text" class="form-control" id="last-name" />

                            </div>

                            <div class="form-submit my-2">

                            <button type="submit" class="form-control btn btn-primary" onclick="payWithPaystack()"> Pay </button>

                            </div>

                            </form>


            </div>

        </div>

    </div>

</section>










<script src="https://js.paystack.co/v1/inline.js"></script>
<script> 

                var paymentForm = document.getElementById('paymentForm');

                paymentForm.addEventListener('submit', payWithPaystack, false);

                function payWithPaystack(e) {
                        e.preventDefault();
                var handler = PaystackPop.setup({

                    key: 'pk_test_5c7a89b6ba213e8358ed171e1a7ff553e9edd1d9', // Replace with your public key

                    email: document.getElementById('email-address').value,

                    amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit

                    currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars

                    ref: '<?php echo time();?>', // Replace with a reference you generated

                    callback: function(response) {

                    //this happens after the payment is completed successfully

                    var reference = response.reference;

                    alert('Payment complete! Reference: ' + reference);

                    // Make an AJAX call to your server with the reference to verify the transaction

                    },

                    onClose: function() {

                    alert('Transaction was not completed, window closed.');

                    },

                });

                handler.openIframe();

                }


</script>

<footer class="bg-primary py-3">
    <p class="text-center text-white">&#169;<?php echo date("Y"); ?> ALL RIGHT RESERVED </p>
</footer>

<script src="../assets/scripts/pooper.js" crossorigin="anonymous"></script>
<script src="../assets/scripts/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../assets/scripts/script.js" crossorigin="anonymous"></script>
</body>
</html>