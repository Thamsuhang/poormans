<?php
/*
 * @author Chetan Rajbhandari
 */
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use frontend\models\ResetPasswordForm;
use common\components\Misc;

/**
 * Site controller
 */
class VerificationController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() 
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function actions() 
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        if ($action->id == 'error')
            $this->layout = 'error';

        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() 
    {
        return $this->goHome();
    }

    public function actionEmail($username, $token) 
    {
        $verified = false;
        $user = User::findByUsername(Misc::strip_tags($username));
        if ($user) {
            if ($user->auth_key === Misc::strip_tags($token)) {
                $user->auth_key = '';
                $user->update();
                $verified = true;
            }  
            return $this->render('verify_email', [
                                'verified' => $verified,
            ]);         
        }
        throw new HttpException(404, 'Page not found.');
    }

    public function actionPassword($username, $token) 
    {
        $verified = false; 
        $user = User::findAnyByUsername(Misc::strip_tags($username)); 
        if ($user) {
            if ($user->password_reset_token === Misc::strip_tags($token)) {
                $verified = true;
            }           
            return $this->render('reset_password', [
                                'verified' => $verified,
                                'user' => $user,
            ]);
        }
        throw new HttpException(404, 'Page not found.');
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword() 
    {
        $token = $_POST['key'];

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            echo Misc::json_encode(array('response' => 'New password was saved.', 'status' => 'success')); die;   
        }
        echo Misc::json_encode(array('response' => 'Sorry! cound not update your password at this moment.', 'status' => 'failed')); die;
    }
}
