DROP TABLE IF EXISTS staff;
CREATE TABLE IF NOT EXISTS staff(
`id` int(10) unsigned  NOT NULL COMMENT 'ID' AUTO_INCREMENT ,
`last_name` varchar(50)  NOT NULL COMMENT '性' ,
`first_name` varchar(50)  NOT NULL COMMENT '名' ,
`last_furigana` varchar(50)  COMMENT 'フリガナ(性)' ,
`first_furigana` varchar(50)  COMMENT 'フリガナ(名)' ,
`mail` varchar(50)  COMMENT 'メールアドレス' ,
`post_id` tinyint  NOT NULL COMMENT '部署ID' ,
`position_id` tinyint  NOT NULL COMMENT '役職ID' ,
`authority_id` tinyint  NOT NULL COMMENT '権限ID' ,
`work_status_id` tinyint  COMMENT '勤務状態ID' ,
`join_date` datetime  NOT NULL COMMENT '入社日' ,
`redmine_status` boolean  NOT NULL COMMENT 'Redmine登録状態' ,
`all_mail_status` boolean  NOT NULL COMMENT '全体メール登録状態' ,
`yammer_status` boolean  NOT NULL COMMENT 'yammer登録状態' ,
`sign_status_id` tinyint  NOT NULL COMMENT '各種登録状態' ,
`login_id` varchar(50)  NOT NULL COMMENT 'ログインID' ,
`password` varchar(50)  NOT NULL COMMENT 'PassWord' ,
`create_date` datetime  COMMENT '登録日' ,
`update_date` datetime  COMMENT '更新日' ,
PRIMARY KEY(`id`)
, UNIQUE INDEX(`login_id`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;