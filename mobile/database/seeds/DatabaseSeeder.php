<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
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
