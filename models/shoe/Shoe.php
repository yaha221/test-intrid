<?php

namespace app\models\shoe;

use Yii;
use app\models\repositories\DataRepository;

/**
 * This is the model class for table "shoe".
 *
 * @property int $id
 * @property int $id_model
 * @property int|null $id_size
 * @property int|null $id_color
 * @property int|null $price
 * @property int|null $count
 * @property string|null $vendor_code
 */
class Shoe extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_model'], 'required'],
            [['id_model', 'id_size', 'id_color', 'price', 'count'], 'integer'],
            [['vendor_code'], 'string', 'max' => 50],
            [['vendor_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'id_model' => 'Модель',
            'id_size' => 'Размер',
            'id_color' => 'Цвет',
            'price' => 'Цена',
            'count' => 'Количество',
            'vendor_code' => 'Артикул',
        ];
    }

    public function getModel() 
    {
        return $this->hasOne(ShoeModel::class,['id' => 'id_model']);
    }

    public function getColor() 
    {
        return $this->hasOne(ShoeColor::class,['id' => 'id_color']);
    }

    public function getSize() 
    {
        return $this->hasOne(ShoeSize::class,['id' => 'id_size']);
    }
}
