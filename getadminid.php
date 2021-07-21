<?php
require "config.php";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $data = $client->admins->getAdmins();
    $result = "Admin Not found";
    for ($i = 0; $i < sizeof($data->admins); $i++) {
        similar_text($name, $data->admins[$i]->name, $percent);
        if ($percent > 80) {
            $result = $data->admins[$i]->id;
            break;
        }
    }
}
echo $result;
