<?php

include_once 'config/conn.php';
include_once 'database.php';

class User {
    static function login($data=[]) {
        extract($data);
        global $conn;

        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($result = $result->fetch_assoc()) {
            if ($password == $result['password']) {
                return $result;
            }
            else { return false; }
        }
        else { return false; }
    }

    static function register($data=[]) {
        extract($data);
        global $conn;
        
        $sql = "INSERT INTO users SET firstname = ?, lastname = ?, email = ?, password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $firstname, $lastname, $email, $password);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function getPassword($email) { 
        global $conn;
        $sql = "SELECT password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function update($data=[]) {}

    static function delete($id='') {}
}