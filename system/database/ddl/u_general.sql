DROP TABLE IF EXISTS u_general;
CREATE TABLE IF NOT EXISTS u_general(
`id` int(10) unsigned  NOT NULL COMMENT 'id' AUTO_INCREMENT ,
`general_id` int(10) unsigned  NOT NULL COMMENT '汎用ID' ,
PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
