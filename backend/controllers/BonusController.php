<?php

namespace backend\controllers;

use backend\classes\BonusFactory;
use backend\classes\BonusRandomizer;
use backend\models\Bonus;
use backend\models\BonusUser;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class BonusController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return
            $this->render('index', [
                'user' => Yii::$app->user->identity,
                'bonuses' => Bonus::findAll(['is_active' => 1])
            ]);
    }

    public function actionGenerate(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        try{
            (new BonusRandomizer(Yii::$app->user->identity))->getRandomBonus();
        } catch (\Exception $e){
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect('/bonus/index');
    }

    public function actionDismiss($id){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $bonus = BonusUser::findOne(['id' => $id, 'user_id' => Yii::$app->user->identity->getId()]);

        if(empty($bonus)){
            Yii::$app->session->setFlash('error', 'Bonus не найден');
            return $this->redirect('/bonus/index');
        }

        $bonus->rejection = 1;
        //Можно было реализовать в модели но по времени не стал. Есть behavior и на пример beforeUpdate реализовать там.
        $bonus->updated_at = date('Y-m-d H:i:s');
        $bonus->save();

        return $this->redirect('/bonus/index');
    }
}
