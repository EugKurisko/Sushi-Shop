<?php

namespace app\models;

use app\models\OrderGood;
use Yii;

class Order extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['email'], 'email'],
            [['name', 'email', 'phone', 'address', 'status'], 'string', 'max' => 255],
        ];
    }

    public function getOrderGoods() //bind two db tables
    {
        return $this->hasMany(OrderGood::class, ['order_id' => 'id']); //bind order_id with id from in two tables
        //hasMany -> relation one to many 
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }
}
