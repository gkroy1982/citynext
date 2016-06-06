<?php

/**
 * This is the model class for table "payu_payment_logs".
 *
 * The followings are the available columns in table 'payu_payment_logs':
 * @property string $id
 * @property string $mihpayid
 * @property string $mode
 * @property string $status
 * @property string $key
 * @property string $txnid
 * @property double $amount
 * @property string $addedon
 * @property string $productinfo
 * @property string $firstname
 * @property string $lastname
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property string $email
 * @property string $phone
 * @property string $udf1
 * @property string $udf2
 * @property string $udf3
 * @property string $udf4
 * @property string $udf5
 * @property string $udf6
 * @property string $udf7
 * @property string $udf8
 * @property string $udf9
 * @property string $udf10
 * @property string $hash
 * @property string $PG_TYPE
 * @property string $encryptedPaymentId
 * @property string $bank_ref_num
 * @property string $bankcode
 * @property string $error
 * @property string $error_Message
 * @property string $cardToken
 * @property string $name_on_card
 * @property integer $cardnum
 * @property string $amount_split
 * @property string $payuMoneyId
 * @property integer $discount
 * @property integer $net_amount_debit
 * @property integer $additionalCharges
 * @property string $created_on
 */
class Payupaymentlogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payu_payment_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('key, txnid, amount, productinfo, firstname, lastname, email, phone, hash', 'required'),
			// array('cardnum, discount, net_amount_debit, additionalCharges', 'numerical', 'integerOnly'=>true),
			// array('amount', 'numerical'),
			array('mihpayid, txnid, PG_TYPE', 'length', 'max'=>30),
			array('mode, bankcode', 'length', 'max'=>10),
			array('status, zipcode', 'length', 'max'=>10),
			array('key, payuMoneyId', 'length', 'max'=>10),
			array('productinfo, address1, address2, email, encryptedPaymentId', 'length', 'max'=>100),
			array('firstname, lastname, city, state, country, udf1, udf2, udf3, udf4, udf5, udf6, udf7, udf8, udf9, udf10, bank_ref_num, error_Message', 'length', 'max'=>50),
			array('phone', 'length', 'max'=>13),
			array('hash', 'length', 'max'=>128),
			array('error', 'length', 'max'=>5),
			array('cardToken', 'length', 'max'=>60),
			array('name_on_card', 'length', 'max'=>20),
			// array('amount_split', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mihpayid, mode, status, key, txnid, amount, addedon, productinfo, firstname, lastname, address1, address2, city, state, country, zipcode, email, phone, udf1, udf2, udf3, udf4, udf5, udf6, udf7, udf8, udf9, udf10, hash, PG_TYPE, encryptedPaymentId, bank_ref_num, bankcode, error, error_Message, cardToken, name_on_card, cardnum, amount_split, payuMoneyId, discount, net_amount_debit, additionalCharges, created_on', 'safe'),
			array('id, mihpayid, mode, status, key, txnid, amount, addedon, productinfo, firstname, lastname, address1, address2, city, state, country, zipcode, email, phone, udf1, udf2, udf3, udf4, udf5, udf6, udf7, udf8, udf9, udf10, hash, PG_TYPE, encryptedPaymentId, bank_ref_num, bankcode, error, error_Message, cardToken, name_on_card, cardnum, amount_split, payuMoneyId, discount, net_amount_debit, additionalCharges, created_on', 'safe', 'on'=>'search'),
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
			'mihpayid' => 'Mihpayid',
			'mode' => 'Mode',
			'status' => 'Status',
			'key' => 'Key',
			'txnid' => 'Txnid',
			'amount' => 'Amount',
			'addedon' => 'Addedon',
			'productinfo' => 'Productinfo',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'country' => 'Country',
			'zipcode' => 'Zipcode',
			'email' => 'Email',
			'phone' => 'Phone',
			'udf1' => 'Udf1',
			'udf2' => 'Udf2',
			'udf3' => 'Udf3',
			'udf4' => 'Udf4',
			'udf5' => 'Udf5',
			'udf6' => 'Udf6',
			'udf7' => 'Udf7',
			'udf8' => 'Udf8',
			'udf9' => 'Udf9',
			'udf10' => 'Udf10',
			'hash' => 'Hash',
			'PG_TYPE' => 'Pg Type',
			'encryptedPaymentId' => 'Encrypted Payment',
			'bank_ref_num' => 'Bank Ref Num',
			'bankcode' => 'Bankcode',
			'error' => 'Error',
			'error_Message' => 'Error Message',
			'cardToken' => 'Card Token',
			'name_on_card' => 'Name On Card',
			'cardnum' => 'Cardnum',
			'amount_split' => 'Amount Split',
			'payuMoneyId' => 'Payu Money',
			'discount' => 'Discount',
			'net_amount_debit' => 'Net Amount Debit',
			'additionalCharges' => 'Additional Charges',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('mihpayid',$this->mihpayid,true);
		$criteria->compare('mode',$this->mode,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('txnid',$this->txnid,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('addedon',$this->addedon,true);
		$criteria->compare('productinfo',$this->productinfo,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('udf1',$this->udf1,true);
		$criteria->compare('udf2',$this->udf2,true);
		$criteria->compare('udf3',$this->udf3,true);
		$criteria->compare('udf4',$this->udf4,true);
		$criteria->compare('udf5',$this->udf5,true);
		$criteria->compare('udf6',$this->udf6,true);
		$criteria->compare('udf7',$this->udf7,true);
		$criteria->compare('udf8',$this->udf8,true);
		$criteria->compare('udf9',$this->udf9,true);
		$criteria->compare('udf10',$this->udf10,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('PG_TYPE',$this->PG_TYPE,true);
		$criteria->compare('encryptedPaymentId',$this->encryptedPaymentId,true);
		$criteria->compare('bank_ref_num',$this->bank_ref_num,true);
		$criteria->compare('bankcode',$this->bankcode,true);
		$criteria->compare('error',$this->error,true);
		$criteria->compare('error_Message',$this->error_Message,true);
		$criteria->compare('cardToken',$this->cardToken,true);
		$criteria->compare('name_on_card',$this->name_on_card,true);
		$criteria->compare('cardnum',$this->cardnum);
		$criteria->compare('amount_split',$this->amount_split,true);
		$criteria->compare('payuMoneyId',$this->payuMoneyId,true);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('net_amount_debit',$this->net_amount_debit);
		$criteria->compare('additionalCharges',$this->additionalCharges);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payupaymentlogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
