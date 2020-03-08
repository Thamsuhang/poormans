<?php

    namespace backend\controllers;

    use common\components\Misc;
    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use common\models\LoginForm;
    use yii\filters\VerbFilter;
    use common\models\User;
    use common\components\HelperPricing as HPricing;

    /**
     * Site controller
     */
    class PricingController extends Controller {

        public function behaviors() {
            return [
                // 'access' => [
                //     'class' => AccessControl::className(),
                //     'only' => ['logout'],
                //     'rules' => [
                //         [
                //             'actions' => ['logout'],
                //             'allow' => true,
                //             'roles' => ['@'],
                //         ],
                //     ],
                // ],
                // 'verbs' => [
                //     'class' => VerbFilter::className(),
                //     'actions' => [
                //         //'logout' => ['post'],
                //     ],
                // ],
            ];
        }

        public function beforeAction($action) {
            $this->layout = "main";
            if ($action->id == 'error')
                $this->layout = 'error';

            return parent::beforeAction($action);
        }

        public function actions() {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ]
            ];
        }

        public function actionIndex() {
            $datacenter['pricing'] = [
                'packages' => Misc::exists(HPricing::getPricingPackages(), ''),
                'objects'  => Misc::exists(HPricing::getPricingObjects(), ''),
                'plans'    => array(),
                'others' => Misc::exists(HPricing::getMiscPlans(),'')
            ];
            $pricing_table = Misc::exists(HPricing::getPricingTable(), '');
            foreach ($pricing_table as $item) {
                $datacenter['pricing']['plan'][$item['package_id']][] = $item;
            }


            return $this->render('index', [
                'datacenter' => $datacenter
            ]);
        }


    }
