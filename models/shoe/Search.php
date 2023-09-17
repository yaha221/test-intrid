<?php

namespace app\models\shoe;

use yii\base\Model;
use app\models\shoe\Shoe;
use yii\data\ActiveDataProvider;

class Search extends Model
{
    public $id_model;
    public $id_size;
    public $id_color;


    /**
     * @return array правила валидации
     */
    public function rules()
    {
        return[
            [['id_model', 'id_size', 'id_color' ], 'safe',],
        ];
    }

    /**
     * Фильтрация обуви
     * 
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Shoe::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        $this->load($params);

        if($this->validate() === false) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_model' => $this->id_model,
            'id_size' => $this->id_size,
            'id_color' => $this->id_color,
            ]);

        return $dataProvider;
    }
}