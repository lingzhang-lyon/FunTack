DROP DATABASE IF EXISTS funtack;
CREATE DATABASE funtack ;
USE funtack;

GRANT ALL PRIVILEGES ON funtack.* 
TO 'group12'@'localhost'
IDENTIFIED BY 'sjsugroup12';

DROP TABLE IF EXISTS users;
CREATE TABLE users (
user_id int Not NULL AUTO_INCREMENT,
first_name varchar(100) NOT NULL,
last_name varchar(100) NOT NULL,
email_id varchar(100) NOT NULL, -- may need to set uique later
password MEDIUMTEXT not NULL,
admin_authority bit default 0, 
PRIMARY KEY (user_id)
);


insert into users (first_name,last_name,email_id,password, admin_authority) values
('ling', 'zhang','ling@gmail.com','1234', 0),
('lingran', 'liu','lingran@gmail.com','1234', 0);


DROP TABLE IF EXISTS tacks;
CREATE TABLE tacks (
tack_id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
path varchar(255) ,
url varchar(255) ,
no_of_retacks int,
no_of_favorites int,
FOREIGN KEY (user_id) REFERENCES users(user_id)
  ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY (tack_id)
);

insert into tacks (user_id, url ) 
values( 1, 'http://1hdwallpapers.com/wallpapers/future_technology.jpg'),
(1,'http://rack.2.mshcdn.com/media/ZgkyMDE0LzAzLzE4LzY2L2NibnNwcmRzaHQxLjdhODAyLmpwZwpwCXRodW1iCTEyMDB4OTYwMD4/8a821d72/1d1/cbnsprdsht1.jpg'),
(1, 'http://www.designboom.com/wp-content/uploads/2013/10/three-dogs-wild-bounty-flagship-store-designboom02.jpg'),
(1, 'http://media-cache-ak0.pinimg.com/originals/13/c4/37/13c43740d9281db040945bb709d4ed5c.jpg');


DROP TABLE IF EXISTS boards;
CREATE TABLE boards (
board_id int NOT NULL AUTO_INCREMENT,
category_id int NOT NULL,
user_id int NOT NULL,
name varchar(100) NOT NULL,
description varchar(255),
created_date timestamp NOT NULL,
no_of_tacks int,
privacy bit default 0,
FOREIGN KEY (user_id) REFERENCES users (user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY (board_id)
);

insert into boards (category_id, user_id, name,description,created_date, privacy)
values (1, 1, 'MyTech', 'my technology collection','2014-04-09 00:00:01', 0);

-- this table is neccessary because tack may belong to diff boards
DROP TABLE IF EXISTS board_tacks;
CREATE TABLE board_tacks (
id int NOT NULL AUTO_INCREMENT,
board_id int NOT NULL,
tack_id int NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (board_id) REFERENCES boards(board_id),
FOREIGN KEY (tack_id) REFERENCES tacks(tack_id)
);

insert into board_tacks (board_id, tack_id) values (1,1);
insert into board_tacks (board_id, tack_id) values (1,2),(1,3),(1,4);
	

DROP TABLE IF EXISTS user_follow_boards;
CREATE TABLE user_follow_boards (
id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
board_id int NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (board_id) REFERENCES boards(board_id),
FOREIGN KEY (user_id) REFERENCES users(user_id)
);

insert into user_follow_boards (user_id, board_id) values (2,1);


	
