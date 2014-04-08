CREATE DATABASE IF NOT EXISTS funtack ;
USE funtack;

GRANT ALL PRIVILEGES ON funtack.* 
TO 'group12'@'localhost'
IDENTIFIED BY 'sjsugroup12';

DROP TABLE IF EXISTS users;
CREATE TABLE users (
user_id int Not NULL AUTO_INCREMENT,
first_name varchar(100) NOT NULL,
last_name varchar(100) NOT NULL,
email_id varchar(100) NOT NULL,
password MEDIUMTEXT not NULL,
admin_authority bit default 0, 
PRIMARY KEY (user_id)
);


insert into users (first_name,last_name,email_id,password, admin_authority) 
values('ling', 'zhang','ling@gmail.com','1234', 0);