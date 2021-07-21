<?php
require "config.php";

if (isset($_POST['subject']) && isset($_POST['body']) && isset($_POST['id'])) {
    $response = $client->messages->create([
        "body" => $_POST['body'],
        "subject" => $_POST['subject'],
        "from" => [
            "type" => "user",
            "id" => $_POST['id']
        ]
    ]);
    echo json_encode($response);
}
?>