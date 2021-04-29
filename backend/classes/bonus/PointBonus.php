<?php

namespace backend\classes\bonus;

use backend\interfaces\BonusType;
use backend\classes\bonus\BaseBonus;
use backend\models\Bonus;

class PointBonus extends BaseBonus implements BonusType
{
    public function __construct(Bonus $bonus)
    {
        parent::__construct($bonus);
    }

    public function sendPrize(): bool
    {
        return true;
    }

    public function limit(): int
    {
        return 0;
    }

    public function getPrize()
    {
        //Можно создать было значение в некой новой таблице bonus_limit. Где хранить димиты, и лимиты приза
        return ['value' => rand(1, 100)];
    }

    public function convert(): bool
    {

    }
}