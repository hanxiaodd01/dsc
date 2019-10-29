<?php
/*高度差网络  禁止倒卖 一经发现停止任何服务https://www.dscmall.cn*/
class DatabaseSeeder extends \Illuminate\Database\Seeder
{
	public function run()
	{
		$this->call('MobileModuleSeeder');
		$this->call('WechatModuleSeeder');
		$this->call('DRPModuleSeeder');
		$this->call('TeamModuleSeeder');
		$this->call('BargainModuleSeeder');
		$this->call('WeappModuleSeeder');
		$this->call('OrderRuIdSeeder');
	}
}

?>
