<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "directory".
 *
 * @property int $id
 * @property int $user_id
 * @property string $package
 * @property int $category_id
 * @property string $card
 * @property string $disp_add
 * @property string $coupon
 * @property string $name
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $url
 * @property string $address
 * @property string $zip
 * @property string $city
 * @property string $state
 * @property string $tags
 * @property string $description
 * @property string $owner_name
 * @property string $owner_num
 * @property string $owner_zip
 * @property string $owner_email
 * @property int $is_featured
 * @property int $featured_index
 * @property int $is_active
 * @property string $created_on
 * @property string $extended_till
 */
class Directory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'directory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'package', 'name'], 'required'],
            [['user_id', 'category_id', 'is_featured', 'featured_index', 'is_active'], 'integer'],
            [['name', 'phone', 'fax', 'email', 'url', 'address', 'city', 'state', 'tags', 'description', 'owner_name', 'owner_num', 'owner_zip', 'owner_email'], 'string'],
            [['created_on', 'extended_till'], 'safe'],
            [['package'], 'string', 'max' => 12],
            [['card', 'disp_add', 'coupon'], 'string', 'max' => 80],
            [['zip'], 'string', 'max' => 48],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'package' => 'Package',
            'category_id' => 'Category ID',
            'card' => 'Card',
            'disp_add' => 'Disp Add',
            'coupon' => 'Coupon',
            'name' => 'Name',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'email' => 'Email',
            'url' => 'Url',
            'address' => 'Address',
            'zip' => 'Zip',
            'city' => 'City',
            'state' => 'State',
            'tags' => 'Tags',
            'description' => 'Description',
            'owner_name' => 'Owner Name',
            'owner_num' => 'Owner Num',
            'owner_zip' => 'Owner Zip',
            'owner_email' => 'Owner Email',
            'is_featured' => 'Is Featured',
            'featured_index' => 'Featured Index',
            'is_active' => 'Is Active',
            'created_on' => 'Created On',
            'extended_till' => 'Extended Till',
        ];
    }
}
