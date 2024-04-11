<?php

namespace app\models;

use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

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
     * @var UploadedFile
     */
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
            [['SKU', 'name', 'count', 'type'], 'required'],
            [['count'], 'integer'],
            [['image', 'SKU', 'name', 'type'], 'string', 'max' => 255],
            [['imageFile'], 'image', 'skipOnEmpty' =>false,'extensions'=>'png, jpg']
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

    public function upload():string {
            \Yii::error('IS METHOD VAL');

            $fileName = (strtolower(Inflector::transliterate($this->imageFile->baseName)));

            $this->image = 'uploads/'. $fileName . '.' . $this->imageFile->extension;


            $this->imageFile->saveAs($this->image);
            return true;

    }

}
