<?php

session_start();

require "config.php";

if (isset($_POST['user']) && isset($_POST['id'])) {
    $user = $_POST['user'];
    // $id = "5a719ab505c6ae5949721958";
    // $id = "2704263";
    $id = $_POST['id'];

    if ($user == "user") {
        $result = $client->contacts->getContact($id);
    } elseif ($user == "admin") {
        $result = $client->admins->getAdmin($id);
    }

    if ($result->id == $id) {
        $_SESSION['user_id'] = $result->id;
        echo TRUE;
    }
}
