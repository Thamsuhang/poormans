<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use Yii;
    use common\components\HelperPage as HPage;
    use common\components\HelperTeam as HTeam;
    use common\components\HelperSectionContent as HSContent;
    use common\components\HelperTestimonial as HTestimonial;
    use common\components\HelperSlider as HSlider;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;

    /**
     * Site controller
     */
    class AboutController extends Controller {

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
            return ['error' => ['class' => 'yii\web\ErrorAction',]];
        }

        public function beforeAction($action) {
            if ($action->id == 'error')
                $this->layout = 'error';

            return parent::beforeAction($action);
        }

        /**
         * Displays about page.
         *
         * @return mixed
         */
        public function actionIndex() {
            $page_id = 2;
            $datacenter = HPage::getPageContent($page_id);


            return $this->render('index', array('datacenter' => $datacenter));
        }
    }
