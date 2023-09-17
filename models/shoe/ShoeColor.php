<?php

namespace app\models\shoe;

use Yii;

/**
 * This is the model class for table "shoe_color".
 *
 * @property int $id
 * @property string|null $color
 */
class ShoeColor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoe_color';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['color'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Цвет',
        ];
    }

    public function getShoes() 
    {
        return $this->hasMany(Shoe::class,['id_color' => 'id']);
    }
}
