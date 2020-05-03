<?php

Class Course    {
  
    // CourseID INT PRIMARY KEY AUTO_INCREMENT,
    // CourseShortName TINYTEXT NOT NULL,
    // CourseLongName TINYTEXT NOT NULL
    // //Attributes
    private $CourseID;
    private $CourseShortName;
    private $CourseLongName;

    //Setters
    public function setCourseID(int $courseID){
        $this->CourseID=$courseID;
    }
    public function setCourseShortName(string $shortName){
        $this->CourseShortName=$shortName;
    }
    public function setCourseLongName(string $longName){
        $this->CourseLongName=$longName;
    }

    //Getters 
    public function getCourseID():int{
        return $this->CourseID;
    }
    public function getCourseShortName():string{
        return $this->CourseShortName;
    }
    public function getCourseLongName():string{
        return $this->CourseLongName;
    }
    //JSON Serialization with std class
    public function jsonSerialize()
    {
        $obj = new stdClass;
        $obj->CourseID = $this->CourseID;
        $obj->CourseShortName = $this->CourseShortName;
        $obj->CourseLongName = $this->CourseLongName;
        return $obj;
    }

}

?>