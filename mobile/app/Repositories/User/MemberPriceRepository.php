<?php

namespace App\Repositories\User;

class MemberPriceRepository
{
    public function getMemberPriceByUid($rank, $goods_id)
    {
        $price = \App\Models\MemberPrice::where('user_rank', $rank)->where('goods_id',
            $goods_id)->pluck('user_price')->toArray();

        if (!empty($price)) {
            $price = $price[0];
        }

        return $price;
    }
}
