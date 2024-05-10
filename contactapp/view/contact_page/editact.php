<?php
session_start();
include '../../model/contact_model.php';

Contact::initialize();

$id = $_POST['id'];
$phone_number = $_POST['phone_number'];
$owner = $_POST['owner'];

$result = Contact::update($id, $phone_number, $owner);

if ($result === "Contact updated successfully") {
    header('Location: ../../view/contact_page/index.php');
} else {
    echo "Error: " . $result; 
}

exit;
