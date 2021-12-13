
CREATE TABLE IF NOT EXISTS schools (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        schoolName VARCHAR(200) DEFAULT NULL,
        schoolCity VARCHAR(200) DEFAULT NULL,
        schoolState VARCHAR(200) DEFAULT NULL
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS users (
	
        userName VARCHAR(200) DEFAULT NULL,
        userPassword VARCHAR(200) DEFAULT NULL
        
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT into users SET userName = "donald", userPassword = sha1(CONCAT("school-salt","duck"));


/* make sure you add the users table and insert a user with user name donald and password duck */

