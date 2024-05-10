<?php
require_once '../../model/contact_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        Contact::initialize(); 
        $result = Contact::delete($id); 
        echo $result; 
    } else {
        echo "Error: ID not provided"; 
    }
} else {
    echo "Error: Invalid request method"; 
}
header("Location: ../../view/contact_page/index.php");
exit();
?>
