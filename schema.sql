CREATE TABLE User (`id` int AUTO_INCREMENT PRIMARY KEY, `firstname` varchar(25), `lastname` varchar(25), `username` varchar(25), `salt` int, `hash` varchar(255));

CREATE TABLE Message (`id` int AUTO_INCREMENT PRIMARY KEY, `recipient_ids` varchar(100), `user_id` int, `subject` varchar(55), `body` varchar(255), `date_sent` date);

CREATE TABLE Message_read (`id` int AUTO_INCREMENT PRIMARY KEY, `recipient_ids` varchar(100), `user_id` int, `subject` varchar(55), `body` varchar(255), `date_sent` date);
	
    ###
    
INSERT INTO User (firstname, lastname, username, password)
VALUES
	('Lil', 'Bill', 'lilbill', 'pass'),
	('Agent', 'Smith', 'asmith', 'pass')
;
