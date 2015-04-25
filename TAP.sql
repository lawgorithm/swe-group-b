--swe Spring 2015 group B

DROP SCHEMA IF EXISTS TAP CASCADE;
CREATE SCHEMA TAP;

SET search_path = TAP;

CREATE TABLE Applicant--Create Table for Applicant with all pertinent info
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 Name VARCHAR(40) NOT NULL,
 Phone VARCHAR(10) NOT NULL,
 Email VARCHAR(40) NOT NULL,
 GPA VARCHAR(4) NOT NULL,
 GradDate VARCHAR(10) NOT NULL,
 Program VARCHAR(10) NOT NULL,
 PreviousWork VARCHAR(140),
 PreviousTeach VARCHAR[40],
 CurrentTeach VARCHAR[4],
 FutureTeach VARCHAR[4],
 SpeakScore INTEGER,
 SpeakDate VARCHAR(10),
 PasswordTemp VARCHAR(20) NOT NULL,
 PRIMARY KEY(SSO)
);

CREATE TABLE Instructor--Create Table for Instructor(s) of Course(s)
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 Name VARCHAR(40) NOT NULL,
 PasswordTemp VARCHAR(20) NOT NULL,
 PRIMARY KEY(SSO)
);

CREATE TABLE ApplicantCourse--Create Table for an Applicant to a Course with a given Rank
(
 SSO VARCHAR(20) NOT NULL DEFAULT '',
 CourseID VARCHAR(10) NOT NULL,
 Rank INTEGER NOT NULL,
 Feedback VARCHAR(140) NOT NULL,
 AcceptStatus BOOLEAN NOT NULL,
 SectionID VARCHAR(1),
 PRIMARY KEY(SSO, CourseID)
);

CREATE TABLE Course--Create Table for Course(s) taught by an Instructor
(
 CourseID VARCHAR(10) NOT NULL,
 CourseName VARCHAR(80) NOT NULL,
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
