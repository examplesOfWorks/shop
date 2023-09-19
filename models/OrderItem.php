<?php

namespace app\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $count
 * @property int $sum
 *
 * @property Order $order
 * @property Product $product
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'count', 'sum'], 'required'],
            [['order_id', 'product_id', 'count', 'sum'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
            'sum' => 'Sum',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public static function orderItemCreate($cart, $id)
    {
        // VarDumper::dump($cart, 10, true);
        //         die;
        foreach ($cart['products'] as $val) {

            if ($product = Product::findOne($val['id'])) {

                $order_product = new static();

                // VarDumper::dump($val->errors, 10, true);
                // die;

                $order_product->order_id = $id;
                $order_product->product_id = $val['id'];
                // $order_product->title = $val['title'];
                // $order_product->price = $val['price'];
                $order_product->count = $val['count'];
                $order_product->sum = $val['sum'];

                if ($res = $order_product->save()) {
                    $product->count -= $val['count'];
                    $res = $product->save();
                }

                if (!$res) {
                    return $res;
                }

            }
        }
        return true;
    }   

    public static function getItemsList($order_id) 
    {
        return static::find()
            ->join('LEFT JOIN','product','product.id = order_item.product_id')
            ->select(['order_item.id', 'title', 'price', 'order_id', 'order_item.count', 'sum'])
            ->where(['order_id' => $order_id])
            ->asArray()
            ->all();
    }
}
