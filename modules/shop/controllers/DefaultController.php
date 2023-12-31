<?php

namespace app\modules\shop\controllers;

use yii\web\Controller;
use app\models\Product;

/**
 * Default controller for the `shop` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $products = Product::getProductList();

        return $this->render('index', compact(['products']));
    }
}
