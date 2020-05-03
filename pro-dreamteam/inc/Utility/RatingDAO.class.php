<?php

//SectionID	Semester	InstructorName	CourseID

class RatingDAO  {

    //Hold the $_db in a variable.
    private static $_db;

    static function initialize()    {
      //Create the PDOService instance locally, be sure to specify the class.
      self::$_db=new PDOService('Rating');
    }
    //Create a new rating
    static function createRating(Rating $newRating) {

        //Create means INSERT
        $sql="INSERT INTO Rating (InstructorID, CourseID, StudentID, Date, Rating, Review)
        VALUES (:instructorid,:courseid,:studentid,:date,:rating,:review);";
        //QUERY BIND EXECUTE RETURN
        self::$_db->query($sql);
        self::$_db->bind(":instructorid",$newRating->getInstructorID());
        self::$_db->bind(":courseid",$newRating->getCourseID());
        self::$_db->bind(":studentid",$newRating->getStudentID());
        self::$_db->bind(":date",$newRating->getDate());
        self::$_db->bind(":rating",$newRating->getRating());
        self::$_db->bind(":review",$newRating->getReview());
        self::$_db->execute();    
        return self::$_db->lastInsertedId();
      

    }
    //Get a particular rating
    static function getRating(int $ratingID)  {

        //Gget means get one
        $sql="SELECT * FROM Rating WHERE RatingID=:ratingid;";

        //QUERY, BIND, EXECUTE, RETURN
        self::$_db->query($sql);
        self::$_db->bind(":ratingid",$ratingID);
        self::$_db->execute();
        return self::$_db->singleResult();
       
    }
    //Get all ratings
    static function getRatings() {

        //No parameters so no bind
        $sql="SELECT * FROM Rating;";
        self::$_db->query($sql);
        
        //Prepare the Query
        //execute the query
        self::$_db->execute();
        //Return results
        return self::$_db->resultSet();
    }
    //Get Reviews for particular instructor
    static function getInstructorReviews(Instructor $instructor){
        $sql = "SELECT Course.CourseShortName, Student.FirstName, Student.LastName, Rating.RatingID, Rating.Date, Rating.CourseID, Rating.StudentID, Rating.InstructorID, Rating.Rating, Rating.Review 
        FROM Instructor, Rating, Student, Course 
        where Rating.InstructorID=:instructorid = Instructor.InstructorID and Rating.CourseID = Course.CourseID and Rating.StudentID = Student.StudentID
         ORDER BY Rating.Date DESC;";
        self::$_db->query($sql);
        self::$_db->bind(":instructorid", $instructor->getInstructorID());
        self::$_db->execute();
        return self::$_db->resultSet();
    }
    //Update a rating
    static function updateRating (Rating $ratingToUpdate) {
            //update means UPDATE query
        $sql = "UPDATE Rating SET InstructorID = :instructorid,CourseID=:courseID, StudentID = :studentID,Date = :date, Rating=:rating,Review=:review
                WHERE RatingID=:ratingid;";
            //, FirstName=:firstName,LastName=:lastName
        self::$_db->query($sql);
        
        self::$_db->bind(":instructorid",$ratingToUpdate->getInstructorID());
        self::$_db->bind(":rating",$ratingToUpdate->getRating());
        self::$_db->bind(":review",$ratingToUpdate->getReview());
        self::$_db->bind(":courseID",$ratingToUpdate->getCourseID());
        self::$_db->bind(":studentID",$ratingToUpdate->getStudentID());
        self::$_db->bind(":date",$ratingToUpdate->getDate());
        self::$_db->bind(":ratingid",$ratingToUpdate->getRatingID());
        // self::$_db->bind(":firstName",$ratingToUpdate->getFirstName());
        // self::$_db->bind(":lastName",$ratingToUpdate->getLastName());

        self::$_db->execute();
       // return self::$_db->rowCount();
        return self::$_db->lastInsertedId();


        //QUERY BIND EXECUTE RETURN THE RESULTS


    }
    //Delete rating
    static function deleteRating(int $ratingID) {


        $sql="DELETE FROM Rating WHERE RatingID=:ratingid;";
        self::$_db->query($sql);
        self::$_db->bind(":ratingid",$ratingID);
        self::$_db->execute();
        return self::$_db->rowCount();
       

    }
   

}


?>