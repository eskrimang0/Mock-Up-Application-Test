<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "userdb".
 *
 * @property string $email_user
 * @property string $password_user
 * @property string $role_user
 *
 * @property Biodata[] $biodatas
 */
class Userdb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userdb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email_user', 'password_user'], 'required'],
            [['email_user', 'password_user', 'role_user'], 'string', 'max' => 50],
            [['email_user'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email_user' => 'Email User',
            'password_user' => 'Password User',
            'role_user' => 'Role User',
        ];
    }

    /**
     * Gets query for [[Biodatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBiodatas()
    {
        return $this->hasMany(Biodata::class, ['email_user' => 'email_user']);
    }
}
