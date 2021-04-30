<?php

namespace app\widgets;

use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $data;
    public function run()
    {
        $this->data = new Category();
        $this->data = $this->data->getCategories(); //rewrite object
        $this->data = $this->categoryToTemplate($this->data); //bufferize html code from menu.php
        return $this->data;
    }

    public function categoryToTemplate($data)
    {
        ob_start();
        include __DIR__ . '/template/menu.php';
        return ob_get_clean();
    }
}
