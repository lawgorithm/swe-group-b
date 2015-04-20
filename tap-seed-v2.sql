INSERT INTO applicant VALUES ('abc123','Smith','John','5735551234','fake@fake.fake','3.59','12/2016', 'undergrad', '100');
INSERT INTO applicant VALUES ('zyx987','Nixon','Richard','8885554321','jowels@president.fake','2.10','05/2016', 'undergrad','60');
INSERT INTO applicant VALUES ('fewft3','Jackson','Andrew','5735558888','banks@president.fake','3.73','05/2016', 'graduate','80');
INSERT INTO applicant VALUES ('wer443','Jordan','Michael','8085555678','winning@basket.ball','3.55','12/2016','graduate','75');
INSERT INTO applicant VALUES ('jfj675','Magritte','Rene','1235551234','paint@art.null','2.05','05/2016','undergrad','60');

INSERT INTO instructor VALUES ('scottgs','Scott','Grant');
INSERT INTO instructor VALUES ('klaricm','Klaric','Matthew');
INSERT INTO instructor VALUES ('dickinsonm','Dickinson','Matthew');
INSERT INTO instructor VALUES ('guilliamsd','Guilliams','Joe');

INSERT INTO course VALUES ('CS1050','Algorithm Design and Programming I','guilliamsd');
INSERT INTO course VALUES ('CS2050','Algorithm Design and Programming II','guilliamsd');
INSERT INTO course VALUES ('CS3380','Database Applications','klaricm');
INSERT INTO course VALUES ('CS4320','Software Engineering','scottgs');

INSERT INTO applicantcourse VALUES ('wer443','CS1050','1','0','A');
INSERT INTO applicantcourse VALUES ('wer443','CS3050','1','0','A');
INSERT INTO applicantcourse VALUES ('zyx987','CS2050','1','0','A');
INSERT INTO applicantcourse VALUES ('jfj675','CS2050','2','0','A');
INSERT INTO applicantcourse VALUES ('abc123','CS4320','1','0','A');
INSERT INTO applicantcourse VALUES ('zyx987','CS4320','2','0','A');

INSERT INTO section VALUES ('A','Monday Morning','0','CS4320','Mon 8AM');
INSERT INTO section VALUES ('B','Monday Morning','0','CS4320','Mon 2PM');
