
<?php

/**
 * This is the model class for table "ads".
 *
 * The followings are the available columns in table 'ads':
 * @property integer $aid
 * @property integer $user_id
 * @property string $image
 * @property string $description
 * @property integer $validity_days
 * @property string $start_date
 * @property string $created_on
 */
class Ads extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $amount;
	public $home_page_slide_price_setting_id;
	
	public function tableName()
	{
		return 'ads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, description, validity_days, start_date', 'required'),
			array('user_id, validity_days', 'numerical', 'integerOnly'=>true),
			array('image,status,show_in,amount', 'length', 'max'=>200),
			
			array('image', 'file', 'types'=>'jpg, gif, png', 'on'=>'insert'),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'), 
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('aid, user_id,show_in, image, description, validity_days, start_date,status, created_on, payu_payment_logs_id', 'safe'),
			array('aid, user_id, show_in, image, description, validity_days, start_date, status, created_on, payu_payment_logs_id, home_page_slide_price_setting_id, amount', 'safe', 'on'=>'search'),
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
			'paymentstatus' => array(self::BELONGS_TO, 'Payupaymentlogs', 'payu_payment_logs_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aid' => 'Aid',
			'user_id' => 'User',
			'image' => 'Image',
			'show_in'=>'Display on',
			'description' => 'Description',
			'validity_days' => 'Validity Days',
			'start_date' => 'Start Date',
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
		$criteria->compare('aid',$this->aid);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('validity_days',$this->validity_days);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('created_on',$this->created_on,true);
		if($_GET['status']=='Active')
			$criteria->addCondition("status = 'Active'");
		else if($_GET['status']=='Inactive')
			$criteria->addCondition("status = 'Inactive'");
		else
			$criteria->compare('status',$this->status='Active',true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ads the static model class
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
}


