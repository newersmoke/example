<?php

namespace backend\classes\bonus;

use backend\interfaces\BonusType;
use backend\classes\bonus\BaseBonus;
use backend\models\Bonus;

class PrizeBonus extends BaseBonus implements BonusType
{
    public function __construct(Bonus $bonus)
    {
        parent::__construct($bonus);
    }

    public function sendPrize(): bool
    {
        //Логика отправки по почте
        return true;
    }

    public function limit(): int
    {
        return 1;
    }

    public function getPrize()
    {
        //Можно создать было значение в некой новой таблице prize. Где хранить справочник призов и брать рaндомно от туда. И туда же к примеру картинки отправить
        return ['value' => 1, 'prize_name' => 'WoW'];
    }

    public function convert(): bool
    {

    }
}