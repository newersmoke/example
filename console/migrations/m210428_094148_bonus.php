<?php

use yii\db\Migration;

/**
 * Class m210428_094148_bonus
 */
class m210428_094148_bonus extends Migration
{

    const BONUS = '{{%bonus}}';

    const DATA = [
        [
            'name' => 'Денежный приз',
            'code' => 'money'
        ],
        [
            'name' => 'Приз',
            'code' => 'prize'
        ],
        [
            'name' => 'Очки лояльности',
            'code' => 'points'
        ]
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // На Postgre is_active поставил бы boolean
        $this->createTable(
            self::BONUS,
                [
                    'id' =>  $this->primaryKey(),
                    'name' => $this->string(100),
                    'code' => $this->string(100),
                    'is_active' => $this->tinyInteger(1)->defaultValue(1)
                ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
        );

        $this->createIndex('bonus_code_uix', self::BONUS, 'code', true);

        foreach (self::DATA as $row){
            $this->insert(self::BONUS, $row);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::BONUS);
    }

}
