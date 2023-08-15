<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <!-- Add CSS and Bootstrap links here -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <!-- Add CSS and Bootstrap links here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Transaction Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Money Transfer</div>
                    <div class="card-body">
                        <form action="process_transaction.php" method="POST">
                            <div class="form-group">
                                <label for="sender_name">Sender's Name</label>
                                <input type="text" class="form-control" id="sender_name" name="sender_name" required>
                            </div>
                            <div class="form-group">
                                <label for="sender_pin">Sender's 4-Digit PIN</label>
                                <input type="password" class="form-control" id="sender_pin" name="sender_pin" required maxlength="4">
                            </div>
                            <div class="form-group">
                                <label for="receiver_name">Receiver's Name</label>
                                <input type="text" class="form-control" id="receiver_name" name="receiver_name" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Transfer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add JavaScript and jQuery links here -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Transaction Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Money Transfer</div>
                    <div class="card-body">
                        <form action="process_transaction.php" method="POST">
                            <div class="form-group">
                                <label for="sender_name">Sender's Name</label>
                                <input type="text" class="form-control" id="sender_name" name="sender_name" required>
                            </div>
                            <div class="form-group">
                                <label for="sender_pin">Sender's 4-Digit PIN</label>
                                <input type="password" class="form-control" id="sender_pin" name="sender_pin" required maxlength="4">
                            </div>
                            <div class="form-group">
                                <label for="receiver_name">Receiver's Name</label>
                                <input type="text" class="form-control" id="receiver_name" name="receiver_name" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Transfer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add JavaScript and jQuery links here -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
