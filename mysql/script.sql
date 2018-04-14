
DROP DATABASE hackDon;

CREATE DATABASE hackDon CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE hackDon;

CREATE TABLE accountOrganisation(
	ID INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	passwordHash VARCHAR(255) NOT NULL,
	description BLOB NOT NULL,
	bannerImg BLOB DEFAULT NULL,
	code VARCHAR(255) NOT NULL,
	datetime DATETIME DEFAULT NOW() NOT NULL,
	PRIMARY KEY(ID)
)Engine=InnoDB;

CREATE TABLE accountUser(
	ID INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	passwordHash VARCHAR(255) NOT NULL,
	score INT DEFAULT 0 NOT NULL,
	datetime DATETIME DEFAULT NOW() NOT NULL,
	PRIMARY KEY(ID)
)Engine=InnoDB;

CREATE TABLE project(
	ID INT AUTO_INCREMENT NOT NULL,
	organisationID INT NOT NULL,
	name VARCHAR(255) NOT NULL,
	description BLOB NOT NULL,
	objective VARCHAR(255) NOT NULL,
	amountWanted INT NOT NULL,
	amountCollected INT DEFAULT 0 NOT NULL,
	isCompleted BOOLEAN DEFAULT FALSE NOT NULL,
	datetime DATETIME DEFAULT NOW() NOT NULL,
	PRIMARY KEY(ID),
	CONSTRAINT FOREIGN KEY(organisationID) REFERENCES accountOrganisation(ID) ON DELETE CASCADE
)Engine=InnoDB;

CREATE TABLE donations(
	ID INT AUTO_INCREMENT NOT NULL,
	accountID INT NOT NULL,
	projectID INT NOT NULL,
	amountID INT DEFAULT 0 NOT NULL,
	datetime DATETIME DEFAULT NOW() NOT NULL,
	PRIMARY KEY(ID),
	CONSTRAINT FOREIGN KEY(accountID) REFERENCES accountUser(ID) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY(projectID) REFERENCES project(ID) ON DELETE CASCADE
)Engine=InnoDB;

CREATE TABLE notifications(
	ID INT AUTO_INCREMENT NOT NULL,
	accountID INT NOT NULL,
	projectID INT NOT NULL,
	content VARCHAR(255) NOT NULL,
	isSeen BOOLEAN DEFAULT FALSE NOT NULL,
	datetime DATETIME DEFAULT NOW() NOT NULL,
	PRIMARY KEY(ID),
	CONSTRAINT FOREIGN KEY(accountID) REFERENCES accountUser(ID) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY(projectID) REFERENCES project(ID) ON DELETE CASCADE
)Engine=InnoDB;


/*** RECORDS FOR TESTING ***/
INSERT INTO accountUser(name, email, passwordHash) VALUES("bob", "bob@bob.com", "");
INSERT INTO accountOrganisation(name, email, passwordHash, description, code) VALUES("CHUS", "fondation@chus.org", "", "Fondation du CHUS", "qwerty");
INSERT INTO project(organisationID, name, description, amountWanted) VALUES(1, "Cancer", "Rammasser de l'argent pour aider le cancer.", 3000000);
