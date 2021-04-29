<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user \common\models\User */
/* @var $bonuses \backend\models\Bonus[] */

$this->title = 'Prize page';
?>
<div class="container">

    <div class="jumbotron">
        <h1><?= $user->username; ?>, получи один из подарков</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach ($bonuses as $bonus): ?>
                <div class="col-lg-4">
                    <h2><?= $bonus->name ?></h2>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <?php ActiveForm::begin(['action' => ['bonus/generate'], 'method' => 'post']); ?>
            <div class="col align-self-center">
                <?= Html::submitButton('Получить', ['class' => 'btn btn-primary btn-lg']); ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="row">
            <?php foreach ($user->activeBonus as $bonus): ?>
                <div class="col-lg-4">
                    <h2><?= $bonus['bonus_name'] ?></h2>
                    <p>
                        Получено <?= $bonus['value']?>  <?= $bonus['prize']?>
                    </p>
                    <p>
                        <?php if($bonus['send']):?>
                                Отправлено
                            <?php else:?>
                                Ожидает отправки
                        <?php endif;?>
                    </p>
                    <?php ActiveForm::begin(['action' => ['bonus/dismiss', 'id' => $bonus['id']], 'method' => 'post']); ?>
                    <div class="col align-self-center">
                        <?= Html::submitButton('Отказатся', ['class' => 'btn btn-error btn-lg']); ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
