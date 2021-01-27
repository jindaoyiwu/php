CREATE TABLE `quarterly_declaration`
(
    `id`                        int(10) unsigned NOT NULL AUTO_INCREMENT,
    `region`                    varchar(30)      NOT NULL DEFAULT '' COMMENT '法人',
    `company`                   varchar(50)      NOT NULL DEFAULT '' COMMENT '公司名称',
    `cellphone`                 varchar(30)      NOT NULL DEFAULT '' COMMENT '手机',
    `id_number`                 varchar(40)      NOT NULL DEFAULT '' COMMENT '身份证号',
    `duty_paragraph`            varchar(50)      NOT NULL DEFAULT '' COMMENT '税号',
    `duty_password`             varchar(100)     NOT NULL DEFAULT '' COMMENT '密码',
    `remark`                    varchar(200)     NOT NULL DEFAULT '' COMMENT '备注',
    `value_added_tax`           varchar(100)     NOT NULL DEFAULT '' COMMENT '增值税、附加税',
    `corporate_income_tax`      varchar(100)     NOT NULL DEFAULT '' COMMENT '企业所得税',
    `cultural_construction_tax` varchar(100)     NOT NULL DEFAULT '' COMMENT '文化建设税',
    `stamp_duty`                varchar(100)     NOT NULL DEFAULT '' COMMENT '印花税',
    `labour_union`              varchar(100)     NOT NULL DEFAULT '' COMMENT '工会',
    `statements`                varchar(100)     NOT NULL DEFAULT '' COMMENT '财务报表',
    `annual_report`             varchar(100)     NOT NULL DEFAULT '' COMMENT '年报',
    `year`                      mediumint(6)     NOT NULL DEFAULT '0' COMMENT '年份',
    `duty_quarter`              tinyint(1)       NOT NULL DEFAULT '0' COMMENT '季度 1季度 2季度 3季度 4季度',
    `is_deleted`                tinyint(1)       NOT NULL DEFAULT '1' COMMENT '0删除 1正常',
    `updated_time`              timestamp        NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    `created_time`              timestamp        NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='季度申报';
