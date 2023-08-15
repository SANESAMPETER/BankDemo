<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Add CSS and Bootstrap links here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Registration Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Registration</div>
                    <div class="card-body">
                        <form action="process_registration.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="aadhar">Aadhar Card Number</label>
                                <input type="text" class="form-control" id="aadhar" name="aadhar" required>
                            </div>
                            <div class="form-group">
                                <label for="pin">4-Digit PIN</label>
                                <input type="password" class="form-control" id="pin" name="pin" required maxlength="4">
                            </div>
                            <div class="form-group">
                                <label for="pan">PAN Card</label>
                                <input type="text" class="form-control" id="pan" name="pan" required>
                            </div>
                            <div class="form-group">
                                <label for="voter">Voter ID</label>
                                <input type="text" class="form-control" id="voter" name="voter" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <div class="form-group">
                                <label for="initial_deposit">Initial Deposit Amount</label>
                                <input type="number" step="0.01" class="form-control" id="initial_deposit" name="initial_deposit" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add JavaScript and jQuery links here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
</body>
</html>
