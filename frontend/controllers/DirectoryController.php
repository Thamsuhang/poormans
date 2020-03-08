<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use common\components\HelperDirectory as HDirectory;
    use common\components\HelperDirectoryCategories as HDCategories;
    use common\components\HelperSettings as HSet;
    use common\components\HelperTestimonial as HTestimonial;
    use Yii;
    use yii\web\Controller;

    //use common\components\HelperDirectoryType as HPortType;

    /**
     * Site controller
     */
    class DirectoryController extends Controller {

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
            $page_id = 4;
            $d_categories = HDCategories::getCertainType('parent', 0);
            $datacenter['used_categories'] = HDCategories::getUsedParentCategory();

            return $this->render('index', array(
                'd_categories' => $d_categories,
                'datacenter'   => $datacenter,
            ));
        }
        
         public function actionCategories() {
            return $this->render('categories', array(
                'categories' => HelperDirectoryCategories::getTypes(),
                'parent_cat' => HelperDirectoryCategories::getCertainType('parent', 0),
            ));
        }

        public function actionList($string = '') {
            if ($string != '') {
                return $this->render('list', array(
                    'data' => HDCategories::listedCategories($string),
                    'id'   => $string,
                ));
            }
           return $this->redirect(Yii::$app->request->baseUrl . '/directory');
        }


    }
