<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Good extends ActiveRecord
{
    public static function tableName()
    {
        return 'good';
    }

    public function getAllGoods()
    {
        $goods = Yii::$app->cache->get('goods'); //check info in cache
        if (!$goods) {
            $goods = Good::find()->asArray()->all(); //go to db and get everything
            Yii::$app->cache->set('goods', $goods, 30); //set cache (key, var(what is needed to be cached), time)
        }
        return $goods;
    }
}
