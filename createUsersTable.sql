USE wp_eatery;

CREATE TABLE adminusers(
	adminID int not null AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL,
    lastlogin DATE,
	PRIMARY KEY (adminID)
	);

INSERT INTO adminusers (username,password)
   VALUES ('admin','passme');