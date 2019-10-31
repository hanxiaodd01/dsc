<?php



class up_v1_9_3
{
    /**
     * 本升级包中SQL文件存放的位置（相对于升级包所在的路径）。每个版本类必须有该属性。
     */
    public $sql_files = array(
        'structure' => 'structure.sql',
        'data' => array('zh_cn_utf-8' => 'data_zh_cn_utf-8.sql')
    );
    /**
     * 本升级包是否进行智能化的查询操作。每个版本类必须有该属性。
     */
    public $auto_match = true;

    public function __construct()
    {
    }

    public function up_v1_9_3()
    {
    }

    public function update_database_optionally()
    {
        global $db;
        global $ecs;
        include_once ROOT_PATH . 'includes/inc_constant.php';
        $sql = 'UPDATE ' . $ecs->table('shop_config') . ' SET `store_dir` = \'images/common/\', `value` = \'\' WHERE `code` = \'site_commitment\';';
        $db->query($sql);
        $sql = 'UPDATE ' . $ecs->table('shop_config') . ' SET `store_dir` = \'images/common/\' WHERE `code` = \'index_down_logo\';';
        $db->query($sql);
        $sql = 'UPDATE ' . $ecs->table('shop_config') . ' SET `store_dir` = \'images/common/\' WHERE `code` = \'ecjia_qrcode\';';
        $db->query($sql);
        $sql = 'UPDATE ' . $ecs->table('shop_config') . ' SET `store_dir` = \'images/common/\' WHERE `code` = \'ectouch_qrcode\';';
        $db->query($sql);
        $sql = 'INSERT INTO ' . $ecs->table('admin_action') . ' (`action_id`, `parent_id`, `action_code`, `relevance`, `seller_show`) VALUES (NULL, \'136\', \'touch_dashboard\', \'\', \'1\');';
        $db->query($sql);
    }

    public function update_files()
    {
        $result = file_mode_info(ROOT_PATH . 'data/');

        if ($result < 2) {
            exit('ERROR, ' . ROOT_PATH . 'data/ isn\'t a writeable directory.');
        }

        if (!file_exists(ROOT_PATH . 'data/config.php')) {
            if (file_exists(ROOT_PATH . 'includes/config.php')) {
                copy(ROOT_PATH . 'includes/config.php', ROOT_PATH . 'data/config.php');
            } else {
                exit('ERROR, can\'t find config.php.');
            }
        }

        if (!file_exists(ROOT_PATH . 'data/install.lock.php')) {
            if (file_exists(ROOT_PATH . 'includes/install.lock.php')) {
                copy(ROOT_PATH . 'includes/install.lock.php', ROOT_PATH . 'data/install.lock.php');
            } else {
                exit('ERROR, can\'t find install.lock.php.');
            }
        }
    }
}
