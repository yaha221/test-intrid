<?php

namespace app\models\shoe;

use Yii;

/**
 * This is the model class for table "shoe_model".
 *
 * @property int $id
 * @property string $model
 */
class ShoeModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoe_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model'], 'required'],
            [['model'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Модель',
        ];
    }

    public function getShoes() 
    {
        return $this->hasMany(Shoe::class,['id_model' => 'id']);
    }
}
