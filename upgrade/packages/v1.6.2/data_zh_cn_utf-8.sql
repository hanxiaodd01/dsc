INSERT INTO `dsc_ad_position` (`position_id`, `user_id`, `position_name`, `ad_width`, `ad_height`, `position_model`, `position_desc`, `position_style`, `is_public`, `theme`) VALUES (NULL, '0', '��Ʒ����ҳ�������', '990', '378', 'brandn_top_ad[num_id]', 'num_id-�������', '{foreach from=$ads item=ad}\r\n{$ad}\r\n{/foreach}', '0', 'ecmoban_dsc');

INSERT INTO `dsc_ad_position` (`position_id`, `user_id`, `position_name`, `ad_width`, `ad_height`, `position_model`, `position_desc`, `position_style`, `is_public`, `theme`) VALUES (NULL, '0', '��Ʒ�������', '198', '251', 'brandn_left_ad[num_id]', 'num_id-�������', '{foreach from=$ads item=ad}\r\n{$ad}\r\n{/foreach}', '0', 'ecmoban_dsc');

INSERT INTO `dsc_shop_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '942', 'wechat_lang', 'hidden', '0,1', '', '0', '1');