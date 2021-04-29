<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%bonus}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property int|null $is_active
 */
class Bonus extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bonus}}';
    }

    /**
     * {@inheritdoc}
     * @return BonusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BonusQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['name', 'code'], 'string', 'max' => 100],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'name' => Yii::t('model', 'Name'),
            'code' => Yii::t('model', 'Code'),
            'is_active' => Yii::t('model', 'Is Active'),
        ];
    }
}
