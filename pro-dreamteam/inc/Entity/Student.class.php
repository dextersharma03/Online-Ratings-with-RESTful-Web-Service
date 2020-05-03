<?php

class Student {

    // StudentID INT PRIMARY KEY AUTO_INCREMENT,
    // FirstName TINYTEXT NOT NULL,
    // LastName TINYTEXT NOT NULL,
    // Email VARCHAR(50) NOT NULL,
    // Username VARCHAR(25) NOT NULL,
    // Password VARCHAR(255) NOT NULL

    //Attributes

    private $StudentID ;
    private $FirstName;
    private $LastName;
    private $Email;
    private $Username;
    private $Password;
//setters
    public function setStudentID(int $studentID){
        $this->StudentID=$studentID;
    }

    public function setFirstName(string $firstName){
        $this->FirstName=$firstName;
    }
    public function setLastName(string $lastName){
        $this->LastName=$lastName;
    }
    public function setEmail(string $email){
        $this->Email=$email;
    }
    public function setUsername(string $username){
        $this->Username=$username;
    }
    public function setPassword(string $password){
        $this->Password=$password;
    }
    
   //getters
   public function getStudentID():int{
    return $this->StudentID;
    }

    public function getFirstName():string{
        return $this->FirstName;
    }
    public function getLastName():string{
        return $this->LastName;
    }
    public function getEmail():string{
        return $this->Email;
    } 
    public function getUsername():string{
        return $this->Username;
    }
    public function getPassword():string{
        return $this->Password;
    }
    //Verify a student password function
    function verifyPassword(string $passwordToVerify) {
       
        //Return a boolean based on verifying if the password given is correct for the current user
        return password_verify($passwordToVerify,$this->getPassword());     
    }
    //JSON Serialization with std class
    public function jsonSerialize() {
    $obj = new stdClass;
    $obj->StudentID = $this->StudentID;
    $obj->FirstName = $this->FirstName;
    $obj->LastName = $this->LastName;
    $obj->Email = $this->Email;
    $obj->Username = $this->Username;
    $obj->Password = $this->Password;
    return $obj;
}
}

?>