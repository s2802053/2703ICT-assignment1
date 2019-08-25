/* Create Post and Comment tables */

CREATE TABLE post (
	Id INTEGER PRIMARY KEY,
	Title VARCHAR(50) NOT NULL,
    Author VARCHAR(50),
	Message TEXT,
	PostTimestamp DATE NOT NULL,
    Icon_link VARCHAR(80) NOT NULL
);

CREATE TABLE comment (
	Id INTEGER PRIMARY KEY,
	Author VARCHAR(50) NOT NULL,
	Message VARCHAR(200) NOT NULL,
	Post_id INTEGER NOT NULL REFERENCES Post(Id)
);

/* Insert dummy data for testing 

Posts: */

INSERT INTO Post(Title, Author, Message, PostTimestamp, Icon_link)
	VALUES 
	("Test post title #1", "Joe Burton", "Hello World, this is the message of test post #1", "2019-08-21", "placeholder-link");

INSERT INTO Post(Title, Author, Message, PostTimestamp, Icon_link)
	VALUES 
	("Test post title #2", "Joe Burton", "This is the message of test post #2", "2019-08-21", "placeholder-link");

INSERT INTO Post(Title, Author, Message, PostTimestamp, Icon_link)
	VALUES 
	("Test post title #3", "Joe Burton", "This is the message of text post #3", "2019-08-21", "placeholder-link");

/* Comments: */
INSERT INTO Comment(Author, Message, Post_id)
	VALUES 
	("Steve Smith", "A comment message on post 1", 1);

INSERT INTO Comment(Author, Message, Post_id)
	VALUES 
	("Steve Smith", "Another comment message on post 1", 1);

INSERT INTO Comment(Author, Message, Post_id)
	VALUES 
	("Steve Smith", "A comment message on post 2", 2);

INSERT INTO Comment(Author, Message, Post_id)
	VALUES 
	("Steve Smith", "Another comment message on post 2", 2);

INSERT INTO Comment(Author, Message, Post_id)
	VALUES 
	("Steve Smith", "A comment message on post 3", 3);

INSERT INTO Comment(Author, Message, Post_id)
	VALUES 
	("Steve Smith", "Another comment message on post 3", 3);