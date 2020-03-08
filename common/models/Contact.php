<?php

namespace common\models;

use Yii;


class Contact extends \common\models\generated\Contact
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'subtitle', 'description', 'phone', 'fax', 'email', 'url', 'city'], 'filter', 'filter' => 'trim'],
            [['email'], 'filter', 'filter' => 'strtolower'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'description' => 'Description',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'email' => 'Email',
            'url' => 'Url',
        ];
    }
}
