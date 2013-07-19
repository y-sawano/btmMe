
DROP TABLE IF EXISTS m_general;
CREATE TABLE IF NOT EXISTS m_general(
`general_id` int(10) unsigned  NOT NULL COMMENT 'ID' AUTO_INCREMENT ,
`kind` int(10) unsigned  NOT NULL COMMENT '種別' ,
`kind_name` varchar(255)  COMMENT '種別名称' ,
`value` varchar(255)  COMMENT '値' ,
`create_date` datetime  COMMENT '登録日' ,
`update_date` datetime  COMMENT '更新日' ,
PRIMARY KEY(`general_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
