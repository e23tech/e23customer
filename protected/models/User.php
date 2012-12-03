<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $uid
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $realname
 * @property integer $gid
 * @property integer $status
 * @property integer $role
 * @property string $note
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, realname, role', 'required'),
			array('gid, status, role', 'numerical', 'integerOnly'=>true),
			array('username, realname', 'length', 'max'=>20),
			array('password', 'length', 'max'=>32),
			array('note', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, username, password, salt, realname, gid, status, role, note', 'safe', 'on'=>'search'),
			array('username', 'unique'),
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
			'group' => array(self::BELONGS_TO, 'Group', 'gid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'ID',
			'username' => '用户名',
			'password' => '密码',
			'salt' => 'Salt',
			'realname' => '真是姓名',
			'gid' => '部门',
			'status' => '状态',
			'role' => '角色',
			'note' => '备注',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('gid',$this->gid);
		$criteria->compare('status',$this->status);
		$criteria->compare('role',$this->role);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function validatePassword($password)
	{
		return $this->hashpassword($password, $this->salt) == $this->password;
	}

	public function hashpassword($password, $salt)
	{
		return md5($salt . md5($password));
	}

	public function beforeSave()
	{
		if (parent::beforeSave())
		{
			if ($this->isNewRecord)
			{
				$this->salt = substr(md5(time()), 5, 6);
				$this->password = $this->hashpassword($this->password, $this->salt);
			}
			elseif($this->passwordChanged($this->uid))
			{
				$this->password = $this->hashpassword($this->password, $this->salt);
			}
			else
			{
				unset($this->password);
			}

			return true;
		}
		else
			return false;
	}

	public function passwordChanged($uid)
	{
		$model = User::model()->findByPk($uid);
		$oldpwd = $model->password;
		$newpwd = $this->hashpassword($this->password, $this->salt);
		return $oldpwd == $newpwd ? false : true;
	}
}