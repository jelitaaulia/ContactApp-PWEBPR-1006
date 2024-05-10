<?php
session_start();
include '../../model/contact_model.php';

Contact::initialize();

$phone_number = $_POST['phone_number'];
$owner = $_POST['owner'];

$result = Contact::insert($phone_number, $owner);

header('Location: ../../view/contact_page/index.php');
exit;
?>