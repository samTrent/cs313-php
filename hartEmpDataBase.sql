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
  name       varchar(100) NOT NULL,
  shift      varchar(20) REFERENCES shift(shiftID),
  duty       varchar(20) REFERENCES duty(dutyID)
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
INSERT INTO employee (name, shift, duty) VALUES ('Sam Trent', 3, 3);
