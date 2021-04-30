<?php

namespace app\models;

use yii\db\ActiveRecord;

class Good extends ActiveRecord
{
    public static function tableName()
    {
        return 'good';
    }

    public function getAllGoods()
    {
        $goods = Good::find()->asArray()->all(); //go to db and get everything
        return $goods;
    }
}
