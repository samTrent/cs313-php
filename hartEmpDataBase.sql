 -- creating tables

CREATE TABLE duty (
  dutyID    serial PRIMARY KEY,
  dutyName  varchar(20) NOT NULL
);

CREATE TABLE shift (
  shiftID   serial PRIMARY KEY,
  shiftName varchar(20) NOT NULL
);


CREATE TABLE employee (
  employeeID serial PRIMARY KEY,
  firstname  varchar(100) NOT NULL,
  lastname   varchar(100) NOT NULL
);

--?????
CREATE TABLE schedule (
  scheduleid serial PRIMARY KEY,
  theDate    DATE,
  employee   SMALLINT NOT NULL REFERENCES employee(employeeid),
  shift      SMALLINT NOT NULL REFERENCES shift(shiftID),
  duty       SMALLINT NOT NULL REFERENCES duty(dutyID)

);







-- Adding data
INSERT INTO shift (shiftName) VALUES ('5AM-9AM');
INSERT INTO shift (shiftName) VALUES ('9AM-2PM');
INSERT INTO shift (shiftName) VALUES ('2PM-7PM');
INSERT INTO shift (shiftName) VALUES ('7PM-11PM');

INSERT INTO duty (dutyName) VALUES ('Fitness Center');
INSERT INTO duty (dutyName) VALUES ('ICenter');
INSERT INTO duty (dutyName) VALUES ('Equipment Room');

-- adding some constraints that I forgot...
ALTER TABLE employee ALTER COLUMN shift SET NOT NULL,
ALTER COLUMN duty SET NOT NULL;

--testing adding a person
INSERT INTO employee (firstname, lastname) VALUES ('Sam', 'Trent');


--create a new schedule
INSERT INTO schedule (eployee, shift, duty) VALUES (1, 2, 3);
