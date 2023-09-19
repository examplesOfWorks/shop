<?php

namespace app\modules\shop\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegisterForm;
use app\models\LoginForm;
use yii\bootstrap5\ActiveForm;
use yii\web\Response;

/**
 * Default controller for the `shop` module
 */
class InfoController extends Controller
{
    /**
     * Renders the about view for the module
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Renders the contact view for the module
     * @return string
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

    /**
     * Renders the login view for the module
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);

    }

    /**
     * Renders the register view for the module
     * @return string
     */
    public function actionRegister()
    {
        $model = new RegisterForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ( $model->load(Yii::$app->request->post()) ) {

            if ($user = $model->registerUser()) {
                Yii::$app->user->login($user);
                // Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались.');
                return $this->goHome();
            }
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }
}
