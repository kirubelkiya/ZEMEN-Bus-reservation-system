<?php
$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }
        .company {
            text-align: center;
            margin-bottom: 20px;
        }
        .view-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .company img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }
        .info {
            display: none;
        }
        .form-container {
            display: none;
            margin-top: 20px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
HTML;

// Company 1
$html .= <<<HTML
<div class="company com">
    <img src="com.png" alt="Commercial Bank Logo">
    <h2>COMMERCIAL BANK OF ETHIOPIA</h2>
    <p>Commercial Bank</p>
    <button class="view-btn" onclick="showAccount('com')">View</button>
    <div class="info" id="com-info">
        <p>Account Name: <span id="com-name"></span></p>
        <p>Account Number: <span id="com-number"></span></p>
    </div>
    <div class="form-container" id="com-form">
    <form action="tran.php" method="post">
        <input type="text" placeholder="Enter Name" name="name" id="com-name"><br>
        <input type="text" placeholder="Enter Phone Number" name="phone_number" id="com-phone_number"><br>
        <input type="text" placeholder="Enter Seat Number" name="seat_number" id="com-seat_number"><br>
        <input type="text" placeholder="Enter Payment Done" name="payment_done" id="com-payment_done"><br>
        <input type="text" placeholder="Enter Transaction ID" name="transaction_id" id="com-transaction_id"><br>
        <input type="text" placeholder="Enter Link" name="transaction_link" id="com-transaction_link"><br>
        <button onclick="submitForm('com')" name="save_db">Submit</button>
        </form>
    </div>
</div>
HTML;

// Company 2
$html .= <<<HTML
<div class="company tel">
    <img src="tel.png" alt="Telebirr Logo">
    <h2>TELEBIRR</h2>
    <p>Moblie Banking Service</p>
    <button class="view-btn" onclick="showAccount('tel')">View</button>
    <div class="info" id="tel-info">
        <p>Account Name: <span id="tel-name"></span></p>
        <p>Account Number: <span id="tel-number"></span></p>
    </div>
    
    <!-- Your form inputs here -->
    <div class="form-container" id="tel-form">
    <form action="tran.php" method="post">
        <input type="text" placeholder="Enter Name" name="name" id="tel-name"><br>
        <input type="text" placeholder="Enter Phone Number" name="phone_number" id="tel-phone_number"><br>
        <input type="text" placeholder="Enter Seat Number" name="seat_number" id="tel-seat_number"><br>
        <input type="text" placeholder="Enter Payment Done" name="payment_done" id="tel-payment_done"><br>
        <input type="text" placeholder="Enter Transaction ID" name="transaction_id" id="tel-transaction_id"><br>
        <input type="text" placeholder="Enter Link" name="transaction_link" id="tel-transaction_link"><br>
        <button onclick="submitForm('tel')" name="save_db">Submit</button>
        </form>
    </div>
    
</div>
HTML;

// Company 3
$html .= <<<HTML
<div class="company mps">
    <img src="mps.png" alt="M-PESA Logo">
    <h2>M-PESA</h2>
    <p>Moblie Banking Service</p>
    <button class="view-btn" onclick="showAccount('mps')">View</button>
    <div class="info" id="mps-info">
        <p>Account Name: <span id="mps-name"></span></p>
        <p>Account Number: <span id="mps-number"></span></p>
    </div>
    <div class="form-container" id="mps-form">
    <form action="tran.php" method="post">
        <input type="text" placeholder="Enter Name" name="name" id="mps-name"><br>
        <input type="text" placeholder="Enter Phone Number" name="phone_number" id="mps-phone_number"><br>
        <input type="text" placeholder="Enter Seat Number" name="seat_number" id="mps-seat_number"><br>
        <input type="text" placeholder="Enter Payment Done" name="payment_done" id="mps-payment_done"><br>
        <input type="text" placeholder="Enter Transaction ID" name="transaction_id" id="mps-transaction_id"><br>
        <input type="text" placeholder="Enter Link" name="transaction_link" id="mps-transaction_link"><br>
        <button onclick="submitForm('mps')" name="save_db">Submit</button>
        </form>
    </div>
</div>
HTML;

$html .= <<<HTML
</div>
<script>
    function showAccount(className) {
        var companies = document.querySelectorAll('.company');
        companies.forEach(function(company) {
            var infoDiv = company.querySelector('.info');
            var formDiv = company.querySelector('.form-container');
            infoDiv.style.display = 'none';
            formDiv.style.display = 'none';
        });
        var accountInfo = getAccountInfo(className);
        var nameSpan = document.getElementById(className + '-name');
        var numberSpan = document.getElementById(className + '-number');
        nameSpan.textContent = accountInfo.name;
        numberSpan.textContent = accountInfo.number;
        document.getElementById(className + '-info').style.display = 'block';
        document.getElementById(className + '-form').style.display = 'block';
    }
    function getAccountInfo(className) {
        if (className === 'com') {
            return { name: 'Your Com Name', number: 'Com Account Number' };
        } else if (className === 'tel') {
            return { name: 'Your Tel Name', number: 'Tel Account Number' };
        } else if (className === 'mps') {
            return { name: 'Your Mps Name', number: 'Mps Account Number' };
        } else {
            return { name: 'Unknown', number: 'Unknown' };
        }
    }
    function submitForm(className) {
        var nameInput = document.getElementById(className + '-name');
        var phoneInput = document.getElementById(className + '-phone_number');
        var seatInput = document.getElementById(className + '-seat_number');
        var paymentInput = document.getElementById(className + '-payment_done');
        var transactionInput = document.getElementById(className + '-transaction_id');
        var linkInput = document.getElementById(className + '-transaction_link');
        var name = nameInput.value;
        var phone = phoneInput.value;
        var seat = seatInput.value;
        var payment = paymentInput.value;
        var transactionId = transactionInput.value;
        var link = linkInput.value;
        console.log('Name:', name);
        console.log('Phone Number:', phone);
        console.log('Seat Number:', seat);
        console.log('Payment Done:', payment);
        console.log('Transaction ID:', transactionId);
        console.log('Link:', link);
        nameInput.value = '';
        phoneInput.value = '';
        seatInput.value = '';
        paymentInput.value = '';
        transactionInput.value = '';
        linkInput.value = '';
    }
</script>
</body>
</html>
HTML;

echo $html;
?>
