<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/customerbilling.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
</head>
<body>
<?php include 'navv.php'; ?>
<div class="main-container">
    <div class="bill-container">
            <div class="customerbilling">
                <h1>Add Products</h1>
            </div>
                <div>
                    <form>
                        <div class="InputContainer">
                            <label for="bill-number">Bill Number</label>
                        </div>
                    </form>
                </div>
                <?php
                    include 'connect.php';
                    // Assuming $conn is your database connection
                    $query = "SELECT id, product_name, rate, category FROM product";
                    $result = mysqli_query($conn, $query);
                    $product_options = '';

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_options .= '<option value="' . $row['id'] . '" data-category="' . $row['category'] . '" rate="' . $row['rate'] . '">' . $row['product_name'] . '</option>';
                            }
                        } else {
                            $product_options = '<option value="">No products available</option>';
                        }
                    } else {
                        // Error handling
                        echo "Error: " . mysqli_error($conn);
                    }
                    
                ?>

            <table id="items-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">ID</th>
                        <th style="width: 80px;">Products</th>
                        <th style="width: 60px;">Category</th>
                        <th style="width: 30px;">Quantity</th>
                        <th style="width: 30px;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                        <td>1</td>
                        <td>
                            <select name="product_name" onchange="updateCategory(this)">
                                <?php echo $product_options; ?>
                            </select>
                        </td>
                        <td id="category"></td>
                        <td>
                        <input type="number" name="quantity" style="width: 80px;" oninput="calculateAmount(this)"></input>
                        </td>
                        <td id="amount"></td>
                </tbody>
            </table>
            <div class="add-btn">
                <button type="button" onclick="addProduct()">+ Add</button>
            </div>
    </div>
    <div class="bill-container">
            <div class="customerbilling">
                <h1>Receipt</h1>
            </div>
                <div>
                    <?php
                        include 'connect.php';
                   // Assuming $conn is your database connection
                    $query = "SELECT * FROM customer ORDER BY bill_no DESC LIMIT 1";
                    $result = mysqli_query($conn, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $bill_number = $row['bill_no'];
                        $bill_date = $row['created_at'];
                        $customer_name = $row['customer_name'];
                        $customer_phone = $row['ph_number'];
                    } else {
                        // If no data is found, set default values
                        $bill_number = 'N/A';
                        $bill_date = 'N/A';
                        $customer_name = 'N/A';
                        $customer_phone = 'N/A';
                    }
                    ?>
                    <form id="bill-form">
                        <div class="InputContainer">
                            <label for="bill-number">Bill Number: <span id="bill_number"><?php echo $bill_number; ?></span></label>
                            <label for="bill-date">Bill Date/ Time: <span id="bill-date"><?php echo $bill_date; ?></span></label>
                            <label for="customer-name">Name: <span id="customer-name"><?php echo $customer_name; ?></span></label>
                            <label for="customer-phone">Phone Number: <span id="customer-phone"><?php echo $customer_phone; ?></span></label>
                            <input type="hidden" id="total-amount-input" name="total_amount" value="">
                        </div>
                    </form>
                </div>
            <table id="total-items-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Rate(in Rs.)</th>
                        <th>Amount(in Rs.)</th>
                    </tr>
                </thead>
                <tbody>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tbody>
            </table>
            <div class="total">
            <label for="total">Sub-Total: </label>
        </div>
        <div class="tax-rate">
            <label for="tax">Tax Rate(5%): </label>
        </div>
        <div class="total-amount">
            <label for="total">Total Amount: <span id="total-amount"></span> </label>
        </div>
        <div class="buttons">
            <button id="save-btn" onclick="saveBill()">Save</button>
            <button id="print-btn">Print</button>
        </div>
    </div>
</div>
</body>
</html>

<script>
function updateCategory(select) {
    var selectedOption = select.options[select.selectedIndex];
    var categoryTd = document.getElementById('category');
    if (selectedOption) {
        var category = selectedOption.getAttribute('data-category');
        categoryTd.textContent = category;
    } else {
        categoryTd.textContent = 'select';
    }
}

function calculateAmount(input) {
    // Get selected product details
    var selectedOption = document.querySelector('select[name="product_name"] option:checked');
    var quantity = parseInt(input.value); // Parse quantity as an integer
    var rate = parseFloat(selectedOption.getAttribute('rate')); // Parse rate as a float
    var amount = quantity * rate;

    // Pass the calculated amount to another function
    updateAmount(amount);

    // You can also perform other actions with the amount here
}

function updateAmount(amount) {
    // Update the total amount display elsewhere on the webpage
    var amountElement = document.getElementById('amount');
    amountElement.textContent = amount.toFixed(2);
}

// Array to store selected products
var productsArray = [];
var idCounter = 1;

