<?php

namespace backend\classes\bonus;

use backend\models\Bonus;
use backend\interfaces\BonusType;
use backend\classes\bonus\BaseBonus;

class MoneyBonus extends BaseBonus implements BonusType
{
    public function __construct(Bonus $bonus)
    {
        parent::__construct($bonus);
    }

    public function sendPrize(): bool
    {
        // Логика отправки на апи банка $this->bonusSend транзакция
        return true;
    }

    public function limit(): int
    {
        return 1;
    }

    public function getPrize()
    {
        return ['value' => 1];
    }

    public function convert(): bool
    {

    }
}