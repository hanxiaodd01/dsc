<?php



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
