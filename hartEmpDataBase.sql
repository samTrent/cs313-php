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

CREATE TABLE dutyset (
  dutysetid SERIAL PRIMARY KEY,
  employees SMALLINT[] ELEMENT REFERENCES employee,
  duty      SMALLINT REFERENCES duty(dutyid)
);

--?????
CREATE TABLE schedule (
  scheduleid serial PRIMARY KEY,
  thedate    DATE NOT NULL,
  dutysets   SMALLINT[],
  shift      SMALLINT NOT NULL REFERENCES shift(shiftID)
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

INSERT INTO schedule (theDate, employee, shift, duty) VALUES ('2/15/2018', 1, 2, 2);
