<?php

namespace backend\classes;

use backend\models\Bonus;
use backend\interfaces\BonusType;
use backend\classes\bonus\MoneyBonus;
use backend\classes\bonus\PointBonus;
use backend\classes\bonus\PrizeBonus;


class BonusFactory
{
    public static function getBonusType(Bonus $bonus): BonusType
    {
        switch ($bonus->code) {
            case 'money' :
                return new MoneyBonus($bonus);
                break;
            case 'prize' :
                return new PrizeBonus($bonus);
                break;
            case 'points':
                return new PointBonus($bonus);
                break;
            default:
                throw new \Exception("Unknown Bonus");
        }
    }
}