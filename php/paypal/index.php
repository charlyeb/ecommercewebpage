<?php 
require_once("vendor/autoload.php");
?>

    <script src="https://www.paypal.com/sdk/js?client-id=AbVdzT14Zlp6JS-x2IGRnxv7reRGLrcoK8tMohrbm5jzwYs6PbIPh3-71Ga7Mi_8s9IzwkiDMbBhFzja"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>

    <div id="paypal-button-container"></div>

    <!-- Add the checkout buttons, set up the order and approve the order -->
    <script>
        paypal.Buttons({
                createOrder: function(data, actions) {
            return actions.order.create({
                    purchase_units: [{
                amount: {
                    value: '0.01'
                      }
            }]
                  });
                },
                onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>