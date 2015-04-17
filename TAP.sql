--swe Spring 2015 group B

DROP SCHEMA IF EXISTS TAP CASCADE;
CREATE SCHEMA TAP;

SET search_path = TAP;

CREATE TABLE Applicant--Create Table for Applicant with all pertinent info
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 LastName VARCHAR(20) NOT NULL,
 FirstName VARCHAR(20) NOT NULL,
 Phone VARCHAR(10) NOT NULL,
 Email VARCHAR(40) NOT NULL,
 GPA VARCHAR(4) NOT NULL,
 GradDate VARCHAR(8) NOT NULL,
 Program VARCHAR(10) NOT NULL,
 SpeakScore INTEGER,
 PRIMARY KEY(SSO)
);

CREATE TABLE Instructor--Create Table for Instructor(s) of Course(s)
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 LastName VARCHAR(20) NOT NULL,
 FirstName VARCHAR(20) NOT NULL,
 PRIMARY KEY(SSO)
);

CREATE TABLE ApplicantCourse--Create Table for an Applicant to a Course with a given Rank
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 CourseID VARCHAR(10) NOT NULL,
 Rank INTEGER NOT NULL,
 AcceptStatus BOOLEAN NOT NULL,
 SectionID VARCHAR(1),
 PRIMARY KEY(SSO, CourseID)
);

CREATE TABLE Course--Create Table for Course(s) taught by an Instructor
(
 CourseID VARCHAR(10) NOT NULL,
 CourseName VARCHAR(40) NOT NULL,
 Instruct VARCHAR(20) REFERENCES Instructor(SSO) NOT NULL,
 PRIMARY KEY(CourseID)
);

CREATE TABLE Section--Create Table for at least one Section within a Course, assigned to a TA
(
 SectionID VARCHAR(1) NOT NULL,
 SectionName VARCHAR(20) NOT NULL,
 TA VARCHAR(20) NOT NULL,
 CourseID VARCHAR(10) REFERENCES Course(CourseID) NOT NULL,
 DateTime VARCHAR(10) NOT NULL,
 PRIMARY KEY(SectionID)
);
