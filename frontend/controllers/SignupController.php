<?php
/*
 * @author Chetan Rajbhandari
 */

namespace frontend\controllers;

use common\components\Email;
use common\components\HelperSignup as HSignup;
use common\components\HelperDirectoryCategories;
use common\components\HelperSignUp;
use common\components\HelperUpload as Upload;
use common\components\Misc;
use common\models\Directory;
use Yii;
use yii\web\Controller;

class SignupController extends Controller {

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
     * Displays Sign Up page.
     *
     * @return mixed
     */
    public function actionIndex($type) {

        //        if (!($type == 'basic' || $type == 'premium' || $type == 'card' || $type == 'featured')) {
        //            return $this->redirect(Yii::$app->request->baseUrl . '/pricing');
        //        }
        $packages = Yii::$app->params['packages'];
        return $this->render('index', [
                'categories' => HelperDirectoryCategories::getTypes(),
                'type'       => $type,
        ]);
    }

    public function actionCheckout() {
        $details = HSignup::calculateCheckout(Yii::$app->request->post(), (isset($_FILES['card']) && !empty($_FILES['card'])) ? $_FILES['card'] : '', (isset($_FILES['disp_add']) && !empty($_FILES['disp_add'])) ? $_FILES['disp_add'] : '', (isset($_FILES['coupon']) && !empty($_FILES['coupon'])) ? $_FILES['coupon'] : '');
        return $this->render('checkout', [
                'category' => $details['category'],
                'coupon' => $details['coupon'],
                'disp_add' => $details['disp_add'],
                'card' => $details['card'],
                'user_info' => $details['user_info'],
                'totals'   => $details['totals'],
                'package'  => $details['package'],
                'add_info' => $details['add_info']
                //                'totals' => $totals['grand-total'],
        ]);
    }
//    public function actionPlaceOrder() {
//        $orders = false;
//        if (!empty($_POST['business']) && isset($_POST['business'])) {
//            $orders = HelperSignUp::signUp(Yii::$app->request->post(),(isset($_POST['business']['card']) && !empty($_POST['business']['card'])) ? $_POST['card'] : '',(isset($_POST['disp_add']) && !empty($_POST['business']['disp_add'])) ? $_POST['business']['disp_add'] : '',(isset($_POST['business']['coupon']) && !empty($_POST['business']['coupon'])) ? $_POST['business']['coupon'] : '');
//
//            die;
//        }
//        if ($orders == false) {
//            Misc::setFlash('error', 'Sorry, Order not placed. Please Try again, Later.');
//            $this->redirect(\Yii::$app->request->baseUrl . '/cart/checkout');
//        }
//        \Yii::$app->session->setFlash('orders', json_encode($orders));
//        HelperOrders::emptyCart();
//        $this->redirect(\Yii::$app->request->baseUrl . '/cart/success');
//    }
    public function actionUpdate() {

        if (isset($_POST) && !empty($_POST)) {
            $post = Yii::$app->request->post();

//            echo '<pre>';
//            print_r($_FILES['coupon']);
//            echo '</pre>';
//            die;
            $post = HSignup::signUp($post, (isset($_FILES['card']) && !empty($_FILES['card'])) ? $_FILES['card'] : '', (isset($_FILES['disp_add']) && !empty($_FILES['disp_add'])) ? $_FILES['disp_add'] : '', (isset($_FILES['coupon']) && !empty($_FILES['coupon'])) ? $_FILES['coupon'] : '');
            if ($post == false) {
                echo 'Not Working';
            }


            return $this->redirect(Yii::$app->request->baseUrl . '/pricing');
        }


    }
}