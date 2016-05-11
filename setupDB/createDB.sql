/*DROP DATABASE forum;*/
/*CREATE DATABASE myForum;*/

USE comp153612;

CREATE TABLE topic (
  id INTEGER NOT NULL auto_increment,
  userId INTEGER NOT NULL,
  topic varchar(255) default '' NOT NULL ,
  content longtext NOT NULL,
  datetime varchar(25) NOT NULL default '',
  PRIMARY KEY (id),
  FOREIGN KEY (userId) REFERENCES account(id) ON DELETE CASCADE
) ENGINE=MyISAM;

CREATE TABLE reply (
  id INTEGER NOT NULL auto_increment,
  topicId INTEGER NOT NULL,
  userId INTEGER NOT NULL,
  content longtext NOT NULL,
  datetime varchar(25) NOT NULL default '',
  PRIMARY KEY (id),
  FOREIGN KEY (topicId) REFERENCES topic(id) ON DELETE CASCADE,
  FOREIGN KEY (userId) REFERENCES account(id) ON DELETE CASCADE
) ENGINE=MyISAM;

CREATE TABLE account (
  id INTEGER unsigned NOT NULL auto_increment,
  userName varchar(100) NOT NULL default '' UNIQUE,
  passwd varchar(32) NOT NULL default '',
  email varchar(32) NOT NULL default '' UNIQUE,
  PRIMARY KEY (id)
) ENGINE=MyISAM;

