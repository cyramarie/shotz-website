<?php

class Util{
    //Method for input sanitation
    public function testInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    //method for displaying success and error message
    public function showMessage($type, $message){
        return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert"> 
        <strong>' . $message . '</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
        </div>';
    }
}


?>