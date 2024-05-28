function payWithPaystack() {
    var email = document.getElementById('txt_email').value;
    var amount = document.getElementById('txt_amount').value * 100; // Paystack amount is in kobo (divide by 100 to convert to naira)
    var handler = PaystackPop.setup({ 
        key: 'pk_test_bd9da99cdd1062d261f444888f17a55f11d1ad8d', //put your public key here
        email: email, //put your customer's email here
        amount: amount, //amount the customer is supposed to pay
        currency: 'NGN',
        ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate random reference number
        callback: function(response) {
        // Send payment details to your server
        var paymentData = {
                charityid: document.getElementById('charity_id1').value,
                firstName: document.getElementById('txt_firstname').value,
                lastName: document.getElementById('txt_lastname').value,
                phoneNumber: document.getElementById('txt_phone_number').value,
                email: email,
                amount: amount, // Convert back to naira
                reference: response.reference
            };
            // Send paymentData to your server using AJAX
            $.ajax({
                url: './includes/process_payment.php', // Replace with your server-side script URL
                method: 'POST',
                data: paymentData,
                success: function(data) {
                    // Handle success response from server
                    alert('Payment successful! Transaction reference: ' + response.reference);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                    alert('Error processing payment. Please try again later.');
                }
            });
        },
        onClose: function() {
            // Handle closed payment dialog
            alert('Payment window closed.');
        }
    });
    handler.openIframe();
}