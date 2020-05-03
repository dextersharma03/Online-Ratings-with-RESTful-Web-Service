<?php

class Instructor_CourseDAO{

    //Static DB
    private static $_db;

    //Initialize the CourseDAO
    static function initialize()    {
        //Remember to send in the course name
        self::$_db=new PDOService('Instructor_Course');
    }
    //Add a new course for instructor
    static function createInstructor_Course(Instructor_Course $newInstructorCourse) {

        //Create means INSERT
        $sql="INSERT IGNORE INTO Instructor_Course (InstructorID,CourseID)
        VALUES (:instructorid,:courseid);";

        //QUERY BIND EXECUTE RETURN
        self::$_db->query($sql);
        self::$_db->bind(":instructorid",$newInstructorCourse->getInstructorID());
        self::$_db->bind(":courseid",$newInstructorCourse->getCourseID());
        self::$_db->execute();
        
        return self::$_db->lastInsertedId();
    }
    //Get all instructor courses
    static function getInstructor_Courses() {
        $sql = "SELECT Distinct Instructor.FirstName,Instructor.LastName,Course.CourseShortName,Course.CourseLongName,
                        Instructor_Course.InstructorID,Instructor_Course.CourseID
                    FROM Instructor join Course 
                     join Instructor_Course
                        on Instructor.InstructorID=Instructor_Course.InstructorID
                            and Instructor_Course.CourseID = Course.CourseID;";

        //Prepare the Query
        self::$_db->query($sql);
        self::$_db->execute();
        //Return the results
        return self::$_db->resultset();
        //Return row
    }
}



?>