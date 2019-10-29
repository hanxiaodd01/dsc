<?php
/**
 * Created by PhpStorm.
 * User: helei
 * Date: 2017/3/7
 * Time: 下午3:58
 */

namespace Payment\Query\Ali;


use Payment\Common\Ali\AliBaseStrategy;
use Payment\Common\Ali\Data\Query\TransferQueryData;
use Payment\Common\AliConfig;
use Payment\Common\PayException;
use Payment\Config;

/**
 * 查询转账订单的情况
 * Class AliTransferQuery
 * @package Payment\Query\Ali
 */
class AliTransferQuery extends AliBaseStrategy
{

    public function getBuildDataClass()
    {
        $this->config->method = AliConfig::TRANS_QUERY_METHOD;
        return TransferQueryData::class;
    }

    protected function retData(array $data)
    {
        $url = parent::retData($data); // TODO: Change the autogenerated stub

        try {
            $ret = $this->sendReq($url);
        } catch (PayException $e) {
            throw $e;
        }

        if ($this->config->returnRaw) {
            $ret['channel'] = Config::ALI_TRANSFER;
            return $ret;
        }

        return $this->createBackData($ret);
    }

    /**
     * 返回数据给客户端  未完成，目前没有数据提供
     * @param array $data
     * @return array
     * @author helei
     */
    protected function createBackData(array $data)
    {
        // 新版本
        if ($data['code'] !== '10000') {
            return $retData = [
                'is_success' => 'F',
                'error' => $data['sub_msg'],
                'channel' => Config::ALI_TRANSFER,
            ];
        }

        $retData = [
            'is_success' => 'T',
            'response' => [
                'transaction_id' => $data['order_id'],// 支付宝订单号
                'amount' => $data['order_fee'],// 转账金额
                'trans_no' => $data['out_biz_no'],// 商户转账订单号
                'pay_date' => $data['pay_date'],// 转账日期
                'status' => strtolower($data['status']),
                'fail_reason' => $data['fail_reason'],// 查询到的订单状态为FAIL失败或REFUND退票时，返回具体的原因。
                'arrival_time_end' => $data['arrival_time_end'],// 预计到账时间，转账到银行卡专用，格式为yyyy-MM-dd HH:mm:ss
                'channel' => Config::ALI_TRANSFER,
            ]
        ];

        return $retData;
    }
}