function addProduct() {
    // Get selected product details
    var selectedOption = document.querySelector('select[name="product_name"] option:checked');
    var productId = selectedOption.value;
    var productName = selectedOption.textContent;
    var quantity = parseInt(document.querySelector('input[name="quantity"]').value);
    var rate = parseFloat(selectedOption.getAttribute('rate'));
    var amount = quantity * rate;

    // Create a new table row
    var newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${idCounter}</td>
        <td>${productName}</td>
        <td>${quantity}</td>
        <td>${rate.toFixed(2)}</td>
        <td>${amount.toFixed(2)}</td>
    `;

    // Append the new row to the total-items-table body
    var totalItemsTableBody = document.querySelector('#total-items-table tbody');
    totalItemsTableBody.appendChild(newRow);

    // Add the selected product to the productsArray
    var product = {
        id: {idCounter},
        name: productName,
        quantity: quantity,
        rate: rate,
        amount: amount
    };
    productsArray.push(product);
    
    // Increment the counter for the next product
    idCounter++;

    // Update total amount
    updateTotalAmount();

    // For demonstration purposes, log the contents of the productsArray
    console.log(productsArray);
}

function updateTotalAmount() {
    // Calculate total amount
    // Calculate subtotal
    var subtotal = productsArray.reduce((total, product) => total + product.amount, 0);

    // Calculate tax amount (5% of subtotal)
    var taxRate = 0.05; // 5% tax rate
    var taxAmount = subtotal * taxRate;

    // Calculate total amount (subtotal + tax amount)
    var totalAmount = subtotal + taxAmount;

    // Update the value of the hidden input field
    var totalAmountInput = document.getElementById('total-amount-input');
    totalAmountInput.value = totalAmount.toFixed(2);

    // Display subtotal, tax amount, and total amount
    var subtotalElement = document.querySelector('.total label');
    subtotalElement.textContent = 'Sub-Total: Rs. ' + subtotal.toFixed(2);

    var taxElement = document.querySelector('.tax-rate label');
    taxElement.textContent = 'Tax (5%): Rs. ' + taxAmount.toFixed(2);

    var totalAmountElement = document.getElementById('total-amount');
    totalAmountElement.textContent = 'Rs. ' + totalAmount.toFixed(2);

    // For demonstration purposes, log the subtotal, tax amount, and total amount
    console.log('Subtotal: Rs.', subtotal.toFixed(2));
    console.log('Tax Amount: Rs.', taxAmount.toFixed(2));
    console.log('Total Amount: Rs.', totalAmount.toFixed(2));
}

function saveBill() {
    // Retrieve total amount
    var totalAmount = document.getElementById('total-amount-input').value;

    // Retrieve other form data
    var billNumber = document.getElementById('bill_number').textContent;
    var billDate = document.getElementById('bill-date').textContent;
    var customerName = document.getElementById('customer-name').textContent;
    var customerPhone = document.getElementById('customer-phone').textContent;
    
    // Create a new FormData object to send the data to the server
    var formData = new FormData();
    formData.append('bill_number', billNumber);
    formData.append('bill_date', billDate);
    formData.append('customer_name', customerName);
    formData.append('customer_phone', customerPhone);
    formData.append('total_amount', totalAmount);

    // Send an AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_bill.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Handle the successful response from the server
            console.log(xhr.responseText);
            // You can display a success message or redirect the user to another page
        } else {
            // Handle errors
            console.error('Error saving bill: ' + xhr.statusText);
        }
    };
    xhr.onerror = function () {
        // Handle errors
        console.error('Network error while saving bill');
    };
    xhr.send(formData);
}

   // Get the print button element
var printButton = document.getElementById('print-btn');

// Add click event listener to the print button
printButton.addEventListener('click', function() {
    // Call the print function when the button is clicked
    printForm();
});

// Function to print only the receipt form and table
function printForm() {
    // Get the receipt container
    var receiptContainer = document.querySelector('.bill-container:last-child');

    // Create a new window for printing
    var printWindow = window.open('', '_blank');

    // Write the receipt container content to the new window
    printWindow.document.write('<!DOCTYPE html>');
    printWindow.document.write('<html lang="en">');
    printWindow.document.write('<head>');
    printWindow.document.write('<meta charset="UTF-8">');
    printWindow.document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    printWindow.document.write('<title>Print Receipt</title>');
    printWindow.document.write('<link rel="stylesheet" href="css/customerbilling.css">'); // Link to your CSS file
    printWindow.document.write('<style>');
    printWindow.document.write('@media print { .no-print { display: none; } }');
    printWindow.document.write('</style>');
    printWindow.document.write('</head>');
    printWindow.document.write('<body>');
    printWindow.document.write(receiptContainer.innerHTML); // Insert receipt container content
    printWindow.document.write('</body>');
    printWindow.document.write('</html>');

    // Close the print window after printing
    printWindow.onload = function() {
        setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 100);
    };
}


</script>