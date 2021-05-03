<?php

namespace app\controllers;

use app\models\Good;
use yii\web\Controller;
use yii;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = 'All goods';
        $goods = new Good(); //create instance of good model
        $goods = $goods->getAllGoods(); //rewrite var to get everything grom db
        return $this->render('index', compact('goods'));
    }

    public function actionView($category)
    {
        $catGoods = new Good();
        $catGoods = $catGoods->getGoodsCategories($category);
        $this->view->title = ucwords($catGoods[0]['category']);
        return $this->render('view', compact('catGoods'));
    }

    public function actionSearch()
    {
        $search = htmlspecialchars(Yii::$app->request->get('search')); //get data from input with name 'search' passed as $_GET 
        $goods = new Good();
        $goods = $goods->getSearchResults($search);
        $this->view->title = "Результаты поиска: $search";
        return $this->render('search', compact('goods', 'search'));
    }
}
