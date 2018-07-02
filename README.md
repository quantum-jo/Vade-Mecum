# Vade-Mecum

This app uses Google Books API

**Setting up the Data Base**

- Change $dbName to your data base name in connection.php
- Default table name is set as users




*Code for users*


CREATE TABLE users (
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(500) NOT NULL UNIQUE,
	email VARCHAR(500) NOT NULL,
	password VARCHAR(500) NOT NULL
);


