<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $type_id
 * @property string $title
 * @property int $price
 * @property int $count
 * @property string $color
 * @property string $size
 * @property string $description
 * @property string $photo
 *
 * @property OrderItem[] $orderItems
 * @property Types $type
 */
class Product extends \yii\db\ActiveRecord
{
    const PRODUCT_CREATE = 'product_create';
    const PRODUCT_UPDATE = 'product_update';

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'title', 'price', 'count', 'color', 'size', 'description'], 'required'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'on'=>static::PRODUCT_CREATE],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'on'=>static::PRODUCT_UPDATE],
            [['type_id', 'price', 'count'], 'integer'],
            [['description'], 'string'],
            [['title', 'color', 'size', 'photo'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Types::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Группа товара',
            'title' => 'Название',
            'price' => 'По цене',
            'count' => 'Количество',
            'color' => 'Цвет',
            'size' => 'Размер',
            'description' => 'Описание',
            'photo' => 'Изображение',
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Types::class, ['id' => 'type_id']);
    }

    /**
     * Получение списка товаров
     */
    public static function getProductList()
    {
        return static::find()
            ->select(['photo', 'title'])
            ->where(['>', 'count', 0])
            ->asArray()
            ->all();
    }

    public function upload()
    {
        if ($this->validate()) {
            $fileName = Yii::$app->user->id . '_' . time() . '.' . 
            $this->imageFile->extension;
            $this->imageFile->saveAs(Yii::getAlias('@app') . '/web/img/' . $fileName);
            $this->photo = $fileName;
            return $fileName;
        } else {
            return false;
        }
    }
}
