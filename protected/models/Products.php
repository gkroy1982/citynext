
<?php

class Products extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $amount;
	
	public function tableName()
	{
		return 'products';
	}
	
	public $image_status;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		//rating removed
		return array(
			array('user_id, main_category_id, sub_category_id, product, price, description,  quantity,status', 'required'),
			array('user_id, main_category_id, sub_category_id, quantity ', 'numerical', 'integerOnly'=>true),
			array('product, price,status,amount', 'length', 'max'=>200),
			array('image,image2,image3', 'length', 'max'=>300),

			array('image', 'file', 'types'=>'jpg,jpeg, gif, png', 'on'=>'insert'),
			array('image', 'file', 'types'=>'jpg,jpeg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			
			array('image2', 'file', 'types'=>'jpg,jpeg, gif, png','allowEmpty'=>true, 'on'=>'insert'),
			array('image2', 'file', 'types'=>'jpg,jpeg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),

			array('image3', 'file', 'types'=>'jpg,jpeg, gif, png','allowEmpty'=>true, 'on'=>'insert'),
			array('image3', 'file', 'types'=>'jpg,jpeg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pid, user_id, main_category_id, sub_category_id, version_id, product, image,image2,image3, price, quantity, description, status, created_on, image_status,activation_date', 'safe'),
			array('pid, user_id, main_category_id, sub_category_id, version_id, product, image,image2,image3, price, quantity, description, status, created_on, image_status,activation_date', 'safe', 'on'=>'search'),
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
			'subCategory' => array(self::BELONGS_TO, 'SubCategory', 'sub_category_id'),
			//'version' => array(self::BELONGS_TO, 'Version', 'version_id'),
			'mainCategory' => array(self::BELONGS_TO, 'MainCategory', 'main_category_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pid' => 'Pid',
			'user_id' => 'User',
			'main_category_id' => 'Main Category',
			'sub_category_id' => 'Sub Category',
			'version_id' => 'Version / Code',
			'product' => 'Product',
			'image' => 'Image 1',
			'image2' => 'Image 2',
			'image3' => 'Image 3',
			'price' => 'New Price',
			'old_price'=>'Old Price',
			'quantity' => 'Quantity Available',
			'description' => 'Description',
			//'rating' => 'Rating',
			'created_on' => 'Created On',
			'image_status' => 'Image Status',
			
		);
	}
public function get_image_size($url){
		list($width, $height) = getimagesize($url); 
		return $height.'x'.$width;
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('main_category_id',$this->main_category_id);
		$criteria->compare('sub_category_id',$this->sub_category_id);
		$criteria->compare('version_id',$this->version_id);
		$criteria->compare('product',$this->product,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('description',$this->description,true);
		//$criteria->compare('rating',$this->rating);
		$criteria->compare('created_on',$this->created_on,true);
		
		if($_GET['status']=='Active')
			$criteria->addCondition("status = 'Active'");
		else if($_GET['status']=='Inactive')
			$criteria->addCondition("status = 'Inactive'");
		else
			$criteria->compare('status',$this->status='Active',true);
// print_r($criteria);exit;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
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

	public static function getProducts() {
		return CHtml::listData(Products::model()->findAll(array('condition'=>'status="Active"',"order"=>"product")),'pid', 'product');
	}

	public static function getStatus() {
		return array('Inactive'=>'Inactive','Active'=>'Active');
	}
}
