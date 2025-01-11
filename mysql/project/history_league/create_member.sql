CREATE TABLE member
(
	member_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (member_id),
	last_name VARCHAR(15) NOT NULL,
	first_name VARCHAR(15) NOT NULL,
	suffix VARCHAR(5) NULL,
	expiration DATE NULL,
	email VARCHAR(50) NULL,
	street VARCHAR(50) NULL,
	city VARCHAR(50) NULL,
	state VARCHAR(3) NULL,
	zip VARCHAR(20) NULL,
	phone VARCHAR(20) NULL,
	interests VARCHAR(255) NULL
);

