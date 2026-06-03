<?php
include "../includes/connection.php" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegance Salon | Secure Payment</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;1,400&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #121211;
            --card-bg: #1a1a19;
            --gold: #c5a059;
            --text-main: #ffffff;
            --text-dim: #a0a0a0;
            --accent-border: #333330;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .payment-container {
            background: var(--card-bg);
            border: 1px solid var(--accent-border);
            padding: 45px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.6);
        }

        header {
            text-align: center;
            margin-bottom: 35px;
        }

        header p {
            color: var(--gold);
            font-size: 0.65rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        h2 {
            font-family: 'Cormorant+Garamond', serif;
            font-size: 2.3rem;
            margin: 0;
            font-weight: 400;
            letter-spacing: 1px;
        }

        h2 span {
            color: var(--gold);
            font-style: italic;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 0.7rem;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid var(--accent-border);
            color: var(--text-main);
            padding: 12px 0;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            outline: none;
            box-sizing: border-box;
        }

        /* Dropdown options styling */
        select option {
            background-color: var(--card-bg);
            color: var(--text-main);
        }

        textarea {
            height: 80px;
            resize: none;
            border: 1px solid var(--accent-border);
            padding: 10px;
            margin-top: 5px;
        }

        input:focus, select:focus, textarea:focus {
            border-bottom-color: var(--gold);
            border-color: var(--gold); /* only for textarea */
        }

        .btn-pay {
            width: 100%;
            background-color: var(--gold);
            color: #121211;
            border: none;
            padding: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            margin-top: 25px;
            transition: transform 0.2s, opacity 0.3s;
        }

        .btn-pay:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .footer-note {
            text-align: center;
            margin-top: 20px;
            font-size: 0.7rem;
            color: var(--text-dim);
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <header>
        <p>Accounting Dept</p>
        <h2>Final <span>Settlement</span></h2>
    </header>

    <form action="payment_logic.php" method="POST">
        
        <div class="form-group">
            <label>order ID</label>
            <input type="number" name="order_id" required placeholder="Enter ID #">
        </div>

        <div class="form-group">
            <label>Total Amount (PKR)</label>
            <input type="number" name="amount" required placeholder="0.00">
        </div>

        <div style="display: flex; gap: 20px;">
            <div class="form-group" style="flex: 1;">
                <label>Method</label>
                <select name="payment_method" required>
                    <option value="Cash">Cash</option>
                    <option value="Card">Card</option>
                    <option value="Online">Online</option>
                </select>
            </div>

            <div class="form-group" style="flex: 1;">
                <label>Status</label>
                <select name="status">
                    <option value="Paid">Paid</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Notes / Remarks</label>
            <textarea name="notes" placeholder="Additional details..."></textarea>
        </div>

        <button type="submit" name="submit" class="btn-pay">Pay Now</button>

        <p class="footer-note">Secure Transaction Portal</p>
    </form>
</div>

</body>
</html>