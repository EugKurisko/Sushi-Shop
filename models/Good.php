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

    public function getGoodsCategories(string $category)
    {
        $catGoods = Yii::$app->cache->get("catGoods[$category]");
        if (!$catGoods) {
            $catGoods = Good::find()->where(['category' => $category])->asArray()->all();
            Yii::$app->cache->set("catGoods[$category]", $catGoods, 30);
        }
        return $catGoods;
    }
    public function getSearchResults(string $search)
    {
        $searchResult = Good::find()->where(['like', 'name', $search])->asArray()->all();
        //like == similar
        //name -> where to find, search -> what to find
        return $searchResult;
    }
}
