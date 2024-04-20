<?php
    try {
        session_start();

        $is_logged_in = $_SESSION['is_logged_in'];
        $logged_in_id = "'" . $_SESSION['logged_in_id'] . "'";

        if(!($is_logged_in)){
            header('Location: login.php');
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wallet";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT users.*, banks.*, users.name as user_name, banks.name as bank_name
            FROM users
            LEFT JOIN banks ON users.id = banks.user_id
            WHERE users.id = $logged_in_id
            LIMIT 1";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $sql2 = "SELECT *  FROM `transactions` WHERE `from_user_id` = $logged_in_id ORDER BY id DESC LIMIT 5";

        $result2 = mysqli_query($conn, $sql2);

        $conn->close();
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wallet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


    <style>
        body{
            background-image: url('img/ewallet.jpg');
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="m-2 p-2 bg-light rounded">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div>
                        <a href="/">
                            <div>
                                <h1>E-Wallet</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <div>
                        <div class="fs-5">
                            My Wallet ID: <span><strong>
                                <?php echo $row['wallet_id'] ?>
                            </strong></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <form action="logout.php" method="POST">
                        <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="m-2 p-2">
            <div class="row align-items-start">
                <div class="col-md-4">
                    <div class="bg-light rounded p-2 mb-2">
                        <div class="mb-2">
                            Profile
                        </div>
                        <hr>
                        <div class="mb-2">
                            Name:
                            <?php echo $row['user_name'] ?>
                        </div>
                    </div>

                    <div class="bg-light rounded p-2 mb-2">
                        <div class="mb-2">
                            Bank details
                        </div>
                        <hr>
                        <div class="mb-2">
                            Name: <?php echo $row['bank_name'] ?>
                        </div>
                        <div class="mb-2">
                            Account Number:
                            <?php echo $row['account_number'] ?>
                        </div>
                        <div class="mb-2">
                            Balance:
                            <?php echo $row['balance'] ?>
                        </div>

                        <?php if(!($row['account_number'])){ ?>
                            <div class="text-end mb-2">
                                <button class="btn btn-success btn-sm _add_bank">Add Bank</button>
                            </div>
                        <?php } ?>

                        <div id="add_bank_parent" class="border rounded p-2 d-none">
                            <form action="add_bank.php" method="post">
                                <div class="mb-2">
                                    <label for="">Bank</label>
                                    <select name="name" id="name" class="form-control" required>
                                        <option value="">Select Bank</option>
                                        <option value="BOB Bank">Bank Of Baroda</option>
                                        <option value="HDFC Bank">HDFC</option>
                                        <option value="CANARA Bank">CANARA</option>
                                        <option value="SBI Bank">SBI</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="">Account Number</label>
                                    <input type="number" class="form-control" name="account_number" id="account_number" placeholder="Account Number" required>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success btn-sm">Add</button>
                                    <div data-id="add_bank_parent" class="btn btn-danger btn-sm _close">Close</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-light rounded p-2">
                        <div>
                            Transation History
                        </div>
                        <hr>
                        <div>
                            <?php
                                if ($result2->num_rows > 0) {
                                    while($item = $result2->fetch_assoc()) {
                                        if($item['status'] == 'paid'){
                                            echo '<div class="p-2 rounded alert-danger mb-2">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div>
                                                        ' . $item['message'] . '
                                                    </div>
                                                    <div>
                                                    ' . $item['amount'] . '
                                                    </div>
                                                </div>
                                                <div class="small text-end text-dark">
                                                ' . $item['created_at'] . '
                                                </div>
                                            </div>';
                                        } else {
                                            echo '<div class="p-2 rounded alert-success mb-2">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div>
                                                        ' . $item['message'] . '
                                                    </div>
                                                    <div>
                                                    ' . $item['amount'] . '
                                                    </div>
                                                </div>
                                                <div class="small text-end text-dark">
                                                ' . $item['created_at'] . '
                                                </div>
                                            </div>';
                                        }
                                    }
                                } else {
                                    echo "No transactions";
                                }
                            ?>

                            <div class="mb-2 text-end">
                                <a href="transaction_history.php" class="btn btn-primary">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-light rounded p-2 mb-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <div>
                                    My Wallet Balance
                                </div>
                                <hr>
                                <div class="fw-bold fs-4">
                                    ₹
                                    <?php echo $row['wallet_balance'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <button id="bank_to_wallet_btn" class="btn btn-success btn-sm w-100">Add money from bank</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <button id="wallet_to_bank_btn" class="btn btn-success btn-sm w-100">Transfer money to bank</button>
                                    </div>
                                </div>

                                <div id="bank_to_wallet" class="col-md-12 d-none">
                                    <form action="add_money_to_wallet.php" method="post">
                                        <div class="p-2 border rounded w-100">
                                            <div class="small">
                                                <div class="mb-2 border px-1 rounded alert-warning">Add money to wallet from bank</div>
                                                <div>Bank Account</div>
                                                <div>
                                                    <?php echo $row['bank_name'] ?> <?php echo $row['account_number'] ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mb-2">
                                                <label for="">Amount to add</label>
                                                <input class="form-control" type="text" name="amount" id="" placeholder="Amount">
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success btn-sm">Add</button>
                                                <div data-id="bank_to_wallet" class="btn btn-danger btn-sm _close">Close</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div id="wallet_to_bank" class="col-md-12 d-none">
                                    <form action="add_money_to_bank.php" method="post">
                                        <div class="p-2 border rounded w-100">
                                            <div class="small">
                                                <div class="mb-2 border px-1 rounded alert-warning">Transfer money to bank from wallet</div>
                                                <div>Bank Account</div>
                                                <div>
                                                    <?php echo $row['bank_name'] ?> <?php echo $row['account_number'] ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mb-2">
                                                <label for="">Amount to transfer</label>
                                                <input class="form-control" type="text" name="amount" id="" placeholder="Amount">
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success btn-sm">Transfer</button>
                                                <div data-id="wallet_to_bank" class="btn btn-danger btn-sm _close">Close</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light rounded p-2 mb-2">
                        <form action="wallet_transfer.php" method="post">
                            <div>
                                Make Payment
                            </div>
                            <hr>
                            <div class="fw-bold">
                                <div class="mb-2">
                                    <label for="">User's wallet code</label>
                                    <input class="form-control" type="text" name="wallet_id" id="" placeholder="Wallet Code" required>
                                </div>
                                <div class="mb-2">
                                    <label for="">Amount to transfer</label>
                                    <input class="form-control" type="text" name="amount" id="" placeholder="Amount" required>
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $(document).on('click', '#bank_to_wallet_btn', function(){
                $('#wallet_to_bank').addClass('d-none');
                $('#bank_to_wallet').removeClass('d-none');
            });

            $(document).on('click', '#wallet_to_bank_btn', function(){
                $('#bank_to_wallet').addClass('d-none');
                $('#wallet_to_bank').removeClass('d-none');
            });

            $(document).on('click', '._close', function(){
                $('#' + $(this).attr('data-id')).addClass('d-none');
            });

            $(document).on('click', '._add_bank', function(){
                $('#add_bank_parent').removeClass('d-none');
            });

            $(document).on('click', '._close', function(){
                $('#' + $(this).attr('data-id')).addClass('d-none');
            });
        });
    </script>
</body>
</html>