<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_name"])) {
    header("Location: index.php");
    exit();
}

// Perform database connection (You need to set up database connection parameters)
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbdetails";

$conn = new mysqli($host, $username, $password, $dbname);

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get user details
function getUserDetails($conn, $name)
{
    $sql = "SELECT * FROM users WHERE name = '$name'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

// Function to update account balance
function updateAccountBalance($conn, $name, $amount)
{
    $sql = "UPDATE users SET balance = balance + $amount WHERE name = '$name'";
    return $conn->query($sql);
}

// Function to perform PIN validation
function validatePIN($conn, $name, $pin)
{
    $sql = "SELECT * FROM users WHERE name = '$name' AND pin = '$pin'";
    $result = $conn->query($sql);

    return ($result->num_rows == 1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Balance Check Form
    if (isset($_POST["balance_check_pin"])) {
        $pin = $_POST["balance_check_pin"];
        $name = $_SESSION["user_name"];

        // Validate PIN
        if (validatePIN($conn, $name, $pin)) {
            $userDetails = getUserDetails($conn, $name);
            echo "Account Balance: $" . $userDetails["balance"];
        } else {
            echo "Invalid PIN. Please try again.";
        }
        exit();
    }

    // Deposit Money Form
    if (isset($_POST["receiver_name"], $_POST["deposit_amount"], $_POST["deposit_pin"])) {
        $receiverName = $_POST["receiver_name"];
        $depositAmount = $_POST["deposit_amount"];
        $pin = $_POST["deposit_pin"];
        $senderName = $_SESSION["user_name"];

        // Validate PIN
        if (!validatePIN($conn, $senderName, $pin)) {
            echo "Invalid PIN. Please try again.";
            exit();
        }

        // Update sender's account balance
        if (updateAccountBalance($conn, $senderName, -$depositAmount)) {
            // Update receiver's account balance
            if (updateAccountBalance($conn, $receiverName, $depositAmount)) {
                echo "Amount deposited successfully to $receiverName.";
            } else {
                // Rollback the sender's account balance if updating receiver's balance fails
                updateAccountBalance($conn, $senderName, $depositAmount);
                echo "Failed to deposit money. Please try again.";
            }
        } else {
            echo "Failed to deposit money. Please try again.";
        }
        exit();
    }

    // Withdraw Money Form
    if (isset($_POST["withdraw_amount"], $_POST["withdraw_pin"])) {
        $withdrawAmount = $_POST["withdraw_amount"];
        $pin = $_POST["withdraw_pin"];
        $name = $_SESSION["user_name"];

        // Validate PIN
        if (!validatePIN($conn, $name, $pin)) {
            echo "Invalid PIN. Please try again.";
            exit();
        }

        // Update account balance
        if (updateAccountBalance($conn, $name, $withdrawAmount)) {
            echo "Amount withdrawn successfully.";
        } else {
            echo "Failed to withdraw money. Please try again.";
        }
        exit();
    }
}

// Fetch user details to display on the dashboard
$userDetails = getUserDetails($conn, $_SESSION["user_name"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add necessary meta tags and CSS links here -->
</head>
<body>
    <!-- Display user details -->
    <div>
        <h2>Welcome, <?php echo $_SESSION["user_name"]; ?></h2>
        <p>Account Balance: $<?php echo $userDetails["balance"]; ?></p>
    </div>

    <!-- Balance Check Form -->
    <form id="balanceCheckForm">
        <label for="balance_check_pin">Enter PIN to check balance:</label>
        <input type="password" id="balance_check_pin" name="balance_check_pin" required>
        <button type="submit">Check Balance</button>
    </form>

    <!-- Deposit Money Form -->
    <form id="depositForm">
        <label for="receiver_name">Receiver's Name:</label>
        <input type="text" id="receiver_name" name="receiver_name" required>
        <label for="deposit_amount">Amount to Deposit:</label>
        <input type="number" id="deposit_amount" name="deposit_amount" min="1" required>
        <label for="deposit_pin">Enter Your PIN:</label>
        <input type="password" id="deposit_pin" name="deposit_pin" required>
        <button type="submit">Deposit</button>
    </form>

    <!-- Withdraw Money Form -->
    <form id="withdrawForm">
        <label for="withdraw_amount">Amount to Withdraw:</label>
        <input type="number" id="withdraw_amount" name="withdraw_amount" min="1" required>
        <label for="withdraw_pin">Enter Your PIN:</label>
        <input type="password" id="withdraw_pin" name="withdraw_pin" required>
        <button type="submit">Withdraw</button>
    </form>

    <!-- Add necessary JavaScript and jQuery links here -->
</body>
</html>
