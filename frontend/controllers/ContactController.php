<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use Yii;
    use common\components\HelperPage as HPage;
    use common\components\HelperSettings as HSettings;
    use common\components\HelperSectionContent as HSContent;
    use frontend\models\ContactForm;
    use common\models\Message;
    use common\components\Query;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;

    /**
     * ContactUs controller
     */
    class ContactController extends Controller {

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
            return [
                'error'   => [
                    'class' => 'yii\web\ErrorAction',
                ],
                'captcha' => [
                    'class'           => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                ],
            ];
        }

        public function beforeAction($action) {
            if ($action->id == 'error')
                $this->layout = 'error';

            return parent::beforeAction($action);
        }

        /**
         * Displays contact us page.
         *
         * @return mixed
         */
        public function actionIndex() {

            $page_id = 5;

            $datacenter = HPage::getPageContent($page_id);
            return $this->render('index', array(
                'datacenter' => $datacenter
            ));
        }

        public function actionMessage() {
            if (Yii::$app->request->isAjax) {
                $message = new Message();
                $message->name = (isset($_POST['name']) && $_POST['name'] != null) ? $_POST['name'] : '';
                $message->email = (isset($_POST['email']) && $_POST['email'] != null) ? $_POST['email'] : '';
                $message->message = (isset($_POST['message']) && $_POST['message'] != null) ? $_POST['message'] : '';
                $message->created_on = date('Y-m-d H:i:s');
                if ($message->save(false)) {
                    echo json_encode(TRUE);
                    die;
                }
            }
            echo json_encode(FALSE);
            die;
        }
    }
