<?php
/**
 * Developed by:
 * Dikshit Sharma
 */
require_once("inc/config.inc.php");
require_once("inc/Entity/Instructor.class.php");
require_once("inc/Entity/Rating.class.php");
require_once("inc/Entity/Course.class.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/RestClient.class.php");
require_once("inc/Utility/Page.class.php");

session_start();
//Verify Login
LoginManager::verifyLogin();
//show header
Page::headerForProfessor();
//Get all instructor fullnames from database for autofill
$getDataForAutoFill = RestClient::call("GET");
Page::searchFormProfessor($getDataForAutoFill);
$student = $_SESSION["user"];
//If get request is not empty
if (!empty($_GET)) {
    //If action is search for instructor
    if (isset($_GET["action"]) && $_GET["action"] == "searchButton")    {
        //Get fullname
        $fullName = $_GET["search"];
        $errors = array();     
        //If all the format matches            
            if(strpos($fullName, ' ') !== false) {    
                //Get serializedInstructor, Reviews for instructor, and courses for instructor         
                $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $_GET["search"]));
                //If cannot get anything, show error list that instructor is not found
                if ($jInstrucorReviewsAndCourses == null){
                    $errors[] = "Cannot Find Instructor, Try Again!";
                    Page::showErrorsList($errors);
                } 
                //If instructor is found, proceed
                else {
                $reviews = array();
                $courses = array(); 
                //Unserialize an instructor from json
                $instructor = new Instructor();
                $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
                if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
                }
                $instructor->setFirstName($jInstrucorReviewsAndCourses[2]->FirstName); 
                $instructor->setLastName($jInstrucorReviewsAndCourses[2]->LastName); 
                $instructor->setEmail($jInstrucorReviewsAndCourses[2]->Email);
                //Unserialize reviews for instructor              
                foreach ($jInstrucorReviewsAndCourses[0] as $jInstrucorReviewAndCourse){
                        $rating = new Rating();
                        $rating->setRatingID($jInstrucorReviewAndCourse->RatingID)  ;              
                        $rating->setInstructorID($jInstrucorReviewAndCourse->InstructorID);
                        $rating->setCourseID($jInstrucorReviewAndCourse->CourseID);
                        $rating->setStudentID($jInstrucorReviewAndCourse->StudentID);
                        $rating->setDate($jInstrucorReviewAndCourse->Date);
                        $rating->setReview($jInstrucorReviewAndCourse->Review);
                        $rating->setRating($jInstrucorReviewAndCourse->Rating);
                        $rating->setFirstName($jInstrucorReviewAndCourse->FirstName);
                        $rating->setLastName($jInstrucorReviewAndCourse->LastName);  
                        $rating->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);               
                        $reviews[] = $rating;                    
                }         
                //Unserialize courses for instructor    
                foreach($jInstrucorReviewsAndCourses[1] as $jInstrucorReviewAndCourse){
                    $course = new Course();
                    $course->setCourseID($jInstrucorReviewAndCourse->CourseID);
                    $course->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);
                    $course->setCourseLongName($jInstrucorReviewAndCourse->CourseLongName);
                    $courses[] = $course;                    
                }  
                //Calculate average for instructor                                   
                $totalRating = 0;                            
                    foreach ($reviews as $review){         
                        $totalRating += $review->getRating(); 
                    }
                    $averageForInstructor = 0; 
                    //If reviews for instructor is not zero, proceed. Its done to eliminate errors by dividing on zero.      
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                    }              
                    Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                    Page::ratingsForm($courses, $instructor); 
                }
                                            
            }
            //If the format is not matches, show an error!
            else {  
                $errors[] = "Cannot Find Instructor, Please try again!"; 
                Page::showErrorsList($errors);                            
           }
         }
    }

    //If post is not empty
    if (!empty($_POST)){
        //If ratings button is clicked
        if (isset($_POST["action"]) && $_POST["action"] == "ratingsButton"){  
            //Get current date and set it to a newly created rating
            $date = date("Y/m/d")  ;
            $postData = array(
                "InstructorID" => $_POST["instructorid"],
                "CourseID" => $_POST["courseNumber"],
                "Rating" => $_POST["ratingNumber"],
                "Review" => $_POST["experience"],
                "StudentID" => $student->getStudentID(),
                "Date" => $date
            );  
            //Create a new rating based on the postdata       
            RestClient::call("POST", $postData);
            //Show all the ratings for the instructor with newly created rating
            $instructorName = $_POST['firstname']." ".$_POST['lastname'];
            $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $instructorName));         
            $reviews = array();
            $courses = array(); 
            $instructor = new Instructor();
            $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
            if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
            }
            $instructor->setFirstName($jInstrucorReviewsAndCourses[2]->FirstName); 
            $instructor->setLastName($jInstrucorReviewsAndCourses[2]->LastName); 
            $instructor->setEmail($jInstrucorReviewsAndCourses[2]->Email);              
            foreach ($jInstrucorReviewsAndCourses[0] as $jInstrucorReviewAndCourse){
                    $rating = new Rating();
                    $rating->setRatingID($jInstrucorReviewAndCourse->RatingID)  ;              
                    $rating->setInstructorID($jInstrucorReviewAndCourse->InstructorID);
                    $rating->setCourseID($jInstrucorReviewAndCourse->CourseID);
                    $rating->setStudentID($jInstrucorReviewAndCourse->StudentID);
                    $rating->setDate($jInstrucorReviewAndCourse->Date);
                    $rating->setReview($jInstrucorReviewAndCourse->Review);
                    $rating->setRating($jInstrucorReviewAndCourse->Rating);
                    $rating->setFirstName($jInstrucorReviewAndCourse->FirstName);
                    $rating->setLastName($jInstrucorReviewAndCourse->LastName);  
                    $rating->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);               
                    $reviews[] = $rating;                    
            }             
            foreach($jInstrucorReviewsAndCourses[1] as $jInstrucorReviewAndCourse){
                $course = new Course();
                $course->setCourseID($jInstrucorReviewAndCourse->CourseID);
                $course->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);
                $course->setCourseLongName($jInstrucorReviewAndCourse->CourseLongName);
                $courses[] = $course;                    
            }                                     
            $totalRating = 0;                            
                foreach ($reviews as $review){         
                    $totalRating += $review->getRating(); 
                }
                $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                }                       
                Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                Page::ratingsForm($courses, $instructor);
            
        }
    
    //If edit button is clicked, edit the rating!
    else if (isset($_POST["action"]) && $_POST["action"] == "ratingsEditButton"){
        $date = date("Y/m/d")  ;
            $postData = array(
                "InstructorID" => $_POST["instructorid"],
                "CourseID" => $_POST["courseNumber"],
                "Rating" => $_POST["ratingNumber"],
                "Review" => $_POST["experience"],
                "StudentID" => $student->getStudentID(),
                "RatingID" => $_POST["ratingID"],
                "Date" => $date
            );     
            //Update it based on post data!    
            RestClient::call("PUT", $postData);
            //Show updated rating!
            $instructorName = $_POST['firstname']." ".$_POST['lastname'];
            $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $instructorName));         
            $reviews = array();
            $courses = array(); 
            $instructor = new Instructor();
            $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
            if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
            }
            $instructor->setFirstName($jInstrucorReviewsAndCourses[2]->FirstName); 
            $instructor->setLastName($jInstrucorReviewsAndCourses[2]->LastName); 
            $instructor->setEmail($jInstrucorReviewsAndCourses[2]->Email);              
            foreach ($jInstrucorReviewsAndCourses[0] as $jInstrucorReviewAndCourse){
                    $rating = new Rating();
                    $rating->setRatingID($jInstrucorReviewAndCourse->RatingID)  ;              
                    $rating->setInstructorID($jInstrucorReviewAndCourse->InstructorID);
                    $rating->setCourseID($jInstrucorReviewAndCourse->CourseID);
                    $rating->setStudentID($jInstrucorReviewAndCourse->StudentID);
                    $rating->setDate($jInstrucorReviewAndCourse->Date);
                    $rating->setReview($jInstrucorReviewAndCourse->Review);
                    $rating->setRating($jInstrucorReviewAndCourse->Rating);
                    $rating->setFirstName($jInstrucorReviewAndCourse->FirstName);
                    $rating->setLastName($jInstrucorReviewAndCourse->LastName);  
                    $rating->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);               
                    $reviews[] = $rating;                    
            }             
            foreach($jInstrucorReviewsAndCourses[1] as $jInstrucorReviewAndCourse){
                $course = new Course();
                $course->setCourseID($jInstrucorReviewAndCourse->CourseID);
                $course->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);
                $course->setCourseLongName($jInstrucorReviewAndCourse->CourseLongName);
                $courses[] = $course;                    
            }                                     
            $totalRating = 0;                            
                foreach ($reviews as $review){         
                    $totalRating += $review->getRating(); 
                }
                $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                }                                  
                Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                Page::ratingsForm($courses, $instructor);
    
    }
}

