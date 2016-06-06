
<?php

/**
 * This is the model class for table "feedback".
 *
 * The followings are the available columns in table 'feedback':
 * @property integer $fid
 * @property string $name
 * @property string $phone_no
 * @property string $email
 * @property string $read
 * @property string $ctreated_on
 */
class Feedback extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'feedback';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, phone_no, email, feedback', 'required'),
			array('name, email', 'length', 'max'=>200),
			array('phone_no', 'length', 'max'=>15),
			array('email', 'email'),
			array('read', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fid, name, phone_no, email, read, ctreated_on', 'safe', 'on'=>'search'),
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
			'fid' => 'Fid',
			'name' => 'Name',
			'phone_no' => 'Phone No',
			'email' => 'Email',
			'feedback'=>'Feedback',
			'read' => 'Read',
			'ctreated_on' => 'Ctreated On',
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
		// $criteria->together=true;
		
		// if($_GET['read']=='read'){
			// $criteria->addCondition("read => 'read'"));
		// }
		// else if($_GET['read']=='unread')
			// $criteria->addCondition("read = 'unread'");
		// else	
			// $criteria->compare('read',$this->read);
		$criteria->compare('read',$this->read,true);
		
		$criteria->compare('fid',$this->fid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone_no',$this->phone_no,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ctreated_on',$this->ctreated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Feedback the static model class
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

