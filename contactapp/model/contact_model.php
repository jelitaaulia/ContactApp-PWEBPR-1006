<?php
include 'database.php';

class Contact {
    protected static $conn;

    public static function initialize() {
        $db = new Database();
        self::$conn = $db->getConnection();
    }

    public static function select() {
            global $conn;
            $sql = "SELECT * FROM contact_info";
            $result = $conn->query($sql);
            $arr = array();

            if($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    foreach ($row as $key => $value){
                        $arr[$key][] = $value;
                    }
                }
            }
            return $arr;
    }

    public static function selectById($id) {
        $stmt = self::$conn->prepare("SELECT * FROM contact_info WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public static function insert($phone_number, $owner) {
        $stmt = self::$conn->prepare("INSERT INTO contact_info (phone_number, owner) VALUES (?, ?)");
        $stmt->bind_param("ss", $phone_number, $owner);
        
        $result = $stmt->execute();

        if ($result) {
            return "Contact inserted successfully";
        } else {
            return "Error: Unable to insert contact";
        }
    }

    public static function update($id, $phone_number, $owner) {
        $stmt = self::$conn->prepare("UPDATE contact_info SET phone_number = ?, owner = ? WHERE id = ?");
        $stmt->bind_param("ssi", $phone_number, $owner, $id);
        
        $result = $stmt->execute();
    
        if ($result) {
            return "Contact updated successfully";
        } else {
            return "Error: Unable to update contact";
        }
    }

    public static function delete($id) {
        $stmt = self::$conn->prepare("DELETE FROM contact_info WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        $result = $stmt->execute();
        
        if ($result) {
            return "Contact deleted successfully";
        } else {
            return "Error: Unable to delete contact";
        }
    }
}
?>