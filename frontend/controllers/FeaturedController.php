<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use common\components\HelperFeatured as HFeatured;
    use Yii;
    use yii\web\Controller;

    //use common\components\HelperFeaturedType as HPortType;

    /**
     * Site controller
     */
    class FeaturedController extends Controller {

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

            //            $page_id = 3;
            //            $datacenter = HPage::getPageContent($page_id);
            //            $datacenter['featured'] = HDirectory::getFeaturedIndex();
            //            $datacenter['used_categories'] = HDCategories::getUsedParentCategory();
            //            //$d_categories = HDCategories::getCertainType('parent', 0);
            //            $datacenter['parent_categories'] = HDCategories::getCertainType('parent', 0);
            //            echo '<pre>';
            //            print_r(  $datacenter['parent_categories']);
            //            die;
            //            return $this->render('index', array(
            //                //'d_categories' => $d_categories,
            //                'datacenter'   => $datacenter,
            //            ));
            $this->redirect(Yii::$app->request->baseUrl . '/categories');
        }
    }
