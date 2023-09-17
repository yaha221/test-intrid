<?php

namespace app\models\repositories;

use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * Набор методов для обращения к базе данных.
*/
class DataRepository
{
    /**
     * Находит имена пользователей совпадающие с введённым
     * 
     * @param string $username
     * @return array имена
     */
    public function findUsersByUsername($username)
    {
        $query = (new Query())
            ->select('id, username AS text')
            ->from('user')
            ->where(['like', 'username', $username]);

        return $query->createCommand()->queryAll();
    }

    /**
     * Находит имена пользователей совпадающие с введённым для формы админа
     * 
     * @param string $username
     * @return array имена
     */
    public function findUsersByUsernameForUsers($username)
    {
        $query = (new Query())
            ->select('username AS id, username AS text')
            ->from('user')
            ->where(['like', 'username', $username]);

        return $query->createCommand()->queryAll();
    }

    /**
     * Находит все ip входа пользователей совпадающие с введённым
     * 
     * @param string $lastLoginIp
     * @return array ip входа
     */
    public function findUsersByLastLoginIp($lastLoginIp)
    {
        $query = (new Query())
            ->select('last_login_ip AS id, last_login_ip AS text')
            ->from('user')
            ->where(['like', 'last_login_ip', $lastLoginIp]);

        return $query->createCommand()->queryAll();
    }

    /**
     * Находит ip регистрации пользователей совпадающие с введённым
     * 
     * @param string $registerIp
     * @return array ip регистрации
     */
    public function findUsersByRegisterIp($registerIp)
    {
        $query = (new Query())
            ->select('register_ip AS id, register_ip AS text')
            ->from('user')
            ->where(['like', 'register_ip', $registerIp]);

        return $query->createCommand()->queryAll();
    }

    /**
     * Находит ip регистрации пользователей совпадающие с введённым
     * 
     * @param string $email
     * @return array ip регистрации
     */
    public function findUsersByEmail($email)
    {
        $query = (new Query())
            ->select('email AS id, email AS text')
            ->from('user')
            ->where(['like', 'email', $email]);

        return $query->createCommand()->queryAll();
    }

    /**
     * Находит имя пользователя по ид
     * 
     * @param integer $id
     * @return array имя
     */
    public function findUsernameById($id)
    {
        $query = (new Query())
            ->select('username')
            ->from('user')
            ->where(['id' => $id])
            ->one();

        return $query;
    }

    /**
     * Находит все имена
     * 
     * @return array имена
     */
    public function findUsernames()
    {
        $query = (new Query())
            ->select(['id','username'])
            ->from('user')
            ->all();

        $result = ArrayHelper::map($query, 'id', 'username');

        return $result;
    }

    /**
     * Находит все имена для формы админа
     * 
     * @return array имена
     */
    public function findUsernamesForUsers()
    {
        $query = (new Query())
            ->select(['username'])
            ->from('user')
            ->all();

        $result = ArrayHelper::map($query, 'username', 'username');

        return $result;
    }

    /**
     * Находит все имена
     * 
     * @return array имена
     */
    public function findEmails()
    {
        $query = (new Query())
            ->select(['email'])
            ->from('user')
            ->all();

        $result = ArrayHelper::map($query, 'email', 'email');

        return $result;
    }

    /**
     * Находит все ip входа
     * 
     * @return array ip входа
     */
    public function findLastLoginIp()
    {
        $query = (new Query())
            ->select(['last_login_ip'])
            ->from('user')
            ->all();

        $result = ArrayHelper::map($query, 'last_login_ip', 'last_login_ip');

        return $result;
    }

    /**
    * Находит все ip регистрации
    * 
    * @return array ip регистрации
    */
   public function findRegisterIp()
   {
        $query = (new Query())
            ->select(['register_ip'])
            ->from('user')
            ->all();

        $result = ArrayHelper::map($query, 'register_ip', 'register_ip');

       return $result;
   }

    public function findShoeSize() {
        $query = (new Query())
        ->select(['id','size'])
        ->from('shoe_size')
        ->all();

        $result = ArrayHelper::map($query,'id','size');
        
        return $result;
    }

    public function findShoeColor() {
        $query = (new Query())
        ->select(['id','color'])
        ->from('shoe_color')
        ->all();
        
        $result = ArrayHelper::map($query,'id','color');

        return $result;
    }

    public function findShoeModel() {
        $query = (new Query())
        ->select(['id','model'])
        ->from('shoe_model')
        ->all();

        $result = ArrayHelper::map($query,'id','model');
        
        return $result;
    }

    /**
     * Находит модель обуви совпадающую с введённым в форме
     * 
     * @param string $model
     * @return array имена
     */
    public function findShoeByModel($model)
    {
        $query = (new Query())
            ->select('id, model AS text')
            ->from('shoe_model')
            ->where(['like', 'model', $model]);

        return $query->createCommand()->queryAll();
    }

    /**
     * Находит цвет обуви совпадающий с введённым в форме
     * 
     * @param string $color
     * @return array имена
     */
    public function findShoeByColor($color)
    {
        $query = (new Query())
            ->select('id, color AS text')
            ->from('shoe_color')
            ->where(['like', 'color', $color]);

        return $query->createCommand()->queryAll();
    }
}