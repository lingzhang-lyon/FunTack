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
user_id int NOT NULL,  -- tack creator,  but tacks could be take to other's  board. -- retack 
website_url varchar(255) ,
picture_url varchar(255) ,
description varchar(255),
no_of_retacks int,
no_of_favorites int,
FOREIGN KEY (user_id) REFERENCES users(user_id)
  ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY (tack_id)
);

insert into tacks (user_id, website_url, picture_url, description ) values
(1, 'http://1hdwallpapers.com/future_technology-wallpaper.html', 
	'http://1hdwallpapers.com/wallpapers/future_technology.jpg', 'A great wall paper website'),
(1,'http://www.technews24h.com/2013/10/where-is-technology-heading.html',
	'http://2.bp.blogspot.com/-iLHXJHBe1J0/UlvTybIPo7I/AAAAAAAASXo/yEgUK_8xxJY/s1600/Where+Is+Technology+Heading.jpg', 'Where is technology heading?'),
(1, 'http://www.cautaro.com/how-to-pick-right-bedroom-wardrobe-design.html',
	'http://www.cautaro.com/wp-content/uploads/2014/03/modern-bedroom-design.jpg','how to pick right bedroom design'),
(1, 'https://scifiinterfaces.wordpress.com/tag/inhumantechnology/',
	'https://scifiinterfaces.files.wordpress.com/2012/11/prometheus-223.png','Alien VPs'),
(2, 'http://jeffbeckley.wordpress.com/tag/sleep-texting/', 
	'http://jeffbeckley.files.wordpress.com/2014/04/social_media-technology-wallpapers.jpg','Sleep Texting'),
(2, 'http://www.voila60sloan.com/beauty-blog/',
	'http://www.voila60sloan.com/wp-content/uploads/2014/01/beauty1.jpg','Beauty blog');

DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
id int NOT NULL AUTO_INCREMENT,
name varchar(100) NOT NULL,
PRIMARY KEY (id)
);

insert into categories (name) values ("Beauty"), ("Food"),("Pet"), ("Technology"), ("Sports"),( "Travel"), ("Education"), ("Plants");

DROP TABLE IF EXISTS boards;
CREATE TABLE boards (
board_id int NOT NULL AUTO_INCREMENT,
category_id int NOT NULL,
user_id int NOT NULL,
name varchar(100) NOT NULL,
description varchar(255),
created_date timestamp NOT NULL,
no_of_tacks int,
privacy bit default 0,  -- 0, public, 1, private
FOREIGN KEY (user_id) REFERENCES users (user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (category_id) REFERENCES categories (id)
	ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY (board_id)
);

insert into boards (category_id, user_id, name,description,created_date, privacy) values
 (4, 1, 'MyTech', 'my technology collection','2014-04-09 00:00:01', 0),
 (1, 2, 'Beauty', 'my beauty collection','2014-04-09 00:00:01', 0);

-- this table is neccessary because tack may belong to diff boards
DROP TABLE IF EXISTS board_tacks;
CREATE TABLE board_tacks (
id int NOT NULL AUTO_INCREMENT,
board_id int NOT NULL,
tack_id int NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (board_id) REFERENCES boards(board_id)
  ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (tack_id) REFERENCES tacks(tack_id)
  ON DELETE CASCADE ON UPDATE CASCADE
);

insert into board_tacks (board_id, tack_id) values (1,1);
insert into board_tacks (board_id, tack_id) values (1,2),(1,3),(1,4);
insert into board_tacks (board_id, tack_id) values (2,5),(2,6);	
	

DROP TABLE IF EXISTS user_follow_boards;
CREATE TABLE user_follow_boards (
id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
board_id int NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (board_id) REFERENCES boards(board_id)
ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (user_id) REFERENCES users(user_id)
ON DELETE CASCADE ON UPDATE CASCADE
);

insert into user_follow_boards (user_id, board_id) values (2,1), (1,2);


	
DROP TABLE IF EXISTS user_favorite_tacks;
CREATE TABLE user_favorite_tacks (
id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
tack_id int NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (tack_id) REFERENCES tacks(tack_id)
ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (user_id) REFERENCES users(user_id)
ON DELETE CASCADE ON UPDATE CASCADE
);

insert into user_favorite_tacks (user_id,tack_id) values (1,5),(1,6),(1,1);
	
