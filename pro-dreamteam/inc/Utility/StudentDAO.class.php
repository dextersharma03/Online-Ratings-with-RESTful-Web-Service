<?php

class StudentDAO   {

    //Store the PDO agent here.
    private static $_db;

    static function init()  {
        //Initialize the internal PDO Agent
        self::$_db = new PDOService('Student');
    }
    //create Student
    static function createStudent(Student $newStudent) {

        //Create means INSERT
        $sql="INSERT INTO Student (FirstName,LastName,Email,Username,Password)
        VALUES (:firstname,:lastname,:email,:username,:password);";

        //QUERY BIND EXECUTE RETURN
        self::$_db->query($sql);
        self::$_db->bind(":firstname",$newStudent->getFirstName());
        self::$_db->bind(":lastname",$newStudent->getLastName());
        self::$_db->bind(":email",$newStudent->getEmail());
        self::$_db->bind(":username",$newStudent->getUsername());
        self::$_db->bind(":password",$newStudent->getPassword());
        self::$_db->execute();
        
        return self::$_db->lastInsertedId();
      

    }
    //Get the user
    static function getStudent(string $userName)  {
        $sql = "SELECT * FROM Student
        where Username = :userName;";

        //QUERY!!
        self::$_db->query($sql);
        //BIND
        self::$_db->bind(":userName",$userName);
        //EXECUTE!!
        self::$_db->execute();
        //RETURN
        return self::$_db->singleResult();

    }
    //Get all student users
    static function getUsers()  {
        $sql = "SELECT * FROM Student;";

        //QUERY!!
        self::$_db->query($sql);
        //BIND BUT THERE ARE NONE
        //EXECUTE!!
        self::$_db->execute();
        //RETURN
        return self::$_db->resultSet();

    }
    //Update a student
    static function updateStudent (Student $studentToUpdate) {
        //update means UPDATE query
    $sql = "UPDATE Student SET FirstName=:firstname,LastName=:lastname,Email=:email,Username=:username,Password=:password
            WHERE StudentID=:studentid;";
        
    self::$_db->query($sql);
    self::$_db->bind(":firstname",$studentToUpdate->getFirstName());
    self::$_db->bind(":lastname",$studentToUpdate->getLastName());
    self::$_db->bind(":email",$studentToUpdate->getEmail());
    self::$_db->bind(":username",$studentToUpdate->getUsername());
    self::$_db->bind(":password",$studentToUpdate->getPassword());
    self::$_db->bind(":studentid",$studentToUpdate->getStudentID());
    self::$_db->execute();
    return self::$_db->rowCount();


    //QUERY BIND EXECUTE RETURN THE RESULTS


}
//Delete a student
static function deleteStudent(int $studentID) {


    $sql="DELETE FROM Student WHERE StudentID=:studentid;";
    self::$_db->query($sql);
    self::$_db->bind(":studentid",$studentID);
    self::$_db->execute();
    return self::$_db->rowCount();
   

}
    
    
}