<?php

namespace backend\interfaces;

use backend\models\Bonus;

interface BonusType{
    public function sendPrize() : bool;
    public function limit() : int;
    public function getPrize();
    public function convert() : bool;
}