//when the delete button is clicked in panel
if (isset($_GET["action"]) && $_GET["action"] == "deleteButton"){    
    //Call Restclient to delete a rating! 
    RestClient::call("DELETE", array('id' => $_GET['id']));
    //Show all the ratings once again!
    $instructorName = $_GET['firstname']." ".$_GET['lastname'];
            $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $instructorName));         
            $reviews = array();
            $courses = array(); 
            $instructor = new Instructor();
            $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
            if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
            }
            $instructor->setFirstName($jInstrucorReviewsAndCourses[2]->FirstName); 
            $instructor->setLastName($jInstrucorReviewsAndCourses[2]->LastName); 
            $instructor->setEmail($jInstrucorReviewsAndCourses[2]->Email);              
            foreach ($jInstrucorReviewsAndCourses[0] as $jInstrucorReviewAndCourse){
                    $rating = new Rating();
                    $rating->setRatingID($jInstrucorReviewAndCourse->RatingID)  ;              
                    $rating->setInstructorID($jInstrucorReviewAndCourse->InstructorID);
                    $rating->setCourseID($jInstrucorReviewAndCourse->CourseID);
                    $rating->setStudentID($jInstrucorReviewAndCourse->StudentID);
                    $rating->setDate($jInstrucorReviewAndCourse->Date);
                    $rating->setReview($jInstrucorReviewAndCourse->Review);
                    $rating->setRating($jInstrucorReviewAndCourse->Rating);
                    $rating->setFirstName($jInstrucorReviewAndCourse->FirstName);
                    $rating->setLastName($jInstrucorReviewAndCourse->LastName);  
                    $rating->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);               
                    $reviews[] = $rating;                    
            }             
            foreach($jInstrucorReviewsAndCourses[1] as $jInstrucorReviewAndCourse){
                $course = new Course();
                $course->setCourseID($jInstrucorReviewAndCourse->CourseID);
                $course->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);
                $course->setCourseLongName($jInstrucorReviewAndCourse->CourseLongName);
                $courses[] = $course;                    
            }                                     
            $totalRating = 0;                            
                foreach ($reviews as $review){         
                    $totalRating += $review->getRating(); 
                }
                $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                 }  
                                  
                Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                Page::ratingsForm($courses, $instructor);


}

