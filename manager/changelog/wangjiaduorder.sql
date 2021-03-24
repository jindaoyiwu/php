drop table meizhou_order;
CREATE TABLE `meizhou_order`
(
    `id`             int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `order_id`       bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '订单号',
    `amount_payable` varchar(10)         NOT NULL DEFAULT '' COMMENT '应付金额',
    `state`          char(10)            NOT NULL DEFAULT '' COMMENT '状态',
    `plat`           tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单平台 1京东 2天猫 3拼多多 4抖音',
    `pay_time`       char(25)            NOT NULL DEFAULT '' COMMENT '支付时间',
    `order_time`     char(25)            NOT NULL DEFAULT '' COMMENT '下单时间',
    `account_time`       bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '对账月份',
    `updated_time`   timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    KEY `idx_order_id` (`order_id`),
    KEY `idx_amount_payable` (`amount_payable`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='平台订单表';

drop table meizhou_bill;
CREATE TABLE `meizhou_bill`
(
    `id`           int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `order_id`     bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '订单号',
    `money`        varchar(10)         NOT NULL DEFAULT '' COMMENT '金额',
    `remark`       varchar(10)         NOT NULL DEFAULT '' COMMENT '备注',
    `plat`           tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单平台 1京东 2天猫 3拼多多 4抖音',
    `account_time`       bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '对账月份',
    `updated_time` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    KEY `idx_order_id` (`order_id`),
    KEY `idx_remark` (`remark`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='账单表';
drop table meizhou_delivery;
CREATE TABLE `meizhou_delivery`
(
    `id`           int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `order_id`     bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '订单号',
    `money`        varchar(10)         NOT NULL DEFAULT '' COMMENT '订单支付金额',
    `plat`           tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单平台 1京东 2天猫 3拼多多 4抖音',
    `account_time`       bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '对账月份',
    `updated_time` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    KEY `idx_order` (`order_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='发货表';
drop table meizhou_order_arrange;
CREATE TABLE `meizhou_order_arrange`
(
    `id`             int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `order_id`       bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '订单号',
    `amount_payable` varchar(10)         NOT NULL DEFAULT '' COMMENT '应付金额',
    `state`          char(10)            NOT NULL DEFAULT '' COMMENT '状态',
    `plat`           tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单平台 1京东 2天猫 3拼多多 4抖音',
    `pay_time`       char(25)            NOT NULL DEFAULT '' COMMENT '支付时间',
    `order_time`     char(25)            NOT NULL DEFAULT '' COMMENT '下单时间',
    `account_time`       bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '对账月份',
    `updated_time`   timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    KEY `idx_order_id` (`order_id`),
    KEY `idx_amount_payable` (`amount_payable`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='平台订单整理表';
drop table meizhou_indemnity;
CREATE TABLE `meizhou_indemnity`
(
    `id`           int(11) unsigned    NOT NULL AUTO_INCREMENT COMMENT '主键',
    `order_id`     bigint(20) unsigned not null default '0' comment '订单号',
    `money`        varchar(10)         NOT NULL DEFAULT '' COMMENT '赔付金额',
    `plat`           tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单平台 1京东 2天猫 3拼多多 4抖音',
    `account_time`       bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '对账月份',
    `updated_time` timestamp           NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    key `idx_order` (order_id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='赔付表';
select meizhou_order_arrange.order_id from meizhou_order_arrange
                                               left join meizhou_bill on meizhou_bill.order_id = meizhou_order_arrange.order_id
                                               left join meizhou_delivery on meizhou_delivery.order_id = meizhou_order_arrange.order_id;
