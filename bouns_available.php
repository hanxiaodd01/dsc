<?php
//zend by 商创商城
define('IN_ECS', true);
require dirname(__FILE__) . '/includes/init.php';
require ROOT_PATH . 'includes/cls_json.php';
if (!isset($_REQUEST['cmt']) && !isset($_REQUEST['act'])) {
	ecs_header("Location: ./\n");
	exit();
}

$_REQUEST['cmt'] = isset($_REQUEST['cmt']) ? json_str_iconv($_REQUEST['cmt']) : '';
$json = new JSON();
$result = array('error' => 0, 'message' => '', 'content' => '');
$cmt = new stdClass();
$cmt->id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
$cmt->type = !empty($_GET['type']) ? intval($_GET['type']) : 0;
$cmt->page = isset($_GET['page']) && 0 < intval($_GET['page']) ? intval($_GET['page']) : 1;

if ($result['error'] == 0) {
	$size = 12;
	$bonus = get_user_bouns_new_list($_SESSION['user_id'], $cmt->page, 0, 'bouns_available_gotoPage', 0, $size);
	$smarty->assign('bonus', $bonus);
	$smarty->assign('size', $size);
	$result['content'] = $smarty->fetch('library/bouns_available_list.lbi');
}

echo $json->encode($result);
