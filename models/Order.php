<?php

namespace app\models;

use Yii;
use app\models\Status;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property int $status_id
 * @property int $count
 * @property int $sum
 * @property string $reason
 *
 * @property OrderItem[] $orderItems
 * @property Status $status
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    const REASON_CREATE = 'reason_create';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status_id', 'count', 'sum'], 'required'],
            [['user_id', 'status_id', 'count', 'sum'], 'integer'],
            [['reason'], 'string', 'max' => 255],
            [['reason'], 'required', 'on'=>static::REASON_CREATE],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер заказа',
            'user_id' => 'ФИО заказчика',
            'status_id' => 'Статус',
            'count' => 'Количество заказанных товаров',
            'sum' => 'Сумма',
            'reason' => 'Причина отмены',
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function orderCreate($cart) 
    {
        $this->user_id = Yii::$app->user->id;
        $this->status_id = Status::getStatusById('Новый');
        $this->count = $cart['count'];
        $this->sum = $cart['sum'];

        return $this->save();
    }
}
