CREATE TABLE IF NOT EXISTS `dsc_seckill` (
  `sec_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '��ɱ�����ID',
  `acti_title` varchar(50) NOT NULL COMMENT '��ɱ�����',
  `acti_goods` varchar(255) NOT NULL COMMENT '���ƷID �۸� ����',
  `is_putaway` tinyint(1) NOT NULL DEFAULT '1' COMMENT '���¼�',
  `begin_time` int(11) NOT NULL COMMENT '��ɱ���ʼʱ��',
  `end_time` int(11) NOT NULL COMMENT '��ɱ�����ʱ��',
  `add_time` int(11) NOT NULL COMMENT '��ɱ����ʱ��',
  PRIMARY KEY (`sec_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `dsc_seckill_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sec_id` int(10) NOT NULL,
  `goods_id` int(10) NOT NULL,
  `sec_price` decimal(10,2) NOT NULL,
  `sec_num` smallint(5) NOT NULL,
  `sec_limit` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `dsc_ad` ADD  `ad_bg_code` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER  `ad_code`;

ALTER TABLE `dsc_ad` ADD  `b_title` VARCHAR( 60 ) NOT NULL AFTER  `link_color` , ADD  `s_title` VARCHAR( 60 ) NOT NULL AFTER  `b_title`;

ALTER TABLE `dsc_template` ADD  `floor_tpl` SMALLINT( 5 ) NOT NULL DEFAULT  '0' COMMENT  '��ҳ¥��ģ��';

ALTER TABLE `dsc_brand` ADD  `index_img` VARCHAR( 80 ) NOT NULL AFTER  `brand_logo`;

ALTER TABLE `dsc_category` ADD  `style_icon` VARCHAR( 50 ) NOT NULL DEFAULT  'other' AFTER  `top_style_tpl`;

ALTER TABLE `dsc_seller_shopinfo` CHANGE `templates_mode` `templates_mode` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT '1';

ALTER TABLE `dsc_goods_activity` ADD `is_new` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `review_content` ;

ALTER TABLE `dsc_merchants_grade` CHANGE `ru_id` `ru_id` INT( 10 ) UNSIGNED NOT NULL DEFAULT '0',
CHANGE `grade_id` `grade_id` INT( 10 ) UNSIGNED NOT NULL DEFAULT '0';

ALTER TABLE `dsc_merchants_grade` CHANGE `ru_id` `ru_id` MEDIUMINT( 10 ) UNSIGNED NOT NULL DEFAULT '0';

ALTER TABLE  `dsc_seckill_goods` ADD  `tb_id` INT( 10 ) NOT NULL COMMENT  '��ɱʱ��ID' AFTER  `sec_id`;

ALTER TABLE  `dsc_seckill` ADD  `acti_time` INT( 11 ) NOT NULL COMMENT  '��ɱ�����' AFTER  `is_putaway`;

ALTER TABLE  `dsc_seckill` DROP  `begin_time` ;

ALTER TABLE  `dsc_seckill` DROP  `end_time` ;

ALTER TABLE  `dsc_seckill` DROP  `acti_goods`;

CREATE TABLE IF NOT EXISTS `dsc_seckill_time_bucket` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `begin_time` time NOT NULL COMMENT '��ʼʱ���',
  `end_time` time NOT NULL COMMENT '����ʱ���',
  `title` varchar(50) NOT NULL COMMENT '��ɱʱ�α���',
  PRIMARY KEY (`id`),
  UNIQUE KEY `begin_time` (`begin_time`,`end_time`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;