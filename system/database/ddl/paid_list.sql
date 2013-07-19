DROP TABLE IF EXISTS paid_list;
CREATE TABLE IF NOT EXISTS paid_list(
`id` int(10) unsigned  NOT NULL COMMENT 'id' AUTO_INCREMENT ,
`staff_id` int(10) unsigned  NOT NULL COMMENT '社員ID' ,
`start_date` datetime  NOT NULL COMMENT '有給取得開始日' ,
`end_date` datetime  COMMENT '有給取得終了日' ,
`reason` varchar(255)  COMMENT '取得理由' ,
`status` tinyint  NOT NULL DEFAULT '0' COMMENT '状態' ,
`create_date` datetime  COMMENT '登録日' ,
`update_date` datetime  COMMENT '更新日' ,
PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;