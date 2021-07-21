<?php
// ini_set("display_errors", 1);
// error_reporting(E_ALL);

session_start();

if(isset($_COOKIE["conversationroom"])){
    $data = json_decode($_COOKIE["conversationroom"]);
    if($data->user == "admin"){
        // $_SESSION['user_id'] = $data->user_id;
        // print_r($data);
        header("location: viewconversation.php?conversation_id=" . $data->conversation_id . "&user_id=" . $data->user_id . "&account_type=" . $data->user);
    } 
}

$error = "";

$myFile = "authentication/admin.txt";
$contents = file_get_contents($myFile);
$contents = explode("\n", $contents);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";

    // username and password sent from form

    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];
    $temp = 0;


    // If result matched $email and $password

    foreach ($contents as $values) {
        $loginInfo = explode(":", $values);
        $email = $loginInfo[0];
        if (array_key_exists(1, $loginInfo)) {
            $password = $loginInfo[1];
        }
        if ($email == $useremail && $password == $userpassword) {
            $temp = 1;
        }
    }
    if ($temp == 1) {
        $_SESSION['email'] = $email;

        header("location: admin.php");
        exit;
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat</title>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />
    <link rel="icon" href="assets/image/Intercom.png" type="image/gif" sizes="16x16">
</head>

<body>
    <div class="container my-3 py-3">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h2 class="text-center">ENTER ROOM NUMBER</h2>
                <form id="enterroom">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Room Number</label>
                        <input type="text" class="form-control" id="roomid" name="roomid"
                            placeholder="01934345343453453" />
                    </div>
                    <div id="idinput" class="form-group">
                    <!-- <label for="exampleFormControlInput1">Name</label> -->
                        <div class="form-check-inline">
                            <label class="form-check-label mb-2">
                                <input type="radio" id="name" class="form-check-input" name="personaldetails" checked>Name
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label mb-2">
                                <input type="radio" id="uid" class="form-check-input" name="personaldetails">User Id
                            </label>
                        </div>
                    <input type="text" class="form-control" id="userid" name="userid" placeholder="xyz abc" />
                    </div>
                    <button id="enterbtn" type="submit" class="btn btn-primary btn-lg btn-block align-middle"> 
                        Submit
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="container my-3 py-3">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h2 class="text-center">Admin Login</h2>
                <form id="login" name="login" action="" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="name@example.com" />
                        <div class="invalid-feedback">Please choose a Email.</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Karm@beatsDogm@" />
                        <div class="invalid-feedback">Please choose a Password.</div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="submitbtn" value="Submit" />
                </form>
                <div class="text-center mt-3">
                    <span class="text-danger"><?php echo $error; ?></span>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script src="js/lib/jquery.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="js/lib/geturlparameter.js"></script>
    <script src="js/adminpage.js"></script>
</body>

</html>