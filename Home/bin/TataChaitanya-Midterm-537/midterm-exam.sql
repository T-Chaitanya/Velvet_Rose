/*****************************************
* Create the my_guitar_shop2 database
*****************************************/
-- create and select the database
DROP DATABASE IF EXISTS midterm_exam_db;
CREATE DATABASE midterm_exam_db;
USE midterm_exam_db;

CREATE TABLE administrators (
  adminID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (adminID)
);

INSERT INTO administrators (adminID, emailAddress, password, firstName, lastName) VALUES
(1, 'admin@myguitarshop.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Admin', 'User'),
(2, 'joel@murach.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Joel', 'Murach'),
(3, 'mike@murach.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Mike', 'Murach');

-- create the user
CREATE USER IF NOT EXISTS msu_user@localhost 
IDENTIFIED BY 'pa55word';

-- grant privileges to the user
GRANT SELECT, INSERT, UPDATE, DELETE
ON midterm_exam_db.* 
TO msu_user@localhost;

