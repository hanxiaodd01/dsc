<div class="user-order-list user-purchase">
    <?php $_from = $this->_var['orders']['order_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
    <dl class="item">
        <dt class="item-t">
            <div class="t-statu"><?php echo $this->_var['order']['order_status']; ?></div>
            <div class="t-info">
                <span class="info-item">订单号：<?php echo $this->_var['order']['order_sn']; ?></span>
                <span class="info-item"><?php echo $this->_var['order']['order_time']; ?></span>
                <span class="info-item">
                    <a href="<?php echo $this->_var['order']['shop_url']; ?>" class="user-shop-link"><?php echo $this->_var['order']['shop_name']; ?></a>
                    <?php if ($this->_var['order']['is_IM'] == 1 || $this->_var['order']['is_dsc']): ?>
                    <a id="IM" onclick="openWin(this)" href="javascript:;" goods_id="<?php echo $this->_var['goods']['goods_id']; ?>"  class="iconfont icon-kefu user-shop-kefu"></a>
                    <?php else: ?>
                    <?php if ($this->_var['order']['kf_type'] == 1): ?>
                    <a href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $this->_var['order']['kf_ww']; ?>&siteid=cntaobao&status=1&charset=utf-8" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
                    <?php else: ?>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['order']['kf_qq']; ?>&site=qq&menu=yes" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
                    <?php endif; ?>
                    <?php endif; ?>
                </span>
            </div>
            <?php if ($this->_var['order']['order_over'] == 0 && $this->_var['order']['pay_status'] == 1): ?>
            <div class="t-btn ml20"><a href="javascript:void(0);" data-orderid="<?php echo $this->_var['order']['order_id']; ?>" ectype="userWhoConfirm" class="sc-btn sc-blue-btn">设为完成</a></div>
            <?php endif; ?>
            
            <div class="t-price mr0"><?php echo $this->_var['order']['total_fee']; ?><?php if ($this->_var['order']['pay_fee'] > 0): ?>(手续费：<?php echo $this->_var['order']['pay_fee']; ?>)<?php endif; ?></div>
        </dt>
        <dd class="item-c">                        
            <div class="itemc-left">
            	<div class="itemc-left-info">
                <?php $_from = $this->_var['order']['order_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['foo']['iteration']++;
?>
                <div class="itemc-goods <?php if (($this->_foreach['foo']['iteration'] == $this->_foreach['foo']['total'])): ?>last-child<?php endif; ?>">
                    <div class="c-img"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php if ($this->_var['goods']['goods_thumb']): ?><?php echo $this->_var['goods']['goods_thumb']; ?><?php else: ?><?php echo $this->_var['order']['no_picture']; ?><?php endif; ?>" alt=""></a></div>
                    <div class="c-info">
                        <div class="c-name"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><?php echo $this->_var['goods']['goods_name']; ?></a></div>
                        <div class="c-lie">
                            <span class="c-row"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></span>
                            <span class="c-row ftx-07"><?php echo $this->_var['goods']['goods_price']; ?></span>
                            <span class="c-row last">X<?php echo $this->_var['goods']['goods_number']; ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
            </div>

            <div class="itemc-right">
                <div class="p-i-items">
                    
                    <div class="lie">
                        <div class="label">支付状态：</div>
                        <div class="value"><?php if ($this->_var['order']['pay_status'] == 0): ?>未支付<a href="wholesale_flow.php?step=order_pay&order_id=<?php echo $this->_var['order']['order_id']; ?>"  class="sc-btn sc-blue-btn ml10" target="_blank">去付款</a><?php else: ?>已支付<?php endif; ?></div>
                    </div>
                    <div class="lie">
                        <div class="label">联系人：</div>
                        <div class="value"><?php echo $this->_var['order']['consignee']; ?></div>
                    </div>
                    <div class="lie">
                        <div class="label">联系方式：</div>
                        <div class="value"><?php echo $this->_var['order']['mobile']; ?></div>
                    </div>
                    <div class="lie">
                        <div class="label">收货地址：</div>
                        <div class="value"><?php echo $this->_var['order']['address']; ?></div>
                    </div>
                    <div class="lie">
                        <div class="label">是否开发票：</div>
                        <div class="value"><?php echo $this->_var['lang']['need_invoice'][$this->_var['order']['inv_type']]; ?></div>
                    </div>
					<?php if ($this->_var['order']['inv_type']): ?>
                    <div class="lie">
                        <div class="label">发票抬头：</div>
                        <div class="value"><?php echo $this->_var['order']['inv_payee']; ?></div>
                    </div>
                    <div class="lie">
                        <div class="label">纳税人识别号：</div>
                        <div class="value"><?php echo $this->_var['order']['tax_id']; ?></div>
                    </div>					
					<?php endif; ?>
                    <div class="lie">
                        <div class="label">支付方式：</div>
                        <div class="value"><?php echo $this->_var['order']['pay_name']; ?></div>
                    </div>
                    <div class="lie last">
                        <div class="label">其他备注：</div>
                        <div class="value"><?php echo $this->_var['order']['postscript']; ?></div>
                    </div>
                </div>
            </div>
            <a href="javascript:delete_wholesale_order(<?php echo $this->_var['order']['order_id']; ?>)" class="pur-remove" ectype="pur-remove"><i class="iconfont icon-remove-alt"></i></a>
        </dd>
    </dl>
    <?php endforeach; else: ?>
    <div class="no_records">
	<i class="no_icon"></i>
        <div class="no_info">
            <h3>主人，您现在还没有采购订单哟！</h3>
        </div>
    </div>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>

<?php if ($this->_var['orders']['order_list']): ?>
<div class="pages pages_warp"><?php echo $this->_var['orders']['pager']; ?></div>
<?php endif; ?>
