INSERT INTO `dsc_admin_action` (`parent_id`, `action_code`, `relevance`) VALUES ('6', 'order_os_remove', '');

INSERT INTO `dsc_shop_config` (`parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES ('942', 'server_model', 'hidden', '0,1', '', '0', '1');

INSERT INTO `dsc_admin_action` (`parent_id`,`action_code`, `relevance`) VALUES ('0',  'zc_manage',  '');

INSERT INTO `dsc_admin_action` (`parent_id`, `action_code`, `relevance`) VALUES ('233',  'zc_project_manage',  ''), 
('233',  'zc_category_manage',  ''), 
('233',  'zc_initiator_manage',  ''), 
('233',  'zc_topic_manage',  '');

INSERT INTO `dsc_shop_config` (`parent_id` , `code` , `type` , `value` , `sort_order` ) VALUES ('942', 'grade_apply_time', 'text', '3', 2);

INSERT INTO `dsc_shop_config` (`parent_id` , `code` , `type` , `store_range` , `value` , `sort_order` ) VALUES ('942', 'apply_options', 'options', '1,2', '1', 3);

INSERT INTO `dsc_mail_templates` (`template_code` , `is_html` , `template_subject` , `template_content` , `type` ) VALUES ('merchants_allpy_grade', 1, '�̼ҵ�������', '�װ���{$grade.shop_name}����ã�</br></br>������������{$grade.grade_name}���������Ѿ�����鿴�˶ԣ���л�����ǵ����Ρ��������ǵ����濼������{$grade.confirm}��������</br>{$grade.merchants_message}</br>{$send_date}', 'template');

INSERT INTO `dsc_admin_action`(`parent_id`, `action_code`) VALUES ('136','seller_grade');

INSERT INTO `dsc_admin_action`(`parent_id`, `action_code`) VALUES ('136','seller_apply');

UPDATE  `dsc_shop_config` SET TYPE =  'hidden' WHERE code =  'anonymous_buy';

INSERT INTO `dsc_admin_action` (`parent_id` ,`action_code` ,`relevance`) VALUES ('7',  'coupons_manage',  '');

INSERT INTO `dsc_shop_config` (`parent_id`, `code`,`type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES ('942',  'category_load_type',  'select',  '0,1',  '',  '0',  '1');

INSERT INTO `dsc_admin_action` (`parent_id`, `action_code`, `relevance`) VALUES ('3', 'users_real_manage', '');

INSERT INTO `dsc_ad_position` (`position_id`, `user_id`, `position_name`, `ad_width`, `ad_height`, `position_model`, `position_desc`, `position_style`, `is_public`, `theme`) VALUES
(NULL, 0, '�Ż�ȯ��ҳ�ֲ�ͼ���', 1200, 300, 'coupons_index[num_id]', 'num_id-�������', '{foreach from=$ads item=ad}\r\n{$ad}\r\n{/foreach}', 0, 'ecmoban_dsc');

INSERT INTO `dsc_ad_position` (`position_id`, `user_id`, `position_name`, `ad_width`, `ad_height`, `position_model`, `position_desc`, `position_style`, `is_public`, `theme`) VALUES
(NULL, 0, '�ڳ���ҳ�ֲ�ͼ', 1200, 380, 'zc_index_banner[num_id]', 'num_id-�������', '<table cellpadding="0" cellspacing="0">\n{foreach from=$ads item=ad}\n<tr><td>{$ad}</td></tr>\n{/foreach}\n</table>', 0, 'ecmoban_dsc');

INSERT INTO `dsc_zc_category` (`cat_id`, `cat_name`, `cat_desc`, `parent_id`, `sort_order`, `is_show`) VALUES
(5, 'δ���Ƽ�', '', 0, 1, 1),
(6, '���뱦��', '', 5, 50, 1),
(7, '�Ӽ�����', '', 5, 50, 1),
(8, '��������', '', 0, 2, 1),
(9, '��������', '', 8, 50, 1),
(10, '���д���', '', 8, 50, 1),
(13, '������ѧ', '', 0, 4, 1),
(12, '��ʳ����', '', 0, 3, 1),
(14, 'ԭ�����', '', 13, 1, 1),
(15, '��Ʒ�Ҿ�', '', 13, 2, 1),
(16, '�ر���ʳ', '', 12, 1, 1),
(17, '���Ծ���', '', 12, 50, 1);

INSERT INTO `dsc_zc_goods` (`id`, `pid`, `limit`, `backer_num`, `price`, `shipping_fee`, `content`, `img`, `return_time`, `backer_list`) VALUES
(1, 4, 3, 1, '3000', '0', 'һ���豸', 'data/zc_product_images/1469556603531857837.jpg', 30, '188'),
(2, 4, 100, 0, '7000', '0', '�����豸', 'data/zc_product_images/1469559521962750229.jpg', 30, NULL),
(3, 5, -1, 0, '1', '0', 'ÿ��150λ֧���߳�ȡ1λ�����û���������ʱҲ��ȡ1λ�������û������ü����޿���1���������û����ɾ����ٷ���ȡ���齱�����н����������ڻ�����������', 'data/zc_product_images/1469561890900373306.jpg', 30, NULL),
(4, 5, 300, 0, '259', '0', '��л����֧�֣������ü����޶๦��������������׵ļ��������������1����', 'data/zc_product_images/1469561945839544961.jpg', 30, NULL),
(5, 6, -1, 0, '1', '0', '��ϲ��������ר��ۻ�ã�Я�������+Я��������20��+�г���58Ԫ�Ĳ�����20�ݡ����ܷ����ϲ�ã���л���㣬������Ӷ�ʡ�', 'data/zc_product_images/1469562170500027679.jpg', 30, NULL),
(6, 6, 50, 0, '998', '0', '��ϲ�����ڳ��׷��ۻ�ã�Я�������һ�ף�����Ϊ����ľ�����ղ�֤�飩��������ô�󣬴�����ȥԶ������һ����һ���������ζ��������ɽ��������֮�������ӣ�������֮�������ӣ������֮�С����ﱣ֮����Ի������', 'data/zc_product_images/1469562217924344186.jpg', 30, NULL),
(7, 7, -1, 0, '50', '0', '�ɻ�ó¸�Ϣ�ŷ������ĺ�ɽ������Ǭ¡��180g��2ƿ�� Ǭ¡������װ90g��1ƿ', 'data/zc_product_images/1469562479289457048.jpg', 10, NULL),
(8, 7, 100, 0, '100', '0', '�ɻ�ó¸�Ϣ�ŷ������ĺ�ɽ������Ǭ¡��180g��4ƿ�� �ֶ�����������װ180g ��2ƿ', 'data/zc_product_images/1469562499927290649.jpg', 10, NULL),
(9, 8, -1, 0, '1', '0', 'ÿ��99λ֧���߳�ȡ1λ�����û���������ʱҲ��ȡ1λ�������û������÷��п����1�ף�1�޺��+1�����飩�������û����ɾ����ٷ���ȡ���齱�����н����������ڻ�����������', 'data/zc_product_images/1469562874103382555.jpg', 30, NULL),
(10, 8, 2000, 0, '99', '0', '���п����1�ף�1�޺��+1�����飩', 'data/zc_product_images/1469562897477245574.jpg', 30, NULL),
(11, 9, -1, 0, '1', '0', 'ÿ��700λ֧���߳�ȡ1λ�����û���������ʱҲ��ȡ1λ�������û������÷������ܺ��Ӿ���¼��P8һ�ס������û����ɾ����ٷ���ȡ���齱�����н����������ڻ�����������', 'data/zc_product_images/1469568038615880070.jpg', 30, NULL),
(12, 9, 500, 0, '699', '0', 'лл����֧�֣������Գ�ֵ�ڳ�ļ۸񣬻�÷������ܺ��Ӿ��г���¼������1�ס����������ͷ����������TF������', 'data/zc_product_images/1469568025120342666.jpg', 30, NULL),
(13, 10, -1, 0, '1', '0', 'ÿ��89λ֧���߳�ȡ1λ�����û���������ʱҲ��ȡ1λ�������û�������onread�����Ų������棨WIFI�ֿأ�1֧�������û����ɾ����ٷ���ȡ���齱�����н����������ڻ�����������', 'data/zc_product_images/1469568253632088242.jpg', 30, NULL),
(14, 10, 2000, 0, '39', '0', '֧��39Ԫ��2000�� �ǳ���л����֧�֣��������õ��ڳɱ��ļ۸���onread�Ų��׼�棨2USB 4λ��ף�1֧ ��ע�����˿֧��WIFI���ƣ� �޶�2000��', 'data/zc_product_images/1469568280177629133.jpg', 30, NULL),
(15, 11, -1, 0, '1', '0', 'ÿ��128λ֧���߳�ȡ1λ�����û���������ʱҲ��ȡ1λ�������û���������������èɽ���ٶ���200��һ�С������û����ɾ����ٷ���ȡ���齱�����н����������ڻ�����������', 'data/zc_product_images/1469568673476363449.jpg', 30, NULL),
(16, 11, 500, 0, '198', '0', '��л����֧�֣����ڳ������ �������Ԥ���г���258Ԫ����������èɽ���ٶ���400��һ�У�˳����ˣ���ذ�װ�� ƫԶ�����۰�̨���ģ������������֡����ࡢ���ɹš����ġ��ຣ���������½������ص�������л����֧�֡�', 'data/zc_product_images/1469568703663762791.jpg', 30, NULL);

INSERT INTO `dsc_zc_initiator` (`id`, `name`, `company`, `img`, `intro`, `describe`, `rank`) VALUES
(2, '��ӡ��Ʒ', '��ӡ��Ʒ', 'data/initiator_image/1469505347118618837.png', '��ӡ��Ʒ��һ���ձ��ӻ�Ʒ��', '��ӡ��Ʒ��һ���ձ��ӻ�Ʒ�ƣ�����������Ϊ��Ʒ�Ʊ�־�ĺò�Ʒ����Ʒ������ճ���ƷΪ������Ʒע�ش��ӡ���ࡢ����������Ϊ��������ڰ�װ���Ʒ����Ͻ���Ʒ�Ʊ�־����Ʒ����Ǧ�ʡ��ʼǱ���ʳƷ�������Ļ����þ߶��С����Ҳ��ʼ���뷿�ݽ��������ꡢ���ȵ�Ȳ�ҵ���', 1),
(3, 'ģ����', '�Ϻ��̴�����Ƽ����޹�˾', 'data/initiator_image/1469561234331729031.jpg', 'ecshopģ������ѡ����һվ������רҵ��ecshopģ�忪���̣��ṩ���Ƶ�ecshop���ο�����ģ�嶨�Ʒ����Լ�ecshop�����ecshop�̡̳�', '�Ϻ��̴�����Ƽ����޹�˾��ECSHOPģ���ã���ecshop��ҵ�׼ҹɽ����Ĺ�����ҵ��������ECSHOPһ��ɳ�������Ϊ���ECSHOPģ��ʹ�����ṩ��Ϊȫ��ķ���ECSHOPģ���ô�ʼ��1999�꣬��һ������ʮ����Ϊ�й��������û��ṩ�������Ӫ�̣��ǹ������ȵ���վ���������', 1);

INSERT INTO `dsc_entry_criteria` (`id`, `parent_id`, `criteria_name`, `charge`, `standard_name`, `type`, `is_mandatory`, `option_value`) VALUES
(1, 0, 'ʵ����֤', '0.00', '', '', 0, ''),
(2, 1, '����', '0.00', '', 'text', 1, ''),
(3, 1, '���֤����', '0.00', '', 'file', 1, ''),
(4, 1, '���֤����', '0.00', '', 'file', 1, ''),
(5, 1, 'Ӫҵִ��', '0.00', '', 'file', 1, ''),
(6, 1, '�ֻ�����', '0.00', '', 'text', 1, ''),
(7, 1, '��������', '0.00', '', 'text', 1, ''),
(8, 1, '���֤����', '0.00', '', 'text', 1, ''),
(9, 0, '���ɱ�֤��', '0.00', '', '', 0, ''),
(10, 9, '��֤��', '500.00', '', 'charge', 0, ''),
(11, 0, '���ɼ��˷�', '0.00', '', '', 0, ''),
(12, 11, '���˷�', '5000.00', '', 'charge', 0, '');

INSERT INTO `dsc_seller_grade` (`id`, `grade_name`, `goods_sun`, `seller_temp`, `favorable_rate`, `give_integral`, `rank_integral`, `pay_integral`, `grade_introduce`, `entry_criteria`, `grade_img`, `is_open`, `is_default`) VALUES
(14, '�����̼�', 400, 20, '75', 80, 80, 80, '44444', 'a:3:{i:1;s:1:"1";i:9;s:1:"9";i:11;s:2:"11";}', 'data/seller_grade/1469558898291609114.png', 1, 0),
(13, '�����̼�', 300, 9, '80', 60, 60, 60, '33333', 'a:2:{i:1;s:1:"1";i:11;s:2:"11";}', 'data/seller_grade/1469558891239621018.png', 1, 0),
(12, '�����̼�', 200, 7, '85', 40, 40, 40, '222222', 'a:2:{i:1;s:1:"1";i:9;s:1:"9";}', 'data/seller_grade/1469558678666686249.png', 1, 0),
(10, '��ͨ�̼�', 100, 5, '90', 20, 20, 20, '1111', 'a:1:{i:1;s:1:"1";}', 'data/seller_grade/1469558669252444227.png', 1, 1);

INSERT INTO `dsc_merchants_privilege` (`action_list`, `grade_id`) VALUES
('goods_manage,remove_back,cat_manage,cat_drop,attr_manage,comment_priv,goods_type,goods_auto,virualcard,goods_export,goods_batch,merchants_brand,discuss_circle,feedback_priv,seller_manage,seller_allot,seller_drop,ship_manage,shiparea_manage,warehouse_manage,order_os_edit,order_ps_edit,order_ss_edit,order_edit,order_view,order_view_finished,repay_manage,booking,sale_order_stats,delivery_view,topic_manage,snatch_manage,ad_manage,gift_manage,bonus_manage,auction,group_by,favourable,whole_sale,package_manage,exchange_goods,presale,gift_gard_manage,take_manage,merchants_commission,seller_store_informa,seller_store_other', 0),
('goods_manage,remove_back,cat_manage,cat_drop,attr_manage,comment_priv,goods_type,goods_auto,virualcard,goods_export,goods_batch,merchants_brand,discuss_circle,feedback_priv,seller_manage,seller_allot,seller_drop,ship_manage,shiparea_manage,warehouse_manage,order_os_edit,order_ps_edit,order_ss_edit,order_edit,order_view,order_view_finished,repay_manage,booking,sale_order_stats,delivery_view,merchants_commission,seller_store_informa,seller_store_other', 10),
('goods_manage,remove_back,cat_manage,cat_drop,attr_manage,comment_priv,goods_type,goods_auto,virualcard,goods_export,goods_batch,merchants_brand,discuss_circle,feedback_priv,seller_manage,seller_allot,seller_drop,ship_manage,shiparea_manage,warehouse_manage,order_os_edit,order_ps_edit,order_ss_edit,order_edit,order_view,order_view_finished,repay_manage,booking,sale_order_stats,delivery_view,bonus_manage,favourable,merchants_commission,seller_store_informa,seller_store_other', 12),
('goods_manage,remove_back,cat_manage,cat_drop,attr_manage,comment_priv,goods_type,goods_auto,virualcard,goods_export,goods_batch,merchants_brand,discuss_circle,feedback_priv,seller_manage,seller_allot,seller_drop,ship_manage,shiparea_manage,warehouse_manage,order_os_edit,order_ps_edit,order_ss_edit,order_edit,order_view,order_view_finished,repay_manage,booking,sale_order_stats,delivery_view,bonus_manage,favourable,exchange_goods,presale,gift_gard_manage,take_manage,merchants_commission,seller_store_informa,seller_store_other', 13),
('goods_manage,remove_back,cat_manage,cat_drop,attr_manage,comment_priv,goods_type,goods_auto,virualcard,goods_export,goods_batch,merchants_brand,discuss_circle,feedback_priv,seller_manage,seller_allot,seller_drop,ship_manage,shiparea_manage,warehouse_manage,order_os_edit,order_ps_edit,order_ss_edit,order_edit,order_view,order_view_finished,repay_manage,booking,sale_order_stats,delivery_view,bonus_manage,favourable,exchange_goods,presale,gift_gard_manage,take_manage,merchants_commission,seller_store_informa,seller_store_other,zc_project_manage,zc_category_manage,zc_initiator_manage', 14);

INSERT INTO `dsc_mail_templates` (`template_id`, `template_code`, `is_html`, `template_subject`, `template_content`, `last_modify`, `last_send`, `type`) VALUES (NULL, 'user_register', '1', '��Աע��ģ��', '<table width="700" border="0" align="center" cellspacing="0" style="width:700px;">
<tbody>
<tr>
<td>
<div style="width:700px;margin:0 auto;border-bottom:1px solid #ccc;margin-bottom:30px;">
<table border="0" cellpadding="0" cellspacing="0" width="700" height="39" style="font:12px Tahoma, Arial, ����;">
<tbody>
<tr>
<td width="210">
</td>
</tr>
</tbody>
</table>
</div>
<div style="width:680px;padding:0 10px;margin:0 auto;">
<div style="line-height:1.5;font-size:14px;margin-bottom:25px;color:#4d4d4d;">
<strong style="display:block;margin-bottom:15px;">
�װ��Ļ�Ա��
<span style="color:#f60;font-size: 16px;">{$user_name}</span>���ã�
</strong>
<strong style="display:block;margin-bottom:15px;">
�������޸����䣬������֤������������룺
<span style="color:#f60;font-size: 24px"><span style="border-bottom-width: 1px; border-bottom-style: dashed; border-bottom-color: rgb(204, 204, 204); z-index: 1; position: static;" t="7" onclick="return false;" data="{$register_code}" isout="1">{$register_code}</span></span>������ɲ�����
</strong>
</div>
<div style="margin-bottom:30px;">
<small style="display:block;margin-bottom:20px;font-size:12px;">
<p style="color:#747474;">
ע�⣺�˲������ܻ��޸��������롢��¼�������ֻ�����Ǳ��˲������뼰ʱ��¼���޸������Ա�֤�ʻ���ȫ
<br>��������Ա����������ȡ����֤�룬����й©��)
</p>
</small>
</div>
</div>
<div style="width:700px;margin:0 auto;">
<div style="padding:10px 10px 0;border-top:1px solid #ccc;color:#747474;margin-bottom:20px;line-height:1.3em;font-size:12px;">
<p>��Ϊϵͳ�ʼ�������ظ�<br>
�뱣�ܺ��������䣬�����˺ű����˵���
</p>
<p>���̴���Ȩ����<span style="border-bottom-width: 1px; border-bottom-style: dashed; border-bottom-color: rgb(204, 204, 204); z-index: 1; position: static;" t="7" onclick="return false;" data="1999-2014">2005-2016</span></p>
</div>
</div>
</td>
</tr>
</tbody>
</table>', '0', '0', 'template');

INSERT INTO `dsc_shop_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '942', 'user_login_register', 'select', '0,1', '', '0', '1');

INSERT INTO `dsc_shop_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '942', 'user_phone', 'select', '0,1', '', '0', '1');