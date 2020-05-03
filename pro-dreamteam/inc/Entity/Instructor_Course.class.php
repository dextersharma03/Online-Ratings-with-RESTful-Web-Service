<?php

// InstructorID INT NOT NULL,
//     CourseID INT NOT NULL,

class Instructor_Course{
    //Attributes
    private $InstructorID;
    private $CourseID;

    //Setters

    public function setInstructorID(int $instructorID){
        $this->InstructorID=$instructorID;
    }
    public function setCourseID(int $courseID){
        $this->CourseID=$courseID;
    }

    //Getters

    public function getInstructorID():int{
        return $this->InstructorID;
        }
    public function getCourseID():int{
         return $this->CourseID;
        }
}

?>