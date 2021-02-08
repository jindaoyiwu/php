CREATE TABLE `meizhou_order`
(
    `id`             int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `order_id`       bigint(20) unsigned not null default '0' comment '订单号',
    `amount_payable` varchar(10)         NOT NULL DEFAULT '' COMMENT '应付金额',
    `state`          char(10)            NOT NULL DEFAULT '' COMMENT '状态',
    `plat`           tinyint(1) unsigned NOT NULL default '0' comment '订单平台 1京东 2天猫 3拼多多 4抖音',
    `pay_time`       timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '支付时间',
    `updated_time`   timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    `created_time`   timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    PRIMARY KEY (`id`),
    key `idx_order_id` (order_id),
    key `idx_amount_payable` (amount_payable)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='平台订单表';


CREATE TABLE `meizhou_bill`
(
    `id`           int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `order_id`     bigint(20) unsigned not null default '0' comment '订单号',
    `money`        varchar(10)         NOT NULL DEFAULT '' COMMENT '金额',
    `bill_time`    timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '支付时间',
    `remark`       varchar(10)         not null default '' comment '备注',
    `updated_time` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    `created_time` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    PRIMARY KEY (`id`),
    key `idx_order_id` (order_id),
    key `idx_remark` (remark)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='账单表';

CREATE TABLE `meizhou_delivery`
(
    `id`           int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `order_id`     bigint(20) unsigned not null default '0' comment '订单号',
    `money`        varchar(10)         NOT NULL DEFAULT '' COMMENT '金额',
    `bill_time`    timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '支付时间',
    `updated_time` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    `created_time` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    PRIMARY KEY (`id`),
    key `idx_order` (order_id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='账单表';
