<?php
/**
 * Created by PhpStorm.
 * User: batuhancimen
 * Date: 2/20/15
 * Time: 10:23 AM
 */
$file_db = new PDO('sqlite:database.sqlite3');
// Set errormode to exceptions
$file_db->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

$file_db->exec("CREATE TABLE IF NOT EXISTS emails (
                    id INTEGER PRIMARY KEY,
                    email TEXT)");

function insert_data($email){
    try {
        $file_db = new PDO('sqlite:database.sqlite3');
        $insert = "INSERT INTO emails (email)
                VALUES (:email)";
        $stmt = $file_db->prepare($insert);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
    catch(PDOException $e) {
        // Print PDOException message
        echo $e->getMessage();
        return false;
    }
    return true;
}