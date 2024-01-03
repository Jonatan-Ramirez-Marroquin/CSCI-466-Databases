DROP TABLE IF EXISTS FreeQueue;
DROP TABLE IF EXISTS PaidQueue;
DROP TABLE IF EXISTS KaraokeFile;
DROP TABLE IF EXISTS ContributeTo;
DROP TABLE IF EXISTS Songs;
DROP TABLE IF EXISTS Artist;
DROP TABLE IF EXISTS Contributor;
DROP TABLE IF EXISTS User;

CREATE TABLE User(
	userName VARCHAR(50) NOT NULL,
	PRIMARY KEY(userName)
);

CREATE TABLE Artist(
	artistID INT NOT NULL AUTO_INCREMENT,
	artistName VARCHAR(255) NOT NULL,
	PRIMARY KEY(artistID)
);

CREATE TABLE Songs(
	songID INT NOT NULL AUTO_INCREMENT,
	artistID INT NOT NULL,
	songName VARCHAR(255) NOT NULL,
	PRIMARY KEY(songID, artistID),
	FOREIGN KEY(artistID) REFERENCES Artist(artistID)
);

CREATE TABLE Contributor(
	contributorID INT NOT NULL AUTO_INCREMENT,
	contributorName VARCHAR(255) NOT NULL,
	contribution VARCHAR(255),
	PRIMARY KEY(contributorID)
);

CREATE TABLE ContributeTo(
	contributionID INT NOT NULL AUTO_INCREMENT,
	contributorID INT NOT NULL,
	songID INT NOT NULL,
	PRIMARY KEY(contributionID, contributorID, songID),
	FOREIGN KEY(contributorID) REFERENCES Contributor(contributorID),
	FOREIGN KEY(songID) REFERENCES Songs(songID)
);

CREATE TABLE KaraokeFile(
	karaokeID INT NOT NULL AUTO_INCREMENT,
	songID INT NOT NULL,
	songVersion VARCHAR(255) NOT NULL,
	PRIMARY KEY(karaokeID, songID),
	FOREIGN KEY(songID) REFERENCES Songs(songID)
);

CREATE TABLE FreeQueue(
	freeQueueID INT NOT NULL AUTO_INCREMENT,
	userName VARCHAR(50) NOT NULL,
	karaokeID INT NOT NULL,
	time TIME NOT NULL,
	wasPlayed BOOLEAN NOT NULL,
	PRIMARY KEY(freeQueueID),
	FOREIGN KEY (userName) REFERENCES User(userName),
	FOREIGN KEY (karaokeID) REFERENCES KaraokeFile(karaokeID)
);

CREATE TABLE PaidQueue(
	paidQueueID INT NOT NULL AUTO_INCREMENT,
	userName VARCHAR(50) NOT NULL,
	karaokeID INT NOT NULL,
	time TIME NOT NULL,
	wasPlayed BOOLEAN NOT NULL,
	price DECIMAL(5,2) NOT NULL,
	PRIMARY KEY(paidQueueID),
	FOREIGN KEY (userName) REFERENCES User(userName),
	FOREIGN KEY (karaokeID) REFERENCES KaraokeFile(karaokeID)
);