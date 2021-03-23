create table kvstore(
    `id`           int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `module`     varchar(20)         NOT NULL DEFAULT '' COMMENT '模块',
    `keys`        varchar(30)         NOT NULL DEFAULT '' COMMENT '键',
    `value`       text    NOT NULL  COMMENT '值',
    `updated_at` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    `created_at` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='kv存储表';


create table images(
    `id` int(11) unsigned not null auto_increment comment '主键',
    `path`        varchar(50)         NOT NULL DEFAULT '' COMMENT '路径',
    `description`       varchar(100)   NOT NULL  COMMENT '描述',
    `updated_at` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    `created_at` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COMMENT ='图片上传表';
