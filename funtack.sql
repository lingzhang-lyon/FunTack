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
(1, 'http://iliketowastemytime.com/', 
	'http://iliketowastemytime.com/sites/default/files/imagecache/blog_image/space-map-hd-wallpaper_1.jpg', 'A great wall paper website'),
(1,'https://login.touricoholidays.com/',
	'https://login.touricoholidays.com/wp-content/uploads/2012/10/technologyContact.jpg', 'Where is technology heading?'),
(1, 'http://freshome.com/',
	'http://cdn.freshome.com/wp-content/uploads/2009/08/Girls-Bedroom-Design-Ideas-by-Pm4-3.jpg','how to pick right bedroom design'),
(1, 'http://www.asianfortunenews.com/category/travel/',
	'http://www.asianfortunenews.com/wp-content/uploads/2014/01/126.jpg','Looking to plan a trip for your vacation?'),
(2, 'http://www.10tv.com/content/stories/2011/11/07/columbus-texting-while-sleeping.html', 
	'http://www.10tv.com/content/graphics/2011/11/07/image_sleep_texting.png','Sleep Texting'),
(2, 'http://www.escentual.com/blog/2012/12/07/binky-felsteads-beauty-blog-camera-perfect/',
	'http://www.escentual.com/blog/wp-content/uploads/2012/12/Party-Perfect.png','Beauty blog');



DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
id int NOT NULL AUTO_INCREMENT,
name varchar(100) NOT NULL,
PRIMARY KEY (id)
);

insert into categories (id,name) values (1,"Beauty"), (2,"Food"),(3,"Pet"), (4,"Technology"), (5,"Sports"),( 6,"Travel"), (7,"Education"), (8,"Plants");

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
	
