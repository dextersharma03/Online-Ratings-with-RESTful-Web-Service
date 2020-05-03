<?php
class InstructorDAO  {

    //Hold the $_db in a variable.
    private static $_db;

    static function initialize()    {
      //Create the PDOService instance locally, be sure to specify the class.
      self::$_db=new PDOService('Instructor');
    }
    //Create a new instructor
    static function createInstructor(Instructor $newInstructor) {

        //Create means INSERT
        $sql="INSERT INTO Instructor (FirstName,LastName,Email)
        VALUES (:firstname,:lastname,:email);";

        //QUERY BIND EXECUTE RETURN
        self::$_db->query($sql);
        self::$_db->bind(":firstname",$newInstructor->getFirstName());
        self::$_db->bind(":lastname",$newInstructor->getLastName());
        self::$_db->bind(":email",$newInstructor->getEmail());
        self::$_db->execute();
        
        return self::$_db->lastInsertedId();
    }
    //Get an instructor by id
    static function getInstructor(int $instructorID)  {

        //Gget means get one
        $sql="SELECT * FROM Instructor WHERE InstructorID=:instructorid;";

        //QUERY, BIND, EXECUTE, RETURN
        self::$_db->query($sql);
        self::$_db->bind(":instructorid",$instructorID);
        self::$_db->execute();
        return self::$_db->singleResult();    
    }
    //Get an instructor by fullname
    static function getInstructorByName(string $firstName, string $lastName){
        $sql = "SELECT * FROM Instructor where FirstName=:firstname AND LastName=:lastname;";
        self::$_db->query($sql);
        self::$_db->bind(":firstname", $firstName);
        self::$_db->bind(":lastname", $lastName);
        self::$_db->execute();
        return self::$_db->singleResult();
    }
    //Get all instructors
    static function getInstructors() {

        //No parameters so no bind
        $sql="SELECT * FROM Instructor;";
        self::$_db->query($sql);
        
        //Prepare the Query
        //execute the query
        self::$_db->execute();
        //Return results
        return self::$_db->resultSet();
    }
    //Update an instructor
    static function updateInstructor (Instructor $instructorToUpdate) {
            //update means UPDATE query
        $sql = "UPDATE Instructor SET FirstName=:firstname,LastName=:lastname,Email=:email
                WHERE InstructorID=:instructorid;";
            
        self::$_db->query($sql);

        self::$_db->bind(":firstname",$instructorToUpdate->getFirstName());
        self::$_db->bind(":lastname",$instructorToUpdate->getLastName());
        self::$_db->bind(":email",$instructorToUpdate->getEmail());
        self::$_db->bind(":instructorid",$instructorToUpdate->getInstructorID());
        self::$_db->execute();
        return self::$_db->rowCount();


        //QUERY BIND EXECUTE RETURN THE RESULTS


    }
    //Delete an instructor by id
    static function deleteInstructor(int $instructorID) {


        $sql="DELETE FROM Instructor WHERE InstructorID=:instructorid;";
        self::$_db->query($sql);
        self::$_db->bind(":instructorid",$instructorID);
        self::$_db->execute();
        return self::$_db->rowCount();
       

    }
   

}


?>