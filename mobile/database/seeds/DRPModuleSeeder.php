<?php
/*高度差网络  禁止倒卖 一经发现停止任何服务https://www.dscmall.cn*/
class DRPModuleSeeder extends \Illuminate\Database\Seeder
{
	public function run()
	{
		$this->drpConfig();
		$this->article();
		$this->wechatTemplate();
		$this->adminAction();
		$this->drpUserCredit();
		$this->users();
	}

	private function drpConfig()
	{
		$result = \Illuminate\Support\Facades\DB::table('drp_config')->get();
		$result = $result->toArray();

		if (empty($result)) {
			$rows = array(
				array('code' => 'notice', 'type' => 'textarea', 'store_range' => '', 'value' => '亲，您的佣金由三部分组成：
1.我的下线购买分销商品，我所获得的佣金（即本一级分销佣金）
2.下级分店的下线会员购买分销商品，我所获得的佣金（即二级分销佣金）
3.下级分店发展的分店的下线会员购买分销商品，我所获得的佣金（即三级分店佣金）。', 'name' => '温馨提示', 'warning' => '申请成为分销商时，提示用户需要注意的信息'),
				array('code' => 'novice', 'type' => 'textarea', 'store_range' => '', 'value' => '1、开微店收入来源之一：您已成功注册微店，已经取得整个商城的商品销售权，只要您的下线会员购买分销商品，即可获得“一级分销佣金”。
2、开微店收入来源之二：邀请您的朋友注册微店，他就会成为你的下级分销商，他的下线会员购买分销商品，您即可获得“二级分销佣金”。
3、开微店收入来源之三：您的下级分销商邀请他的朋友注册微店后，他朋友的下线会员购买分销商品，您即可获得“三级分销佣金”。', 'name' => '新手必读', 'warning' => '分销商申请成功后，用户要注意的事项'),
				array('code' => 'withdraw', 'type' => 'textarea', 'store_range' => '', 'value' => '可提现金额为交易成功后7天且为提现范围内的金额', 'name' => '提现提示', 'warning' => '申请提现时，少于该值将无法提现'),
				array('code' => 'draw_money', 'type' => 'text', 'store_range' => '', 'value' => '10', 'name' => '提现金额', 'warning' => '申请提现时，少于该值将无法提现'),
				array('code' => 'issend', 'type' => 'radio', 'store_range' => '0,1', 'value' => '1', 'name' => '消息推送', 'warning' => '申请店铺成功时,推送消息到微信'),
				array('code' => 'isbuy', 'type' => 'radio', 'store_range' => '0,1', 'value' => '1', 'name' => '购买成为分销商', 'warning' => '是否开启购买成为分销商,默认申请成为分销商'),
				array('code' => 'buy_money', 'type' => 'text', 'store_range' => '', 'value' => '100', 'name' => '购买金额', 'warning' => '购买金额达到该数值,才能成为分销商'),
				array('code' => 'isdrp', 'type' => 'radio', 'store_range' => '0,1', 'value' => '1', 'name' => '商品分销模式', 'warning' => '是否开启分销模式,默认分销模式。控制商品详情页‘我要分销’按钮'),
				array('code' => 'ischeck', 'type' => 'radio', 'store_range' => '0,1', 'value' => '1', 'name' => '分销商审核', 'warning' => '成为分销商,是否需要审核'),
				array('code' => 'drp_affiliate', 'type' => '', 'store_range' => '', 'value' => 'a:3:{s:6:"config";a:5:{s:6:"expire";i:0;s:11:"expire_unit";s:3:"day";s:3:"day";s:1:"8";s:15:"level_point_all";s:2:"8%";s:15:"level_money_all";s:2:"1%";}s:4:"item";a:3:{i:0;a:2:{s:11:"level_point";s:3:"60%";s:11:"level_money";s:3:"60%";}i:1;a:2:{s:11:"level_point";s:3:"30%";s:11:"level_money";s:3:"30%";}i:2;a:2:{s:11:"level_point";s:3:"10%";s:11:"level_money";s:3:"10%";}}s:2:"on";i:1;}', 'name' => '三级分销比例', 'warning' => ''),
				array('code' => 'custom_distributor', 'type' => 'text', 'store_range' => '', 'value' => '代言人', 'name' => '自定义“分销商”名称', 'warning' => '替换设定的分销商名称'),
				array('code' => 'custom_distribution', 'type' => 'text', 'store_range' => '', 'value' => '代言', 'name' => '自定义“分销”名称', 'warning' => '替换设定的分销名称'),
				array('code' => 'commission', 'type' => 'radio', 'store_range' => '0,1', 'value' => '0', 'name' => '是否显示佣金比例', 'warning' => '控制店铺页面是否显示佣金比例'),
				array('code' => 'is_buy_money', 'type' => 'radio', 'store_range' => '0,1', 'value' => '0', 'name' => '累计消费金额', 'warning' => '是否开启购物累计消费金额满足设置才能开店'),
				array('code' => 'buy', 'type' => 'text', 'store_range' => '', 'value' => '200', 'name' => '设置累计消费金额', 'warning' => '设置会员累计消费金额')
			);
			\Illuminate\Support\Facades\DB::table('drp_config')->insert($rows);
		}

		$result = \Illuminate\Support\Facades\DB::table('drp_config')->where('code', 'count_commission')->get();
		$result = $result->toArray();
		$result_register = \Illuminate\Support\Facades\DB::table('drp_config')->where('code', 'register')->get();
		$result_register = $result_register->toArray();
		$result_isdistributionr = \Illuminate\Support\Facades\DB::table('drp_config')->where('code', 'isdistribution')->get();
		$result_isdistributionr = $result_isdistributionr->toArray();

		if (empty($result)) {
			$rows = array(
				array('code' => 'count_commission', 'type' => 'radio', 'store_range' => '0,1,2', 'value' => '2', 'name' => '按时间统计分销商佣金排行', 'warning' => '按时间统计分销商佣金进行分销商排行，可以按 周，月，年 排行')
			);
			\Illuminate\Support\Facades\DB::table('drp_config')->insert($rows);
		}

		if (empty($result_register)) {
			$rows = array(
				array('code' => 'register', 'type' => 'radio', 'store_range' => '0,1', 'value' => '0', 'name' => '开启分销商店铺自动注册', 'warning' => '开启分销商店铺自动注册后，授权登录，关注商城会自动创建一个分销商店铺')
			);
			\Illuminate\Support\Facades\DB::table('drp_config')->insert($rows);
		}

		if (empty($result_isdistributionr)) {
			$rows = array(
				array('code' => 'isdistribution', 'type' => 'radio', 'store_range' => '0,1', 'value' => '1', 'name' => '分销分成模式', 'warning' => '开启分成模式从上级分销商开始分成，否则从当前下单分销商分成')
			);
			\Illuminate\Support\Facades\DB::table('drp_config')->insert($rows);
		}

		if (!empty($result_isdistributionr)) {
			\Illuminate\Support\Facades\DB::table('drp_config')->where('code', 'isdistribution')->update(array('warning' => '开启分成模式从上级分销商开始分成，否则从当前下单分销商分成'));
		}

		$affiliate = \Illuminate\Support\Facades\DB::table('drp_config')->where('code', 'drp_affiliate')->first();
		$result = unserialize($affiliate->value);
		$value = array(
			'on'     => 1,
			'config' => array('expire' => $result['config']['expire'], 'expire_unit' => $result['config']['expire_unit'], 'day' => $result['config']['day']),
			'item'   => array(
				array('credit_t' => '30%', 'credit_y' => '40%', 'credit_j' => '50%'),
				array('credit_t' => '10%', 'credit_y' => '20%', 'credit_j' => '30%'),
				array('credit_t' => '5%', 'credit_y' => '10%', 'credit_j' => '20%')
			)
		);

		if (!isset($result['item'][0]['credit_t'])) {
			\Illuminate\Support\Facades\DB::table('drp_config')->where('code', 'drp_affiliate')->update(array('value' => serialize($value)));
		}
	}

	private function article()
	{
		$result = \Illuminate\Support\Facades\DB::table('article_cat')->where('cat_id', 1000)->get();
		$result = $result->toArray();

		if (empty($result)) {
			$cats = array(
				array('cat_id' => 1000, 'cat_name' => '微分销', 'cat_type' => 1, 'keywords' => '分销', 'show_in_nav' => 1)
			);
			\Illuminate\Support\Facades\DB::table('article_cat')->insert($cats);
			$articles = array(
				array('cat_id' => 1000, 'title' => '什么是微分销？', 'content' => '微分销是一体化微信分销交易平台，基于朋友圈传播，帮助企业打造“企业微商城+粉丝微店+员工微店”的多层级微信营销模式，轻松带领千万微信用户一起为您的商品进行宣传及销售。', 'keywords' => '分销', 'is_open' => 1, 'add_time' => '1467962482'),
				array('cat_id' => 1000, 'title' => '如何申请成为分销商？', 'content' => '关注微信公众号，进入会员中心点击我的微店。申请后，等待管理员审核通过，即可拥有自己的微店，坐等佣金收入分成！', 'keywords' => '分销', 'is_open' => 1, 'add_time' => '1467962482')
			);
			\Illuminate\Support\Facades\DB::table('article')->insert($articles);
		}
	}

	private function wechatTemplate()
	{
		$result = \Illuminate\Support\Facades\DB::table('wechat_template')->where('code', 'OPENTM207126233')->first();
		$result_1 = \Illuminate\Support\Facades\DB::table('wechat_template')->where('code', 'OPENTM201812627')->first();
		if (empty($result) && empty($result_1)) {
			$rows = array(
				array('wechat_id' => 1, 'code' => 'OPENTM207126233', 'template' => '{{first.DATA}}\\r\\n分销商名称：{{keyword1.DATA}}\\r\\n分销商电话：{{keyword2.DATA}}\\r\\n申请时间：{{keyword3.DATA}}\\r\\n{{remark.DATA}}', 'title' => '分销商申请成功'),
				array('wechat_id' => 1, 'code' => 'OPENTM201812627', 'template' => '{{first.DATA}}\\r\\n佣金金额：{{keyword1.DATA}}\\r\\n时间：{{keyword2.DATA}}\\r\\n{{remark.DATA}}', 'title' => '佣金提醒')
			);
			\Illuminate\Support\Facades\DB::table('wechat_template')->insert($rows);
		}

		$result_2 = \Illuminate\Support\Facades\DB::table('wechat_template')->where('code', 'OPENTM202967310')->first();

		if (empty($result_2)) {
			$rows = array(
				array('wechat_id' => 1, 'code' => 'OPENTM202967310', 'template' => '{{first.DATA}}会员编号：{{keyword1.DATA}}加入时间：{{keyword2.DATA}}{{remark.DATA}}', 'title' => '新会员加入通知')
			);
			\Illuminate\Support\Facades\DB::table('wechat_template')->insert($rows);
		}

		$result_3 = \Illuminate\Support\Facades\DB::table('wechat_template')->where('code', 'OPENTM220197216')->first();

		if (!empty($result_3)) {
			\Illuminate\Support\Facades\DB::table('wechat_template')->where('code', 'OPENTM220197216')->delete();
		}

		$result_4 = \Illuminate\Support\Facades\DB::table('wechat_template')->where('code', 'OPENTM206328970')->first();

		if (empty($result_4)) {
			$rows = array(
				array('wechat_id' => 1, 'code' => 'OPENTM206328970', 'template' => '{{first.DATA}}商品名称：{{keyword1.DATA}}商品佣金：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单状态：{{keyword4.DATA}}{{remark.DATA}}', 'title' => '分销订单下单成功通知')
			);
			\Illuminate\Support\Facades\DB::table('wechat_template')->insert($rows);
		}
	}

	private function adminAction()
	{
		$result = \Illuminate\Support\Facades\DB::table('admin_action')->where('action_code', 'drp')->get();
		$result = $result->toArray();

		if (empty($result)) {
			$row = array('parent_id' => 0, 'action_code' => 'drp');
			$action_id = \Illuminate\Support\Facades\DB::table('admin_action')->insertGetId($row);
			$rows = array(
				array('parent_id' => $action_id, 'action_code' => 'drp_config'),
				array('parent_id' => $action_id, 'action_code' => 'drp_shop'),
				array('parent_id' => $action_id, 'action_code' => 'drp_list'),
				array('parent_id' => $action_id, 'action_code' => 'drp_order_list'),
				array('parent_id' => $action_id, 'action_code' => 'drp_set_config')
			);
			\Illuminate\Support\Facades\DB::table('admin_action')->insert($rows);
		}
	}

	private function drpUserCredit()
	{
		$result = \Illuminate\Support\Facades\DB::table('drp_user_credit')->get();
		$result = $result->toArray();

		if (empty($result)) {
			$rows = array(
				array('credit_name' => '铜牌', 'min_money' => 0, 'max_money' => 5000),
				array('credit_name' => '银牌', 'min_money' => 5001, 'max_money' => 10000),
				array('credit_name' => '金牌', 'min_money' => 10001, 'max_money' => 100000)
			);
			\Illuminate\Support\Facades\DB::table('drp_user_credit')->insert($rows);
		}
	}

	private function users()
	{
		$where = array(
			array('parent_id', '>', 0),
			array('drp_parent_id', '=', 0)
		);
		$result = \Illuminate\Support\Facades\DB::table('users')->select('user_id', 'parent_id')->where($where)->get();
		$result = $result->toArray();

		if (!empty($result)) {
			foreach ($result as $user) {
				$data = array('drp_parent_id' => $user->parent_id);
				\Illuminate\Support\Facades\DB::table('users')->where('user_id', $user->user_id)->update($data);
			}
		}
	}
}
