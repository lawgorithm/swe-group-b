--swe Spring 2015 group B

DROP SCHEMA IF EXISTS TAAPP CASCADE;
CREATE SCHEMA TAAPP;

SET search_path = TAAPP;

CREATE TABLE Applicant
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 LastName VARCHAR(20) NOT NULL,
 FirstName VARCHAR(20) NOT NULL,
 Phone INTEGER NOT NULL,
 Email VARCHAR(40) NOT NULL,
 GPA VARCHAR(4) NOT NULL,
 GradDate DATE NOT NULL,
 SpeakScore INTEGER,
 PRIMARY KEY(SSO)
);

CREATE TABLE Instructor
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 LastName VARCHAR(20) NOT NULL,
 FirstName VARCHAR(20) NOT NULL,
 PRIMARY KEY(SSO)
);

CREATE TABLE ApplicantCourse
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 CourseID VARCHAR(10) NOT NULL,
 Rank INTEGER NOT NULL,
 AcceptStatus BOOLEAN NOT NULL,
 SectionID VARCHAR(1),
 PRIMARY KEY(SSO, CourseID)
);

CREATE TABLE Course
(
 CourseID VARCHAR(10) NOT NULL,
 CourseName VARCHAR(40) NOT NULL,
 Instruct VARCHAR(20) REFERENCES Instructor(SSO) NOT NULL,
 PRIMARY KEY(CourseID)
);

CREATE TABLE Section
(
 SectionID VARCHAR(1) NOT NULL,
 SectionName VARCHAR(20) NOT NULL,
-- TA VARCHAR(20) REFERENCES Applicant(SSO),
 TA VARCHAR(20) NOT NULL,
 CourseID VARCHAR(10) REFERENCES Course(CourseID) NOT NULL,
 DateTime DATE NOT NULL,
 PRIMARY KEY(SectionID)
);

--INSERT INTO Applicant VALUES ('abc123','Smith','John','5735551234','fake@fake.fake','3.59','12/2015','100');
--INSERT INTO Applicant VALUES ('zyx987','Nixon','Richard','888555431','jowels@president.fake','2.10','05/50','60');

--INSERT INTO Instructor VALUES ('qwertyj','Qwerty','Jack');

--INSERT INTO ApplicantCourse VALUES ('abc123','CS4320','1','0','A');
--INSERT INTO ApplicantCourse VALUES ('zyx987','CS4320','2','0','A');

--INSERT INTO Course VALUES ('CS4320','Software Engineering','qwertyj');

--INSERT INTO Section VALUES ('A','Monday Morning','abc123','CS4320','Mon 8AM');
--INSERT INTO Section VALUES ('A','Monday Morning','zyx987','CS4320','Mon 8AM');



