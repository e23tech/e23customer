<?php

/**
 * This is the model class for table "{{contract}}".
 *
 * The followings are the available columns in table '{{contract}}':
 * @property integer $cid
 * @property string $contractno
 * @property integer $cuid
 * @property string $datesign
 * @property string $money
 * @property string $datemoney
 * @property integer $coid
 * @property string $datestart
 * @property string $dateend
 * @property string $status
 * @property integer $uid
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
			array('contractno, cuid, datesign, money, coid, datestart, dateend, uid, gid', 'required'),
			array('cuid, coid, uid, gid', 'numerical', 'integerOnly'=>true),
			array('contractno', 'length', 'max'=>10),
			array('money, status', 'length', 'max'=>20),
			array('note', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, contractno, cuid, datesign, money, datemoney, coid, datestart, dateend, status, uid, gid, note', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'cuid'),
			'contact' => array(self::BELONGS_TO, 'Contact', 'coid'),
			'salesman' => array(self::BELONGS_TO, 'User', 'uid'),
			'contractgroup' => array(self::BELONGS_TO, 'Group', 'gid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => 'ID',
			'contractno' => '合同编号',
			'cuid' => '客户ID',
			'datesign' => '合同签署日期',
			'money' => '合同金额',
			'datemoney' => '合同回款日期',
			'coid' => '联系人ID',
			'datestart' => '合同开始日期',
			'dateend' => '合同结束日期',
			'status' => '合同状态',
			'uid' => '业务员ID',
			'gid' => '合同部门',
			'note' => '合同备注',
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
		$criteria->compare('cuid',$this->cuid);
		$criteria->compare('customertype',$this->customertype);
		$criteria->compare('datesign',$this->datesign);
		$criteria->compare('money',$this->money,true);
		$criteria->compare('datemoney',$this->datemoney);
		$criteria->compare('coid',$this->coid);
		$criteria->compare('datestart',$this->datestart);
		$criteria->compare('dateend',$this->dateend);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('gid',$this->gid);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}