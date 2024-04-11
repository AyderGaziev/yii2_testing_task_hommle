<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $image
 * @property string $SKU
 * @property string $name
 * @property int $count
 * @property string $type
 */
class Product extends \yii\db\ActiveRecord
{
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
            [['image', 'SKU', 'name', 'count', 'type'], 'required'],
            [['count'], 'integer'],
            [['image', 'SKU', 'name', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'image' => 'Изображение',
            'SKU' => 'SKU',
            'name' => 'Имя',
            'count' => 'Кол-во на складе',
            'type' => 'Тип товара',
        ];
    }
}
