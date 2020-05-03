<?php

class Instructor {

    // InstructorID INT PRIMARY KEY AUTO_INCREMENT,
    // CourseID INT NOT NULL,
    // FirstName TINYTEXT NOT NULL,
    // LastName TINYTEXT NOT NULL,
    // Email VARCHAR(50) NOT NULL,

    private $InstructorID ;
    private $CourseID;
    private $FirstName;
    private $LastName;
    private $Email;
//setters
    public function setInstructorID(int $instructorID){
        $this->InstructorID=$instructorID;
    }
    public function setCourseID(int $courseID){
        $this->CourseID=$courseID;
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
    
   //getters
   public function getInstructorID():int{
    return $this->InstructorID;
    }
    public function getCourseID():int{
        if($this->CourseID==null){
            $this->CourseID=-1;
        }
        return $this->CourseID;
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
    //JSON Serialization with std class
    public function jsonSerialize()
    {
        $obj = new stdClass;
        $obj->InstructorID = $this->InstructorID;
        $obj->CourseID = $this->CourseID;
        $obj->FirstName = $this->FirstName;
        $obj->LastName = $this->LastName;
        $obj->Email = $this->Email;
        return $obj;
    }


}

?>