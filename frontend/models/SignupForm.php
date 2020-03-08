<?php
namespace frontend\models;

use Yii;
use yii\helpers\Html;
use yii\base\Model;
use common\models\User;
use common\models\Users;
use common\components\Email;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $users = new Users();
            $users->name            = $this->username;
            $users->email           = $this->email;
            $users->created_on      = date('Y-m-d H:i:s');
            $users->created_by      = 0;
            $users->last_updated    = date('Y-m-d H:i:s');
            $users->has_uploads     = 0;
            $users->is_active       = 1;
            $users->is_verified     = 0;
            $users->save();

            $user = new User();
            $user->username         = $this->username;
            $user->name             = $this->username;
            $user->role             = Yii::$app->params['user_role']['client'];
            $user->user_id          = $users->id;
            $user->email            = $this->email;
            $user->pin              = rand(1000, 9999);
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    public function sendEmail($user)
    {
        $msg = "Click this link ".Html::a('confirm', Yii::$app->request->baseUrl.'/verification/email/'.$user->username . '/' . $user->auth_key);

        return Email::sendTo($user->email, Yii::$app->name, 'Signup Email Verification For ' . Yii::$app->name, $msg);
        /*
        return Yii::$app->mail->compose()
                ->setTo($user->email)
                ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'])
                ->setSubject('Signup Confirmation')
                ->setTextBody("Click this link ".Html::a('confirm',
                    Yii::$app->request->baseUrl.'/verification/email/'.$user->username . '/' . $user->auth_key))
                ->send();
        */
    }
}
