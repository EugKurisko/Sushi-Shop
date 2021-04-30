<?php

namespace app\controllers;

use app\models\Good;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $goods = new Good(); //create instance of good model
        $goods = $goods->getAllGoods(); //rewrite var to get everything grom db
        return $this->render('index', compact('goods'));
    }
}
