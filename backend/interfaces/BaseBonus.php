<?php

namespace backend\interfaces;

use backend\models\Bonus;

interface BaseBonus
{
    public function __construct(Bonus $bonus);
    public function getBonusModel() : Bonus;
}
