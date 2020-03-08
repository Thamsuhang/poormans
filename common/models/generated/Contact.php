<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property double $latitude
 * @property string $longitude
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $url
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'subtitle', 'description'], 'required'],
            [['title', 'subtitle', 'description', 'phone', 'fax', 'email', 'url'], 'string'],
            [['latitude'], 'number'],
            [['longitude', 'address'], 'string', 'max' => 100],
            [['city', 'state'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
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
