<?php

require_once(__DIR__ . '/index.php'); 

class MySQL {
    public static function runFetchArrayQuery($query) {
        global $conn;
        $result = $conn->query($query);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC); 
        } else {
            return []; 
        }
    }

    public static function runFetchRowQueryWithParam($query, $param) {
        global $conn; 
        $stmt = $conn->prepare($query);
        
       
        $stmt->bind_param("i", $param);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc(); 

        $stmt->close();
        return $row; 
    }
}
?>