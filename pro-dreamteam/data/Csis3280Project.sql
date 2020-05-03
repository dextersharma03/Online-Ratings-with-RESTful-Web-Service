
-- DROP the database if it exists
DROP DATABASE IF EXISTS Csis3280Project;
-- CREATE THE DATABASE
CREATE DATABASE Csis3280Project;

-- SHOW DATABASES;

-- Use the database
USE Csis3280Project;


DROP TABLE IF EXISTS Course;
-- Create the Course Table 
CREATE TABLE Course (
    CourseID INT PRIMARY KEY AUTO_INCREMENT,
    CourseShortName TINYTEXT NOT NULL,
    CourseLongName TINYTEXT NOT NULL

);



DROP TABLE IF EXISTS Instructor;
-- Create the Instructor Table
CREATE TABLE Instructor (
    InstructorID INT PRIMARY KEY AUTO_INCREMENT,
    CourseID INT  NULL,
    FirstName TINYTEXT NOT NULL,
    LastName TINYTEXT NOT NULL,
    Email VARCHAR(50) NOT NULL,
    
 CONSTRAINT FOREIGN KEY (CourseID) REFERENCES Course(CourseID) ON UPDATE CASCADE
    ON DELETE CASCADE
    

);
DROP TABLE IF EXISTS Instructor_Course;

CREATE TABLE Instructor_Course(
    -- Create an intersection table between Course and Instructor
    InstructorID INT NOT NULL,
    CourseID INT NOT NULL,
    
    CONSTRAINT FOREIGN KEY (CourseID) REFERENCES Course(CourseID) ON UPDATE CASCADE
    ON DELETE CASCADE,
     CONSTRAINT FOREIGN KEY (InstructorID) REFERENCES Instructor(InstructorID) ON UPDATE CASCADE
    ON DELETE CASCADE

   
);

DROP TABLE IF EXISTS Rating;
-- Create a Rating table
CREATE TABLE Rating(
    RatingID INT PRIMARY KEY AUTO_INCREMENT,
    InstructorID INT NOT NULL,
    CourseID INT NOT NULL,
    StudentID INT NOT NULL,
    Date Date,
    Rating INT NOT NULL,
    Review VARCHAR(255),

    CONSTRAINT FOREIGN KEY (InstructorID) REFERENCES Instructor(InstructorID) ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT FOREIGN KEY (CourseID) REFERENCES Course(CourseID) ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT FOREIGN KEY (StudentID) REFERENCES Student(StudentID) ON UPDATE CASCADE
    ON DELETE CASCADE


   
);

DROP TABLE IF EXISTS Student;
-- Create a Student table
CREATE TABLE Student(
    StudentID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName TINYTEXT NOT NULL,
    LastName TINYTEXT NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Username VARCHAR(25) NOT NULL,
    Password VARCHAR(255) NOT NULL
  
);


SHOW TABLES;


-- INSERT Course values
INSERT INTO Course (CourseShortName,CourseLongName)
VALUES ('CSIS 3280 ','Web Scripting'),
('CSIS 1175 ','Visual C#'),
('CSIS 2200 ','Database 1');
-- INSERT Instructor values

INSERT INTO Instructor(CourseID,FirstName,LastName,Email)
VALUES ('1','Rahim','Virani','rahimvirani@douglascollege.ca'),
('3','Michael','Hrybyk','michealhrybyk@douglascollege.ca'),
('2','Bambang','Sarif','bambangsarif@douglascollege.ca'),
('3','Reza','Ghaeli','rezaghaeli@douglascollege.ca');

-- INSERT Instructor_Course values
INSERT INTO Instructor_Course (InstructorID,CourseID)
VALUES ('1','3'),
 ('2','3'),
 ('1','2'),
 ('3','1'),
 ('4','2');

 -- INSERT Rating Table values

INSERT INTO Rating(InstructorID,CourseID,StudentID,Date,Rating,Review)
VALUES ('1','2','1','1984-02-14','5','awesome'),
('2','3','2','1999-02-14','3','fair'),
('3','1','1','2000-02-14','1','poor'),
('4','2','2','2000-09-14','2','poor'),
('1', '3', '2', '2005-07-16', '4', 'Very Good');

-- INSERT Student Table values
INSERT INTO Student(FirstName,LastName,Email,Username,Password)
VALUES ('sam','hill','samhill@douglascollege.ca','sam_hill','$2y$10$NlMmMmcHG1/n3jsqsYwjp.Mb/K898fW/Bl/Cq0Y1bfNtHdsTMkxpi'),
('johnie','walker','johniewalkerk@douglascollege.ca','johnie_walker','$2y$10$LKJHv5.t5a5JbxIq37rkSuU5Qmdoqtj3QDsdGCvuND/E8F0GzXT.S'),
('admin','admin','admin@douglascollege.ca','admin','$2y$10$lz/s7koSPErK1WWp2OcIRuN687hpKJMl4ANt0XQMCEbfNhVkPFc9S');


