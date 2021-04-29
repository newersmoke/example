<?php

namespace backend\classes\bonus;

use backend\models\Bonus;
use backend\interfaces\BaseBonus as BaseBonusInterface;
use backend\models\BonusUser;

class BaseBonus implements BaseBonusInterface
{
    private $bonus;
    public $bonusSend;

    public function __construct(Bonus $bonus)
    {
        $this->bonus = $bonus;
    }

    public function getBonusModel() : Bonus{
        return $this->bonus;
    }

    public function getBonusId(){
        return $this->bonus->id;
    }

    public function setBonusSend(BonusUser $data){
        $this->bonusSend = $data;
    }

    public function getBonusSend(){
        return $this->bonusSend;
    }
}