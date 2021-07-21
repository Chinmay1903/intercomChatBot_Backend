<?php

require "config.php";

if (isset($_FILES['file'])) {
    if (isset($_POST['conversation_id']) && isset($_POST['user_id']) && isset($_POST['msg']) && isset($_POST['account_type']) && isset($_FILES['file'])) {
        $result;
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
        $url = "https://";
        $url .= $_SERVER['HTTP_HOST'];
        $url .= $_SERVER['REQUEST_URI'];
        $finalurl = str_replace("replytoconversation.php", "uploads/", $url);
        // echo $_POST['conversation_id'] . $_POST['user_id'] . $_POST['msg'] . $_POST['account_type'];
        $final_file_name = rawurlencode($file_name);
        // echo $finalurl . $final_file_name;
        $user = $_POST['account_type'];
        //Reply with attachment
        if ($user == "admin") {
            $result = $client->conversations->replyToConversation($_POST['conversation_id'], [
                "admin_id" => $_POST['user_id'],
                "body" => $_POST['msg'],
                "type" => "admin",
                "message_type" => "comment",
                "attachment_urls" => [$finalurl . $final_file_name]
            ]);
        } elseif ($user == "user") {
            $result = $client->conversations->replyToConversation($_POST['conversation_id'], [
                "intercom_user_id" => $_POST['user_id'],
                "body" => $_POST['msg'],
                "type" => "user",
                "message_type" => "comment",
                "attachment_urls" => [$finalurl . $final_file_name]
            ]);
        }
        sleep(5);
        unlink("uploads/" . $file_name);
        if ($result) {
            echo true;
        }
    }
}else {
    if (isset($_POST['conversation_id']) && isset($_POST['user_id']) && isset($_POST['msg']) && isset($_POST['account_type'])) {
        $result;
        $user = $_POST['account_type']; 
        //Reply without attachment
        if ($user == "admin") {
            $result = $client->conversations->replyToConversation($_POST['conversation_id'], [
                "admin_id" => $_POST['user_id'],
                "body" => $_POST['msg'],
                "type" => "admin",
                "message_type" => "comment",
            ]);
        } elseif ($user == "user") {
            $result = $client->conversations->replyToConversation($_POST['conversation_id'], [
                "intercom_user_id" => $_POST['user_id'],
                "body" => $_POST['msg'],
                "type" => "user",
                "message_type" => "comment",
            ]);
        }
        if ($result) {
            echo true;
        }
    }
}






