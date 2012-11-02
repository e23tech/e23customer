<?php

/**
 * This is the model class for table "{{contract}}".
 *
 * The followings are the available columns in table '{{contract}}':
 * @property integer $cid
 * @property string $contractno
 * @property string $customer
 * @property integer $cuid
 * @property integer $customertype
 * @property integer $datesign
 * @property string $money
 * @property integer $datemoney
 * @property string $contact
 * @property integer $coid
 * @property integer $datestart
 * @property integer $dateend
 * @property string $status
 * @property string $salesman
 * @property integer $sid
 * @property integer $gid
 * @property string $note
 */
class Contract extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contract the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{contract}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contractno, customer, cuid, customertype, datesign, money, coid, datestart, dateend, sid, gid', 'required'),
			array('cuid, customertype, datesign, datemoney, coid, datestart, dateend, sid, gid', 'numerical', 'integerOnly'=>true),
			array('contractno', 'length', 'max'=>10),
			array('customer', 'length', 'max'=>100),
			array('money, contact, status, salesman', 'length', 'max'=>20),
			array('note', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, contractno, customer, cuid, customertype, datesign, money, datemoney, contact, coid, datestart, dateend, status, salesman, sid, gid, note', 'safe', 'on'=>'search'),
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
			'cid' => 'Cid',
			'contractno' => 'Contractno',
			'customer' => 'Customer',
			'cuid' => 'Cuid',
			'customertype' => 'Customertype',
			'datesign' => 'Datesign',
			'money' => 'Money',
			'datemoney' => 'Datemoney',
			'contact' => 'Contact',
			'coid' => 'Coid',
			'datestart' => 'Datestart',
			'dateend' => 'Dateend',
			'status' => 'Status',
			'salesman' => 'Salesman',
			'sid' => 'Sid',
			'gid' => 'Gid',
			'note' => 'Note',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cid',$this->cid);
		$criteria->compare('contractno',$this->contractno,true);
		$criteria->compare('customer',$this->customer,true);
		$criteria->compare('cuid',$this->cuid);
		$criteria->compare('customertype',$this->customertype);
		$criteria->compare('datesign',$this->datesign);
		$criteria->compare('money',$this->money,true);
		$criteria->compare('datemoney',$this->datemoney);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('coid',$this->coid);
		$criteria->compare('datestart',$this->datestart);
		$criteria->compare('dateend',$this->dateend);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('salesman',$this->salesman,true);
		$criteria->compare('sid',$this->sid);
		$criteria->compare('gid',$this->gid);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}