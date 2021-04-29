<?php

namespace backend\classes;

use backend\models\Bonus;
use backend\models\BonusUser;
use common\models\User;

class BonusRandomizer
{
    public $user;
    private $bonuses;
    private $randomBonus;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getRandomBonus()
    {
        $this->init();
        $this->generateRandomBonus();
        $this->applyBonus();
    }

    private function init()
    {
        $this->bonuses = Bonus::findAll(['is_active' => 1]);
    }

    private function generateRandomBonus()
    {
        $random = rand(0, count($this->bonuses));
        $this->randomBonus = $this->bonuses[$random] ?? current($this->bonuses);
    }


    private function applyBonus()
    {
        $bonus = BonusFactory::getBonusType($this->randomBonus);

        if (!empty($bonus->limit())) {
            //Если есть лимит можно сделать сверку на количество таких бонусов у пользователя и вернуть ошибку.
        }

        $transaction = new BonusUser();
        $transaction->user_id = $this->user->id;
        $transaction->bonus_id = $bonus->getBonusModel()->id;
        foreach ($bonus->getPrize() as $field => $value){
            $transaction->$field = $value;
        }
        $transaction->save();

        if($transaction->hasErrors()){
            throw new \Exception('Something went wrong');
        }
    }
}