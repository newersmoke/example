<?php

use yii\db\Migration;

/**
 * Class m210429_064836_bonus_user
 */
class m210429_064836_bonus_user extends Migration
{

    const BONUS_USER = '{{%bonus_user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            self::BONUS_USER,
            [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer(11),
                'bonus_id' => $this->integer(11),
                'value' => $this->decimal(10, 2)->defaultValue(0),
                'prize_name' => $this->string(100)->defaultValue(NULL),
                'send' => $this->tinyInteger(1)->defaultValue(0),
                'rejection' => $this->tinyInteger(1)->defaultValue(0),
                'created_at' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()')),
                'updated_at' => $this->dateTime()->defaultValue(NULL),
            ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
        );

        $this->addForeignKey('bonus_type_user_fk', self::BONUS_USER, 'user_id', '{{%user}}', 'id', null, 'cascade');
        $this->addForeignKey('bonus_type_bonus_fk', self::BONUS_USER, 'bonus_id', '{{%bonus}}', 'id', null, 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('bonus_type_user_fk', self::BONUS_USER);
        $this->dropForeignKey('bonus_type_bonus_fk', self::BONUS_USER);
        $this->dropTable(self::BONUS_USER);
    }


}
