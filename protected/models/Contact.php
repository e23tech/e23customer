<?php

/**
 * This is the model class for table "{{contact}}".
 *
 * The followings are the available columns in table '{{contact}}':
 * @property integer $coid
 * @property integer $cuid
 * @property string $contact
 * @property string $rank
 * @property string $telephone
 * @property string $email
 * @property string $note
 * @property integer $status
 */
class Contact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contact the static model class
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
		return '{{contact}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cuid, contact, telephone', 'required'),
			array('cuid, status', 'numerical', 'integerOnly'=>true),
			array('contact', 'length', 'max'=>20),
			array('rank, telephone, email', 'length', 'max'=>30),
			array('note', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('coid, cuid, contact, rank, telephone, email, note, status', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Customer', 'cuid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'coid' => '联系人ID',
			'cuid' => '所属客户',
			'contact' => '联系人',
			'telephone' => '联系人电话',
			'email' => '联系人邮件',
			'rank' => '联系人职务',
			'note' => '备注',
			'status' => 'Status',
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

		$criteria->compare('coid',$this->coid);
		$criteria->compare('cuid',$this->cuid);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('rank',$this->rank,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->getIsNewRecord())
			{
				$this->status = 1;
			}
			return true;
		}
		else
		{
			return false;
		}
	}
}