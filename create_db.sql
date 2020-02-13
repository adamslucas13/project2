/*************************************************
* Creates the Dooley's Automotive parts database *
**************************************************/
DROP DATABASE IF EXISTS dooleys_parts;
CREATE DATABASE dooleys_parts;
USE dooleys_parts;  -- MySQL command

-- create the tables
CREATE TABLE makes (
  makeID       INT(11)        NOT NULL   AUTO_INCREMENT,
  makeName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (makeID)
);

CREATE TABLE parts (
  partID        INT(11)        NOT NULL   AUTO_INCREMENT,
  makeID       INT(11)        NOT NULL,
  partCode      VARCHAR(10)    NOT NULL   UNIQUE,
  partName      VARCHAR(255)   NOT NULL,
  listPrice        DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (partID)
);

CREATE TABLE orders (
  orderID        INT(11)        NOT NULL   AUTO_INCREMENT,
  customerID     INT            NOT NULL,
  orderDate      DATETIME       NOT NULL,
  PRIMARY KEY (orderID)
);

-- insert data into the database
INSERT INTO makes VALUES
(1, 'Jaguar'),
(2, 'Porsche'),
(3, 'Ferrari'),
(4, 'Astin Martin'),
(5, 'Rolls Royce'),
(6, 'Lamborghini'),
(7, 'Alfa Romeo'),
(8, 'Miscellaneous');

INSERT INTO parts VALUES
(1, 1, '1-2689-0', 'Oil Filter - Jaguar', '69.00'),
(2, 2, '2-2519-0', 'Oil Filter - Porsche', '119.00'),
(3, 3, '3-6359-0', 'Oil Filter - Ferrari', '117.00'),
(4, 4, '4-3295-0', 'Oil Filter - Astin Martin', '89.99'),
(5, 5, '5-6958-0', 'Oil Filter - Rolls Royce', '129.00'),
(6, 6, '6-6597-0', 'Oil Filter - Lamborghini', '145.00'),
(7, 7, '7-2698-0', 'Oil Filter - Alfa Romeo', '79.99'),
(8, 8, '8-1112-0', 'Premium Motor Oil/qt', '39.99'),
(9, 1, '1-6287-1', 'Air Filter - Jaguar', '49.99'),
(10, 2, '2-2894-1', 'Air Filter - Porsche', '39.99'),
(11, 3, '3-3598-1', 'Air Filter - Ferrari', '67.00'),
(12, 4, '4-8579-1', 'Air Filter - Astin Martin', '49.99'),
(13, 5, '5-5847-1', 'Air Filter - Rolls Royce', '79.00'),
(14, 6, '6-4561-1', 'Air Filter - Lamborghini', '75.00'),
(15, 7, '7-8536-1', 'Air Filter - Alfa Romeo', '39.99'),
(16, 8, '8-2568-0', 'Premium Brake Fluid', '29.89'),
(17, 8, '8-6598-0', 'Premium Transmission Fluid', '15.99'),
(18, 1, '1-5526-2', 'Upper Radiator Hose- Jaguar', '269.00'),
(19, 8, '8-8522-0', 'Premium Anti-Freeze', '35.69'),
(20, 1, '1-5527-2', 'Lower Radiator Hose - Jaguar', '399.00'),
(21, 2, '2-5526-2', 'Upper Radiator Hose- Porsche', '239.00'),
(22, 3, '3-5526-2', 'Upper Radiator Hose- Ferrari', '169.00'),
(23, 4, '4-5526-2', 'Upper Radiator Hose- Astin Martin', '269.29'),
(24, 5, '5-5526-2', 'Upper Radiator Hose- Rolls Royce', '289.60'),
(25, 6, '6-5526-2', 'Upper Radiator Hose- Lamborghini', '229.00'),
(26, 7, '7-5526-2', 'Upper Radiator Hose- Alfa Romeo', '219.99'),
(27, 2, '2-5527-2', 'Lower Radiator Hose - Porsche', '319.79'),
(28, 3, '3-5527-2', 'Lower Radiator Hose - Ferrari', '399.00'),
(29, 4, '4-5527-2', 'Lower Radiator Hose - Astin Martin', '229.00'),
(30, 5, '5-5527-2', 'Lower Radiator Hose - Rolls Royce', '299.28'),
(31, 6, '6-5527-2', 'Lower Radiator Hose - Lamborghini', '365.00'),
(32, 7, '7-5527-2', 'Lower Radiator Hose - Alfa Romeo', '539.00');

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON dooleys_parts.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';

GRANT SELECT
ON parts
TO mgs_tester@localhost
IDENTIFIED BY 'pa55word';

