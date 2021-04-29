<?php

use yii\db\Migration;

/**
 * Class m210428_112520_user
 */
class m210428_112520_user extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new \common\models\User();
        $user->username = $user->email = 'test@test.com';
        $user->password = '123';
        $user->auth_key = '123123';
        $user->status = \common\models\User::STATUS_ACTIVE;
        $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%user}}');
    }

}
