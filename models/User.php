<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $isAdmin
 * @property string $photo
 *
 * @property Comment[] $comments
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['name', 'email', 'password', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }


    public static function findIdentity($id) {
        return User::findOne($id);
    }


    public function getId() {
        return $this->id;
    }


    public static function findIdentityByAccessToken($token, $type = null) {
        return true;
    }


    public function getAuthKey() {
        return true;
    }


    public function validateAuthKey($authKey) {
        return true;
    }

    public function create(){
        return $this->save(false);
    }


    public static function findByEmail($email){
        return User::find()->where(['email'=>$email])->one();
    }


    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }


    public function getImage()
    {
//        return ($this->image) ? '/uploads/' . $this->image : '/images/no-image.png';
//        return ($this->image) ? $this->image : '/no-image.png';
        return 'user image';
    }

}
