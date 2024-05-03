<?php
session_start();
include 'model/contact.php';

Contact::initialize();

$phone_number = $_POST['phone_number'];
$owner = $_POST['owner'];

$result = Contact::insert($phone_number, $owner);

header('Location: index.php');
exit;
?>