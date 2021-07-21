<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$myFile = "authentication/admin.txt";
$contents = file_get_contents($myFile);
$contents = explode("\n", $contents);

$temp = 0;

if(isset($_POST['email']) && isset($_POST['password'])) {
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
}

echo $temp;