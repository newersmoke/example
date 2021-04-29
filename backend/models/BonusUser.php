<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%bonus_user}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $bonus_id
 * @property float|null $value
 * @property string|null $prize_name
 * @property int|null $send
 * @property int|null $rejection
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Bonus $bonus
 * @property User $user
 */
class BonusUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bonus_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'bonus_id', 'send', 'rejection'], 'integer'],
            [['value'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['prize_name'], 'string', 'max' => 100],
            [['bonus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bonus::className(), 'targetAttribute' => ['bonus_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'user_id' => Yii::t('model', 'User ID'),
            'bonus_id' => Yii::t('model', 'Bonus ID'),
            'value' => Yii::t('model', 'Value'),
            'prize_name' => Yii::t('model', 'Prize Name'),
            'send' => Yii::t('model', 'Send'),
            'rejection' => Yii::t('model', 'Rejection'),
            'created_at' => Yii::t('model', 'Created At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Bonus]].
     *
     * @return \yii\db\ActiveQuery|BonusQuery
     */
    public function getBonus()
    {
        return $this->hasOne(Bonus::className(), ['id' => 'bonus_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return BonusUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BonusUserQuery(get_called_class());
    }
}
