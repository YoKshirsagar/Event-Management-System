<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .payment-container {
        text-align: center;
        background: #ffffff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        width: 90%; /* Adjust width for responsiveness */
        max-width: 800px; /* Limit maximum width */
        height: auto; /* Adjust height to fit content */
    }
    .payment-container h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }
    .payment-container p {
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
    }
    .payment-container .razorpay-button-container {
        display: flex;
        justify-content: center;
    }
</style>

<div class="payment-container">
    <h1>Complete Your Payment</h1>
    <p>Click the button below to proceed with your secure payment.</p>
    <div class="razorpay-button-container">
        <!-- Razorpay Payment Button -->
        <form>
            <script src="https://checkout.razorpay.com/v1/payment-button.js" 
                data-payment_button_id="pl_PixN8fyVA0P4IB" 
                async> 
            </script>
        </form>
    </div>
</div>