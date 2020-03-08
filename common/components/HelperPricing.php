<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Page
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use Yii;
    use yii\base\Component;
    use common\components\Query;
    use common\components\Misc;
    use common\models\PricingPlan as Pricing;


    class HelperPricing extends Component {
        public function getPricingPackages(){
            $data = Yii::$app->params['package'];
            return Misc::exists($data, FALSE);
        }






    }