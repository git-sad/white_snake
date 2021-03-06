CREATE DATABASE db_blog;
CREATE USER '****'@'localhost' IDENTIFIED BY '****';
GRANT ALL PRIVILEGES ON db_blog.* TO '****'@'localhost';
FLUSH PRIVILEGES;

USE db_blog;

CREATE TABLE config (
cf_id INT PRIMARY KEY AUTO_INCREMENT, 
cf_key VARCHAR(256) NOT NULL, 
cf_value TEXT NOT NULL 
);
ALTER TABLE config AUTO_INCREMENT = 1;

CREATE TABLE config (
cf_id INT PRIMARY KEY AUTO_INCREMENT, 
cf_key VARCHAR(256) NOT NULL, 
cf_value TEXT NOT NULL 
);
ALTER TABLE config AUTO_INCREMENT = 1;

CREATE TABLE log_access (
la_id INT PRIMARY KEY AUTO_INCREMENT, 
la_ip VARCHAR(256) NOT NULL, 
la_host_name VARCHAR(256) NOT NULL, 
la_port INT NOT NULL, 
la_user_agent VARCHAR(512) NOT NULL, 
la_referrer TEXT NOT NULL, 
la_request_uri TEXT NOT NULL, 
la_session_id VARCHAR(256) NOT NULL, 
la_regdate DATETIME NOT NULL 
);
ALTER TABLE log_access AUTO_INCREMENT = 1;

CREATE TABLE article (
ac_id INT PRIMARY KEY AUTO_INCREMENT, 
ac_title TEXT NOT NULL, 
ac_content TEXT NOT NULL, 
ac_info VARCHAR(256) NOT NULL, 
ac_tag TEXT NOT NULL, 
ac_display BOOLEAN NOT NULL DEFAULT FALSE, 
ac_regdate DATETIME NOT NULL, 
ac_moddate DATETIME NOT NULL 
);
ALTER TABLE article AUTO_INCREMENT = 1;

CREATE TABLE comment (
cm_id INT PRIMARY KEY AUTO_INCREMENT, 
cm_article_id INT NOT NULL, 
cm_content TEXT NOT NULL, 
cm_name TEXT NOT NULL, 
cm_log_access_id INT NOT NULL, 
cm_display BOOLEAN NOT NULL DEFAULT FALSE, 
cm_regdate DATETIME NOT NULL, 
cm_moddate DATETIME NOT NULL 
);
ALTER TABLE comment AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
`id` varchar(40) NOT NULL,
`ip_address` varchar(45) NOT NULL,
`timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
`data` blob NOT NULL,
PRIMARY KEY (id),
KEY `ci_sessions_timestamp` (`timestamp`)
);
ALTER TABLE ci_sessions ADD CONSTRAINT ci_sessions_id_ip UNIQUE (id, ip_address);
