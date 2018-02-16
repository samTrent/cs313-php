 -- creating tables
/*
CREATE TABLE duty (
  dutyID    serial PRIMARY KEY,
  dutyName  varchar(20) NOT NULL,
  shifts    SMALLINT REFERENCES shift(shiftid),
  employee  SMALLINT REFERENCES employee(employeeid)
);

CREATE TABLE shift (
  shiftID   serial PRIMARY KEY,
  shiftName varchar(20) NOT NULL,
  --duty      SMALLINT REFERENCES duty(dutyid),
  weekday   SMALLINT REFERENCES weekday(weekdayid)

);


CREATE TABLE employee (
  employeeID serial PRIMARY KEY,
  firstname  varchar(100) NOT NULL,
  lastname   varchar(100) NOT NULL
);


--?????
CREATE TABLE weekday (
  weekdayid serial PRIMARY KEY,
  weekdaydate DATE NOT NULL
);
*/

CREATE TABLE employee (
  employeeid SERIAL PRIMARY KEY,
  firstname  VARCHAR(100) NOT NULL,
  lastname   VARCHAR(100) NOT NULL
);

CREATE TABLE duty (
  dutyid   SERIAL PRIMARY KEY,
  duty     VARCHAR(100)
);

CREATE TABLE shift (
  shiftid   SERIAL PRIMARY KEY,
  shift     VARCHAR(100)
);

CREATE TABLE submittedschedule (
  submittedscheduleid SERIAL PRIMARY KEY,
  date                DATE,
  employee            SMALLINT REFERENCES employee(employeeid),
  shift               SMALLINT REFERENCES shift(shiftid),
  duty                SMALLINT REFERENCES duty(dutyid)
);




-- Adding data
INSERT INTO shift (shift) VALUES ('5AM-9AM');
INSERT INTO shift (shift) VALUES ('9AM-2PM');
INSERT INTO shift (shift) VALUES ('2PM-7PM');
INSERT INTO shift (shift) VALUES ('7PM-11PM');

INSERT INTO duty (duty) VALUES ('Fitness Center');
INSERT INTO duty (duty) VALUES ('ICenter');
INSERT INTO duty (duty) VALUES ('Equipment Room');

-- adding some constraints that I forgot...
ALTER TABLE employee ALTER COLUMN shift SET NOT NULL,
ALTER COLUMN duty SET NOT NULL;

--how to inser a new schedule
INSERT INTO submittedschedule (date, employee, shift, duty)
VALUES ('02-17-2018', 6, 3, 2);

--get schedule for the day
SELECT e.firstname, d.duty FROM employee e
JOIN submittedschedule su ON e.employeeid = su.employee
JOIN duty d ON d.dutyid = su.duty WHERE su.date = '02-17-2018';

--query a spesific place
SELECT e.firstname, d.duty FROM employee e
JOIN submittedschedule su ON e.employeeid = su.employee
JOIN duty d ON d.dutyid = su.duty WHERE d.duty = 'ICenter';


--test
WITH FCemps AS (
  SELECT e.firstname, d.duty FROM employee e
  JOIN submittedschedule su ON e.employeeid = su.employee
  JOIN duty d ON d.dutyid = su.duty WHERE d.duty = 'Fitness Center'
), ICemps AS (
  SELECT e.firstname, d.duty FROM employee e
  JOIN submittedschedule su ON e.employeeid = su.employee
  JOIN duty d ON d.dutyid = su.duty WHERE d.duty = 'ICenter'
), ERemps AS (
  SELECT e.firstname, d.duty FROM employee e
  JOIN submittedschedule su ON e.employeeid = su.employee
  JOIN duty d ON d.dutyid = su.duty WHERE d.duty = 'Equipment Room'
)
SELECT * FROM submittedschedule;
