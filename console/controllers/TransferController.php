<?php

namespace console\controllers;

use backend\classes\BonusFactory;
use backend\models\Bonus;
use backend\models\BonusUser;
use yii\console\Controller;

class TransferController extends Controller{

    public function actionIndex(){
        $bonus = Bonus::findOne(['code' => 'money']);
        $factory = BonusFactory::getBonusType($bonus);

        $bonusForSend = BonusUser::find()
            ->where(['bonus_id' => $bonus->id])
            ->andWhere(['send' => 0])
            ->orderBy('created_at')
            ->limit(10)
            ->all();

        foreach ($bonusForSend as $current){
            $factory->setBonusSend($current);
            $factory->sendPrize();
            $current->send = 1;
            $current->save();
        }

        echo 'Done';
    }
}
