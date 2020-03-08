<?php

    namespace common\models;


    class Testimonial extends \common\models\generated\Testimonial {

        public function rules() {
            return [
                [['quote', 'position', 'company', 'client'], 'filter', 'filter' => 'trim'],
            ];
        }


    }
