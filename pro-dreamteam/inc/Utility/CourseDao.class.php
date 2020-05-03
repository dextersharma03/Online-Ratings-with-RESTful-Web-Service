<?php



class CourseDAO  {

    //Static DB
    private static $_db;

    //Initialize the CourseDAO
    static function initialize()    {
        //Remember to send in the course name
        self::$_db=new PDOService('Course');
    }

    //Get all the courses
    static function getCourses() {
        $sql="SELECT * FROM Course ;";
       

        //Prepare the Query
        self::$_db->query($sql);

        self::$_db->execute();
        //Return the results
        
        //Return resultSet
        return self::$_db->resultSet();
    }
    //Get all instructor courses
    static function getInstructorCourse(Instructor $instructor){
        $sql = "SELECT Course.CourseID, Course.CourseShortName, Course.CourseLongName FROM Course, Instructor_Course where Instructor_Course.InstructorID=:instructorid and Instructor_Course.CourseID = Course.CourseID;";
        self::$_db->query($sql);
        self::$_db->bind(":instructorid", $instructor->getInstructorID());
        self::$_db->execute();
        return self::$_db->resultSet();
    }
    //Create a new course
    static function createCourse(Course $newCourse) {

        //Create means INSERT
        $sql="INSERT INTO Course (CourseShortName,CourseLongName)
        VALUES (:shortname,:longname);";

        //QUERY BIND EXECUTE RETURN
        self::$_db->query($sql);
        
        self::$_db->bind(":shortname",$newCourse->getCourseShortName());
        self::$_db->bind(":longname",$newCourse->getCourseLongName());
       
        self::$_db->execute();
        
        return self::$_db->lastInsertedId();
    }
    //Update a course
    static function updateCourse (Course $courseToUpdate) {
        //update means UPDATE query
    $sql = "UPDATE Course SET CourseShortName = :courseshortname,CourseLongName=:courselongname
            WHERE CourseID=:courseid;";
        
    self::$_db->query($sql);
    self::$_db->bind(":courseshortname",$courseToUpdate->getCourseShortName());
    self::$_db->bind(":courselongname",$courseToUpdate->getCourseLongName());
    self::$_db->bind(":courseid",$courseToUpdate->getCourseID());
    self::$_db->execute();
    return self::$_db->rowCount();


    //QUERY BIND EXECUTE RETURN THE RESULTS


}
//Get a course
static function getCourse(int $courseID)  {

    //Get means get one
    $sql="SELECT * FROM Course WHERE CourseID=:courseid;";

    //QUERY, BIND, EXECUTE, RETURN
    self::$_db->query($sql);
    self::$_db->bind(":courseid",$courseID);
    self::$_db->execute();
    return self::$_db->singleResult();    
}
//Delete a course
static function deleteCourse(int $courseID) {


    $sql="DELETE FROM Course WHERE CourseID=:courseid;";
    self::$_db->query($sql);
    self::$_db->bind(":courseid",$courseID);
    self::$_db->execute();
    return self::$_db->rowCount();
   

}
}



?>