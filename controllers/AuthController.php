<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 26.03.18
 * Time: 8:55
 */

namespace app\controllers;


use app\models\SignupForm;
use yii\web\Controller;
use Yii;
use app\models\User;
use app\models\LoginForm;

class AuthController extends Controller {
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionSignup()
    {
        $model = new SignupForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                return $this->redirect(['auth/login']);
            }
        }

        return $this->render('signup', ['model'=>$model]);
    }


    public function actionTest() {
        $user = User::findOne(1);

        Yii::$app->user->logout();
//        Yii::$app->user->login($user);
        if (Yii::$app->user->isGuest) {
            echo 'Авторизирован';
        } else {
            echo 'Не авторизирован';
        }
    }
}