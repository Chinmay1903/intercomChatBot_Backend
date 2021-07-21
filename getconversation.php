<?php
require "config.php";

if (isset($_POST['conversation_id'])) {
    
    $data = $client->conversations->getConversation($_POST['conversation_id']);
    echo json_encode($data);

}
