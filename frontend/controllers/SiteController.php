<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use common\components\Email as Email;
    use common\components\Feedback;
    use common\components\HelperDirectory as HDirectory;
    use common\components\HelperPage as HPage;
    use common\components\HelperUser as HUser;
    use common\models\Appointment;
    use common\models\LoginForm;
    use common\models\User;
    use frontend\models\PasswordResetRequestForm;
    use frontend\models\ResetPasswordForm;
    use Yii;
    use yii\base\InvalidParamException;
    use yii\web\BadRequestHttpException;
    use yii\web\Controller;
    use yii\web\HttpException;


    /**
     * Site controller
     */
    class SiteController extends Controller {

        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [];
        }

        /**
         * @inheritdoc
         */
        public function actions() {
            return ['error' => ['class' => 'yii\web\ErrorAction',], 'captcha' => ['class' => 'yii\captcha\CaptchaAction', 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : NULL,],];
        }

        public function beforeAction($action) {
            if ($action->id == 'error')
                $this->layout = 'error';

            return parent::beforeAction($action);
        }

        /**
         * Displays homepage.
         *
         * @return mixed
         */
        public function actionIndex() {
            $page_id = 1;
            $page = 'home';
            //  $categories = HDCategories::getCertainType('parent', 0);
            $datacenter = HPage::getPageContent($page_id);
            $datacenter['featured'] = HDirectory::getFeatured();
            // $datacenter['used_categories'] = HelperDirectoryCategories::getUsedParentCategory();

            return $this->render('index', array(
                // 'categories' => $categories,
                'datacenter' => $datacenter,
                'page'       => $page,
            ));
        }


        /**
         * Logs in a user.
         *
         * @return mixed
         */
        public function actionLogin() {
            if (!\Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->redirect(Yii::$app->request->baseUrl . '/official');
                // return $this->goBack();
            }
            else {
                $user = User::findAnyByUsername($_POST['LoginForm']['username']);
                if ($user) {
                    if ($user->incorrect_login > Yii::$app->params['allowed_incorrect_login']) {
                        Yii::$app->session->setFlash('login_error', "For some security reason, your account has been deactivaed. Please check your email for further information.");
                    }
                    else if ($user->status == 0) {
                        Yii::$app->session->setFlash('login_error', "Your account is inactive now. Please contact the admin for further information.");
                    }
                    else {
                        Yii::$app->session->setFlash('login_error', "Incorrect username or password.");
                    }

                }
                else {
                    Yii::$app->session->setFlash('login_error', "Incorrect username or password.");
                }

                return $this->render('login', ['model' => $model,]);
            }
        }

        /**
         * Logs out the current user.
         *
         * @return mixed
         */
        public function actionLogout() {
            Yii::$app->user->logout();
            return $this->redirect(Yii::$app->request->baseUrl);
        }


        public function actionSignup() {
            if (Yii::$app->request->isAjax && isset($_POST) && !empty($_POST)) {
                $post = $_POST['signup'];
                $receiver = Yii::$app->params['signUpEmail']['receiver'];
                $subject = 'New User Sign Up - Poorman`s Online Directory';
                $message = '<h2>New User Sign Up Request</h2>' .
                    '<h3 style="margin-top:30px; text-decoration:underline">General Details</h3>' .
                    '<p>Name: ' . $post['name'] . '<br />' .
                    'Address: ' . $post['address'] . '<br />' .
                    'Email: ' . $post['email'] . '<br />' .
                    'City: ' . $post['city'] . '<br />' .
                    'State: ' . $post['state'] .
                    '<h3 style="margin-top:30px; text-decoration:underline">Card Details</h3>' .
                    'Card Holder`s Name: ' . $post['card-name'] . '<br />' .
                    'Card Type: ' . $post['card-type'] . '<br />' .
                    'Card Number: ' . $post['card-number'] . '<br />' .
                    'Card CVC: ' . $post['card-cvc'] . '<br />' .
                    'Card Expiry: ' . $post['card-expiry'] . '<br />' .
                    'Card Holder`s Billing Address: ' . $post['card-address'] .
                    '</p>';
                if (Email::sendTo($receiver, $post['name'], $subject, $message)) {
                    return json_encode(TRUE);
                }
                else {
                    return json_encode(FALSE);
                }
                die;
            }
        }


        /**
         * Requests password reset.
         *
         * @return mixed
         */
        public function actionRequestPasswordReset() {
            $model = new PasswordResetRequestForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->sendEmail()) {
                    echo json_encode(array('response' => 'Check your email for further instructions.'));
                    die;
                }
                else {
                    echo json_encode(array('response' => 'Sorry, we are unable to reset password for email provided.'));
                    die;
                }
            }
            echo json_encode(array('response' => 'Sorry, this is not a registered email.'));
            die;
        }


        public function actionCheckUserUsername() {
            if (isset($_GET['signup']['username']) && $_GET['signup']['username'] != NULL && Yii::$app->request->isAjax) {
                $check = HUser::checkUser($_GET['signup']['username'], 0, 'username');
                if ($check == FALSE) {
                    echo json_encode(TRUE);
                    die;
                }
            }
            echo json_encode(FALSE);
            die;
        }

        public function actionValidate($string) {

        }


        /*****************************************************************/


        /**
         * Requests password reset.
         *
         * @return mixed
         */
        public function actionRequestPasswordResetX() {
            throw new HttpException(404, 'Page not found.');
            die;
            $model = new PasswordResetRequestForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->sendEmail()) {
                    Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                    return $this->goHome();
                }
                else {
                    Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
                }
            }

            return $this->render('requestPasswordResetToken', ['model' => $model,]);
        }

        /**
         * Resets password.
         *
         * @param string $token
         * @return mixed
         * @throws BadRequestHttpException
         */
        public function actionResetPasswordX($token) {
            throw new HttpException(404, 'Page not found.');
            die;
            try {
                $model = new ResetPasswordForm($token);
            } catch (InvalidParamException $e) {
                throw new BadRequestHttpException($e->getMessage());
            }

            if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
                Yii::$app->session->setFlash('success', 'New password was saved.');

                return $this->goHome();
            }

            return $this->render('resetPassword', ['model' => $model,]);
        }

        /*************************************************************************/

        public function actionAppointment() {
            //print_r($_POST);die;
            if (Yii::$app->request->isAjax) {
                $model = new Appointment();
                $model->name = isset($_POST['name']) ? $_POST['name'] : '';
                $model->email = isset($_POST['email']) ? $_POST['email'] : '';
                $model->comment = isset($_POST['message']) ? $_POST['message'] : '';
                $model->created_on = date('Y-m-d H:i:s');
                if ($model->save()) {
                    $appointment = Email::sendFrom($_POST['email'], $_POST['name'], 'Appoinment Request', $_POST['message']);
                    if ($appointment) {
                        echo json_encode(TRUE);
                        die;
                    }
                }
            }
            echo json_encode(FALSE);
            die;
        }

    }
