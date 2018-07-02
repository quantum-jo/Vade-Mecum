# Vade-Mecum

This app uses Google Books API





## Setting up the Data Base

- Change $dbName to your data base name in connection.php
- Default table name is set as users
- No default password is given to sql. This can be changed in connection.php




**Code for users**


CREATE TABLE users (
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(500) NOT NULL UNIQUE,
	email VARCHAR(500) NOT NULL,
	password VARCHAR(500) NOT NULL
);


### Password


- The app uses password hashing 


## Services

- **Apache**
- **PHP 7**
- **SQL**
- **JAVASCRIPT**

### Additional Notes

*Included font is Raleway*