//when the edit button is clicked in panel
if (isset($_GET["action"]) && $_GET["action"] == "editButton"){  
    //Show the edit form!         
            $instructorName = $_GET['firstname']." ".$_GET['lastname'];
            $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $instructorName));         
            $reviews = array();
            $courses = array(); 
            $instructor = new Instructor();
            $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
            if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
            }
            $instructor->setFirstName($jInstrucorReviewsAndCourses[2]->FirstName); 
            $instructor->setLastName($jInstrucorReviewsAndCourses[2]->LastName); 
            $instructor->setEmail($jInstrucorReviewsAndCourses[2]->Email);  
            $ratingObject = new Rating();            
            foreach ($jInstrucorReviewsAndCourses[0] as $jInstrucorReviewAndCourse){
                    $rating = new Rating();
                    $rating->setRatingID($jInstrucorReviewAndCourse->RatingID); 
                    if($jInstrucorReviewAndCourse->RatingID == $_GET["id"] ) {
                        $ratingObject->setRatingID($jInstrucorReviewAndCourse->RatingID);
                    }            
                    $rating->setInstructorID($jInstrucorReviewAndCourse->InstructorID);
                    $rating->setCourseID($jInstrucorReviewAndCourse->CourseID);
                    $rating->setStudentID($jInstrucorReviewAndCourse->StudentID);
                    $rating->setDate($jInstrucorReviewAndCourse->Date);
                    $rating->setReview($jInstrucorReviewAndCourse->Review);
                    if($jInstrucorReviewAndCourse->Review == $_GET["review"] ) {
                        $ratingObject->setReview($jInstrucorReviewAndCourse->Review);
                    }
                    $rating->setRating($jInstrucorReviewAndCourse->Rating);
                    if($jInstrucorReviewAndCourse->Rating == $_GET["rating"] ) {
                        $ratingObject->setRating($jInstrucorReviewAndCourse->Rating);
                    }
                    $rating->setFirstName($jInstrucorReviewAndCourse->FirstName);
                    $rating->setLastName($jInstrucorReviewAndCourse->LastName);  
                    $rating->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);               
                    $reviews[] = $rating;                    
            }             
            foreach($jInstrucorReviewsAndCourses[1] as $jInstrucorReviewAndCourse){
                $course = new Course();
                $course->setCourseID($jInstrucorReviewAndCourse->CourseID);
                $course->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);
                $course->setCourseLongName($jInstrucorReviewAndCourse->CourseLongName);
                $courses[] = $course;                    
            }                                     
            $totalRating = 0;                            
                foreach ($reviews as $review){         
                    $totalRating += $review->getRating(); 
                }
                $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                }  
                                  
                Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                Page::editRatingsForm($courses, $instructor, $ratingObject);

}

Page::footerforProfessor();

?>