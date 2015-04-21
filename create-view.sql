CREATE VIEW acview AS
WITH acsub AS (
SELECT coursename, courseid, sso, rank
FROM applicantcourse NATURAL JOIN course
)
SELECT *
FROM applicant NATURAL JOIN acsub
;