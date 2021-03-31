CREATE TABLE blogUser(
	userName VARCHAR(15),
	password VARCHAR(255),
	firstName VARCHAR(15),
	lastName VARCHAR(15),
	email VARCHAR(30),
	isAdmin BOOLEAN, 
	profilePic BLOB,
	PRIMARY KEY (userName) 
);

CREATE TABLE post(
	pid INT AUTO_INCREMENT,	
	pUserName  VARCHAR(15),
	description VARCHAR(700),
	time DATETIME,
	imagePath VARCHAR(100),
	image BLOB,
	likes INT, 
	postName VARCHAR(70),
	topic VARCHAR(20),
	allowComment BOOLEAN,
	PRIMARY KEY (pid),
	FOREIGN KEY (pUserName) REFERENCES blogUser(userName)
				ON DELETE NO ACTION
				ON UPDATE CASCADE
);
CREATE TABLE comment(
	cUserName VARCHAR(15), 
	pid INT,
	commentContent VARCHAR(240),
	likes INT,
	time DATETIME, 
	PRIMARY KEY (cUserName, pid),
	FOREIGN KEY (cUserName) REFERENCES blogUser(userName)
				ON DELETE NO ACTION
				ON UPDATE CASCADE,
	FOREIGN KEY (pid) REFERENCES post(pid) 
				ON DELETE NO ACTION
				ON UPDATE CASCADE
);