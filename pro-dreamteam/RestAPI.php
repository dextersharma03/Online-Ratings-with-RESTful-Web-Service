<?php


//Require configuration
require_once('inc/config.inc.php');

//Require Entities
require_once('inc/Entity/Course.class.php');
require_once('inc/Entity/Instructor.class.php');
require_once('inc/Entity/Rating.class.php');
require_once('inc/Entity/Student.class.php');

//Require Utillity Classes
require_once('inc/Utility/PDOService.class.php');
require_once('inc/Utility/CourseDAO.class.php');
require_once('inc/Utility/InstructorDAO.class.php');
require_once('inc/Utility/RatingDAO.class.php');
require_once('inc/Utility/StudentDAO.class.php');

/*
Create  - INSERT - POST
Read    - SELECT - GET
Update  - UPDATE - PUT
DELETE  - DELETE - DELETE
*/

//Instantiate a new Customer Mapper

//Pull the request data
// parse_str(file_get_contents('php://input'), $requestData);
$requestData = json_decode(file_get_contents('php://input'));


//Do something based on the request
switch ($_SERVER["REQUEST_METHOD"])   {

    case "POST":    //Picked up a POST, Its Insert time!
    //YARC Id=6&Name=Sally Hill&City=Vancouver&Address=66 Royal Ave
    RatingDAO::initialize();
    //New Rating
//Set values for a new rating
    $rating = new Rating();
    $rating->setInstructorID($requestData->InstructorID);
    $rating->setCourseID($requestData->CourseID);
    $rating->setRating($requestData->Rating);
    $rating->setReview($requestData->Review);
    $rating->setStudentID($requestData->StudentID);
    $rating->setDate($requestData->Date);
      //Create a new rating!
    $result = RatingDAO::createRating($rating);
    header('Content-Type: application/json');
    //Encode the result!
    echo json_encode($result);

    break;

    //If there was a request with an id return that customer, if not return all of them!
    case "GET":

      
            //If request data is search!
            if (isset($requestData->search)){
                //Get all necessary information for an instructor!
                InstructorDAO::initialize();
                $splitFullName = explode(" ", $requestData->search);
                $firstName = $splitFullName[0];
                $lastName = $splitFullName[1];
                $instructor = InstructorDAO::getInstructorByName($firstName, $lastName);
                RatingDAO::initialize();
                $ratings = RatingDAO::getInstructorReviews($instructor);                
                CourseDAO::initialize();
                $courses = CourseDAO::getInstructorCourse($instructor);
            //Walk the customers and add them to a serialized array to return.
            $serializedRatings = array();
            $serializedCourses = array();
            $serializedInstructor;
            //Serialize ratings!
            foreach ($ratings as $rating){
                $serializedRatings[] = $rating->jsonSerialize();         
            }
            //Serialize courses!
            foreach ($courses as $course)    {
                $serializedCourses[] = $course->jsonSerialize();
            }  
            //Serialize Instructor     
            $serializedInstructor = $instructor->jsonSerialize();
            //Return the results
            //Set the header
            header('Content-Type: application/json');
            //Return the array with JSON values!
            $myJSON[] = $serializedRatings; 
            $myJSON[] = $serializedCourses;
            $myJSON[] = $serializedInstructor;
            echo json_encode($myJSON);
            } 
            else{
                //Init daos
                InstructorDAO::initialize();
                $instructor = InstructorDAO::getInstructors();
                RatingDAO::initialize();
                CourseDAO::initialize();
                $instructorFullName = array();

                foreach($instructor as $instructorr){
                    $ratings[] = RatingDAO::getInstructorReviews($instructorr);                
                    $courses[] = CourseDAO::getInstructorCourse($instructorr);
                    $instructorFullName[] = $instructorr->getFirstName()." ".$instructorr->getLastName();
                }
            $serializedRatings = array();
            $serializedCourses = array();
            $serialized = array();
            $serializedInstructor;
            //Add serialized ratings to an array
            foreach ($ratings as $rating){
                foreach($rating as $ratingg){         
                    $serialized[] = $ratingg->jsonSerialize();         
                }
            }
            //Add serialized courses to an array
            foreach ($courses as $course)    {
                foreach($course as $coursee){
                    $serialized[] = $coursee->jsonSerialize();
                }
            }    
            //Add serialized instructors to an array
            foreach ($instructor as $instructorr)    {               
                $serialized[] = $instructorr->jsonSerialize();
            }
           //Add serialized instructor to an array
            $serialized[] = $instructorFullName;

  
            header('Content-Type: application/json');
           //Return serialized array!
            echo json_encode($serialized);
            }                   
    break;
   //If put, its time to update!
    case "PUT":
        RatingDAO::initialize();
        //Update Rating
        $rating = new Rating();
        $rating->setInstructorID($requestData->InstructorID);
        $rating->setCourseID($requestData->CourseID);
        $rating->setRating($requestData->Rating);
        $rating->setReview($requestData->Review);
        $rating->setStudentID($requestData->StudentID);
        $rating->setDate($requestData->Date);
        $rating->setRatingID($requestData->RatingID);      
        //Update the rating!
        $result = RatingDAO::updateRating($rating);
        header('Content-Type: application/json');
        //Encode result!
        echo json_encode($result);

    break;
//If delete, its time to delete!
    case "DELETE":
       
        RatingDAO::initialize();
        //Delete rating!
        $result = RatingDAO::deleteRating($requestData->id);
        //Set the header
        header('Content-Type: application/json');
        //return the confirmation of deletion
        echo json_encode($result);
        

    break; 

    default:
        echo json_encode(array("message"=> "Você fala HTTP?"));
    break;
}


?>