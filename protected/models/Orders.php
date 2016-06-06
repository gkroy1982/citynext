<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property string $order_no
 * @property integer $service_types_id
 * @property string $item_ids
 * @property string $item_rates
 * @property integer $ordered_by
 * @property string $ordered_date
 */
class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_no, service_types_id, item_ids, item_rates, ordered_by, ordered_date', 'required'),
			array('service_types_id, ordered_by', 'numerical', 'integerOnly'=>true),
			array('order_no', 'length', 'max'=>30),
			array('item_ids, item_rates', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_no, service_types_id, item_ids, item_rates, ordered_by, ordered_date, service_type_ids', 'safe' ),
			array('id, order_no, service_types_id, item_ids, item_rates, ordered_by, ordered_date', 'safe', 'on'=>'search'),
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
			'order_no' => 'Order No',
			'service_types_id' => 'Service Types',
			'item_ids' => 'Item Ids',
			'item_rates' => 'Item Rates',
			'ordered_by' => 'Ordered By',
			'ordered_date' => 'Ordered Date',
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
	public function getServiceType($serviceTypeid){
		$service_type_model=ServiceTypes::model()->findByPk($serviceTypeid);
		if(!empty($service_type_model)){
			$service_type_name=$service_type_model->service_type_name;
			$service_type_name=str_replace('_',' ',$service_type_name);
			echo ucwords($service_type_name);
		}else{
			echo 'Home Page Slider'; 
		}
	}
	public function getPaymentStatus($status){
		if(isset($status)){
			if($status=='1')
				echo 'Paid';
			else
				echo 'Pending';
		}
	}
	
	
	public function search($param=array())
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria($param);
		$criteria->together=true;		
		
		$criteria->compare('id',$this->id);
		$criteria->compare('order_no',$this->order_no,true);
		$criteria->compare('service_types_id',$this->service_types_id);
		$criteria->compare('item_ids',$this->item_ids,true);
		$criteria->compare('item_rates',$this->item_rates,true);
		$criteria->compare('ordered_by',$this->ordered_by);
		$criteria->compare('ordered_date',$this->ordered_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
