<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $incorrect_login
 * @property string $name
 * @property string $role
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $email_verified
 * @property string $email_verification
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $phone
 * @property string $mobile
 * @property string $fax
 * @property string $profile_picture
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['incorrect_login', 'name', 'role', 'username', 'auth_key', 'password_hash', 'email', 'phone', 'mobile', 'profile_picture'], 'required'],
            [['incorrect_login', 'email_verified', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['role'], 'string', 'max' => 16],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email_verification'], 'string', 'max' => 64],
            [['phone', 'mobile'], 'string', 'max' => 30],
            [['fax'], 'string', 'max' => 40],
            [['profile_picture'], 'string', 'max' => 200],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'incorrect_login' => 'Incorrect Login',
            'name' => 'Name',
            'role' => 'Role',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'email_verified' => 'Email Verified',
            'email_verification' => 'Email Verification',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'fax' => 'Fax',
            'profile_picture' => 'Profile Picture',
        ];
    }
}
