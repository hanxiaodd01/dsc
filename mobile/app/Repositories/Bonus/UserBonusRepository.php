<?php

namespace App\Repositories\Bonus;

class UserBonusRepository
{
    public function getUserBonusCount($userId)
    {
        return \App\Models\UserBonus::where('user_id', $userId)->count();
    }
}
