<?php
class Rating{
    // RatingID INT PRIMARY KEY AUTO_INCREMENT,
    // InstructorID INT NOT NULL,
    // CourseID INT NOT NULL,
    // StudentID INT NOT NULL,
    // Date Date,
    // Rating INT NOT NULL,
    // Review VARCHAR(255),

    //Attributes
private $RatingID;
private $InstructorID;
private $CourseID;
private $StudentID;
private $Date;
private $Rating;
private $Review;
public $FirstName = "";
public $LastName = "";
public $CourseShortName = "";



//Setters
public function setRatingID(int $ratingID){
    $this->RatingID=$ratingID;
}
public function setInstructorID(int $instructorID){
    $this->InstructorID=$instructorID;
}
public function setCourseID(int $courseID){
    $this->CourseID=$courseID;
}
public function setStudentID(int $studentID){
    $this->StudentID=$studentID;
}
public function setDate(string $date){
    $this->Date=$date;
}
public function setRating(int $rating){
    $this->Rating=$rating;
}
public function setReview(string $review){
    $this->Review=$review;
}
public function setFirstName(string $firstname){
    $this->FirstName = $firstname;
}
public function setLastName(string $lastname){
    $this->LastName = $lastname;
}
public function setCourseShortName(string $courseshortname){
    $this->CourseShortName = $courseshortname;
}

//getters
public function getRatingID():int{
   return $this->RatingID;
}
public function getInstructorID():int{
    return $this->InstructorID;
}
public function getCourseID():int{
    return $this->CourseID;
}
public function getStudentID():int{
    return $this->StudentID;
}
public function getDate(){
    return $this->Date;
}
public function getRating() :int{
    return $this->Rating;
}
public function getReview():string{
    return$this->Review;
}
public function getFirstName():string{
    return$this->FirstName;
}
public function getLastName():string{
    return$this->LastName;
}
//JSON Serialization with std class
public function jsonSerialize()
{
    $obj = new stdClass;
    $obj->RatingID = $this->RatingID;
    $obj->InstructorID = $this->InstructorID;
    $obj->CourseID = $this->CourseID;
    $obj->StudentID = $this->StudentID;
    $obj->Date = $this->Date;
    $obj->Rating = $this->Rating;
    $obj->Review = $this->Review;
    $obj->FirstName = $this->FirstName;
    $obj->LastName = $this->LastName;
    $obj->CourseShortName = $this->CourseShortName;
    return $obj;
}
}
?>