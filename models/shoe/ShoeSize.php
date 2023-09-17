<?php

namespace app\models\shoe;

use Yii;

/**
 * This is the model class for table "shoe_size".
 *
 * @property int $id
 * @property int|null $size
 */
class ShoeSize extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoe_size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Размер',
        ];
    }

    public function getShoes() 
    {
        return $this->hasMany(Shoe::class,['id_size' => 'id']);
    }
}
