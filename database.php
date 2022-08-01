<?php

require_once 'config.php';



 class database extends Config{
   
    //upload images
    public function uploadImage($alt_text, $img_path, $userID, $seen){
        $sql = "INSERT INTO gallery (alt_text, image_path, user_id, seen) VALUES (:alt_text, :img_path, :userID, :seen)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['alt_text'=>$alt_text, 'img_path'=>$img_path, 'userID'=>$userID, 'seen'=>$seen]);
        return true;
    }

    //request images
    public function fetchAllImages($user_id){    
        $sql = 'SELECT * FROM gallery WHERE user_id = :user_id ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id'=>$user_id]);
        $rows = $stmt->fetchAll();
        return $rows;
    
    }


    //request images public
        public function fetchAllImagesPublic($seen){    
            $sql = 'SELECT * FROM gallery WHERE seen = :seen ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['seen'=>$seen]);
            $rows = $stmt->fetchAll();
            return $rows;
        
        }
    //request images for searching other users
    public function fetchAllImages1($user_id){    
        $sql = 'SELECT * FROM gallery WHERE user_id = :user_id ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id'=>$user_id]);
        $rows = $stmt->fetchAll();
        return $rows;
    
    }
	
	//request images for landpage
    public function fetchAllOfImages(){    
        $sql = 'SELECT * FROM gallery ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    
    }
	
	//fetch user for landpage image
    public function fetchUser($id){
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch();
        return $row;
    }

    //fetch single image for full view modal
    public function fetchImage($id){
        $sql = 'SELECT * FROM gallery WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch();
        return $row;
    }
	
	//fetch search image for landpage image
	public function fetchSearchImages($alt_text){
        $sql = 'SELECT * FROM gallery WHERE alt_text = :alt_text';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['alt_text'=>$alt_text]);
        $row = $stmt->fetchAll();
        return $row;
    }

    //update image method
    public function updateImage($id, $at, $ip){
        $sql = 'UPDATE gallery SET alt_text = :alt_text, image_path = :image_path WHERE id=:id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'alt_text'=>$at,
            'image_path'=>$ip,
            'id'=>$id
        ]);
        return true;
    }

    //remove image method
    public function removeImage($id){
        $sql = 'DELETE FROM gallery WHERE id= :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;
    }

}


?>