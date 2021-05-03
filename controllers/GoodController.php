<?php

namespace app\controllers;

use app\models\Good;
use yii\web\Controller;

class GoodController extends Controller
{
    public function actionIndex(string $name) //return page of one good
    {
        $good = new Good();
        $good = $good->getOneGood($name);
        $this->view->title = ucwords($good['name']);
        return $this->render('index', compact('good'));
    }
}
