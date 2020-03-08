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
    use common\components\HelperDirectoryCategories as HDCategories;

    /**
     * ContactUs controller
     */
    class PricingController extends Controller {

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

            $page_id = 1;
            $categories = HDCategories::getCertainType('parent', 0);
            $datacenter = HPage::getPageContent($page_id);
            return $this->render('index', array(
                'datacenter' => $datacenter,
                'categories' => $categories
            ));
        }


    }
