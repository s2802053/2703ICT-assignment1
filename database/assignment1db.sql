/* Create Post and Comment tables */

CREATE TABLE post (
	id INTEGER PRIMARY KEY,
	title VARCHAR(50) NOT NULL,
    author INTEGER NOT NULL REFERENCES user(id),
	message TEXT,
	timestamp DATE NOT NULL,
    iconLink VARCHAR(80) NOT NULL
);

CREATE TABLE comment (
	id INTEGER PRIMARY KEY,
	author VARCHAR(50) NOT NULL,
	message VARCHAR(200) NOT NULL,
	post_id INTEGER NOT NULL REFERENCES post(id)
);

CREATE TABLE user (
	id INTEGER PRIMARY KEY,
	name VARCHAR(20) UNIQUE NOT NULL
);

/* Insert dummy data for testing 

Posts: */

INSERT INTO User(name)
	VALUES
	("joe burton");

INSERT INTO User(name)
	VALUES
	("steve smith");

INSERT INTO Post(title, author, message, timestamp, iconLink)
	VALUES 
	("Test post title #1", 1, "Hello World, this is the message of test post #1", "2019-08-21", "placeholder-link");

INSERT INTO Post(title, author, message, timestamp, iconLink)
	VALUES 
	("Test post title #2", 1, "This is the message of test post #2", "2019-08-21", "placeholder-link");

INSERT INTO Post(title, author, message, timestamp, iconLink)
	VALUES 
	("Test post title #3", 1, "This is the message of text post #3", "2019-08-21", "placeholder-link");

/* Comments: */
INSERT INTO Comment(author, message, post_id)
	VALUES 
	(2, "A comment message on post 1", 1);

INSERT INTO Comment(author, message, post_id)
	VALUES 
	(2, "Another comment message on post 1", 1);

INSERT INTO Comment(author, message, post_id)
	VALUES 
	(2, "A comment message on post 2", 2);

INSERT INTO Comment(author, message, post_id)
	VALUES 
	(2, "Another comment message on post 2", 2);

INSERT INTO Comment(author, message, post_id)
	VALUES 
	(2, "A comment message on post 3", 3);

INSERT INTO Comment(author, message, post_id)
	VALUES 
	(2, "Another comment message on post 3", 3);