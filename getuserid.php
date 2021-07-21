<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require "config.php";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $query = ['field' => 'name', 'operator' => '=', 'value' => $name ];
    $data = $client->contacts->search([
        'pagination' => ['per_page' => 10],
        'query' => $query,
        'sort' => ['field' => 'name', 'order' => 'ascending'],
    ]);
}
// echo json_encode($data, JSON_PRETTY_PRINT);
echo json_encode($data);
