<?php
    require "connection.php";

    if(isset($_POST['btn_add'])){
        $title = $_POST['title'];
            createSection($title);
        }

    function createSection($title){
        $conn = connection();
        $sql = "INSERT INTO sections(title) VALUE ('$title') ";

        if($conn->query($sql)){
            header("refresh: 0");
        } else {
            die("Error adding new product section " . $conn->error);
        }
    }
    function getSections(){
        $conn = connection();

        $sql = "SELECT * FROM sections";

        if($result = $conn->query($sql)){
            return $result;
        } else {
            die("Error retrieving all sections: " . $conn->error);
        }
    }


?>