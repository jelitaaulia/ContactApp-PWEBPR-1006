<?php
session_start();
include 'model/contact.php';

Contact::initialize();

$id = $_POST['id'];
$phone_number = $_POST['phone_number'];
$owner = $_POST['owner'];

$result = Contact::update($id, $phone_number, $owner);

if ($result === "Contact updated successfully") {
    header('Location: index.php');
} else {
    echo "Error: " . $result; 
}

exit;
