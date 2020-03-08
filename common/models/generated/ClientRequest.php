<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "client_request".
 *
 * @property double $id
 * @property string $package_id
 * @property int $category_id
 * @property string $card
 * @property string $disp_add
 * @property string $name
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $url
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $owner_name
 * @property string $owner_num
 * @property string $owner_zip
 * @property string $owner_email
 * @property int $is_featured
 * @property int $is_active
 * @property string $created_on
 */
class ClientRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_id', 'name'], 'required'],
            [['category_id', 'is_featured', 'is_active'], 'integer'],
            [['name', 'phone', 'fax', 'email', 'url', 'address', 'city', 'state'], 'string'],
            [['created_on'], 'safe'],
            [['package_id'], 'string', 'max' => 12],
            [['card'], 'string', 'max' => 256],
            [['disp_add'], 'string', 'max' => 100],
            [['owner_name'], 'string', 'max' => 60],
            [['owner_num'], 'string', 'max' => 30],
            [['owner_zip', 'owner_email'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_id' => 'Package ID',
            'category_id' => 'Category ID',
            'card' => 'Card',
            'disp_add' => 'Disp Add',
            'name' => 'Name',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'email' => 'Email',
            'url' => 'Url',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'owner_name' => 'Owner Name',
            'owner_num' => 'Owner Num',
            'owner_zip' => 'Owner Zip',
            'owner_email' => 'Owner Email',
            'is_featured' => 'Is Featured',
            'is_active' => 'Is Active',
            'created_on' => 'Created On',
        ];
    }
}
