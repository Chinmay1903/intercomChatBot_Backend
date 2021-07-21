<?php
// ini_set("display_errors", 1);
// error_reporting(E_ALL);

session_start();

if(isset($_COOKIE["conversationroom"])){
    $data = json_decode($_COOKIE["conversationroom"]);
    if($data->user == "user"){
        // $_SESSION['user_id'] = $data->user_id;
        // print_r($data);
        header("location: viewconversation.php?conversation_id=" . $data->conversation_id . "&user_id=" . $data->user_id . "&account_type=" . $data->user);
    }
    elseif ($data->user == "random") {
        header("location: viewconversation.php?conversation_id=" . $data->conversation_id . "&name=" . $data->name . "&account_type=" . $data->user);
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
    <link rel="icon" href="assets/image/Intercom.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container my-3 py-3">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h2 class="text-center">ENTER ROOM</h2>
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
    <footer class="fixed-bottom">
        <div class="text-right m-3"><a class="border border-primary p-2 text-decoration-none" href="adminpage.php">Admin <i class="fa fa-arrow-right" aria-hidden="true"></i
        ></a></div>
    </footer>
    <script src="js/lib/jquery.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="js/lib/geturlparameter.js"></script>
    <script src="js/index.js"></script>
</body>

</html>