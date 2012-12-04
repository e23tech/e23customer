<?php

class ContractController extends Controller
{
	private $_model;

	public function init()
	{
		parent::init();
		$this->defaultAction = 'list';
	}

	public function accessRules()
	{
		return CMap::mergeArray(parent::accessRules(),
			array(
				array('allow',
					'actions' => array('login', 'error'),
					'users' => array('*'),
				),
				array('allow',
					'expression' => array($this, 'isFounder'),
				),
				array('allow',
					'actions' => array('menu', 'list', 'view'),
					'expression' => array($this, 'isOperator'),
				),
				array('allow',
					'actions' => array('menu', 'list', 'view', 'add'),
					'expression' => array($this, 'isDirector'),
				),
				array('allow',
					'actions' => array('menu', 'add'),
					'expression' => array($this, 'isSalesman'),
				),
				array('deny',
					'users' => array('*'),
				),
			)
		);
	}

	public function actionAdd()
	{
		$model=new Contract;

		// uncomment the following code to enable ajax-based validation
		if(isset($_POST['ajax']) && $_POST['ajax']==='contract-add-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Contract']))
		{
			$model->attributes=$_POST['Contract'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('contract/list'));
			}
		}

		$customer = Customer::model()->findAll("status = 1");
		$cuidList = CMap::mergeArray(array('' => ''), CHtml::listData($customer, 'cuid', 'customer'));
		$contact = Contact::model()->findAll("status = 1");
		$coidList = CMap::mergeArray(array('' => ''), CHtml::listData($contact, 'coid', 'contact'));
		$group = Group::model()->findAll();
		$gidList = CMap::mergeArray(array('' => ''), CHtml::listData($group, 'gid', 'group'));
		$user = User::model()->findAll("status = 1");
		$uidList = CMap::mergeArray(array('' => ''), CHtml::listData($user, 'uid', 'realname'));
		$this->render('add',array(
			'model'=>$model,
			'cuidList' => $cuidList,
			'coidList' => $coidList,
			'gidList' => $gidList,
			'uidList' => $uidList,
			'nowUserRole' => $this->getUserRole(),
		));
	}

	public function actionDelete()
	{
		$model = $this->_loadModel();
		$model->status = 0;
		if($model->save())
			$this->redirect(url('contract/list'));
	}

	public function actionEdit()
	{
		$model = $this->_loadModel();

		// uncomment the following code to enable ajax-based validation

		if(isset($_POST['ajax']) && $_POST['ajax']==='contract-edit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Contract']))
		{
			$model->attributes=$_POST['Contract'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('contract/list'));
			}
		}

		$customer = Customer::model()->findAll("status = 1");
		$cuidList = CMap::mergeArray(array('' => ''), CHtml::listData($customer, 'cuid', 'customer'));
		$contact = Contact::model()->findAll("status = 1");
		$coidList = CMap::mergeArray(array('' => ''), CHtml::listData($contact, 'coid', 'contact'));
		$group = Group::model()->findAll();
		$gidList = CMap::mergeArray(array('' => ''), CHtml::listData($group, 'gid', 'group'));
		$user = User::model()->findAll("status = 1");
		$uidList = CMap::mergeArray(array('' => ''), CHtml::listData($user, 'uid', 'realname'));
		$nowUserRole = $this->getUserRole(Yii::app()->user->id);
		$this->render('edit',array(
			'model'=>$model,
			'cuidList' => $cuidList,
			'coidList' => $coidList,
			'gidList' => $gidList,
			'uidList' => $uidList,
			'nowUserRole' => $nowUserRole,
		));
	}

	public function actionList()
	{
		$criteria = new CDbCriteria();
		$criteria->order = "cid DESC";
		$criteria->condition = "status = 1" . $this->getGidStr(user());
		$count = Contract::model()->count($criteria);

		$pager = new CPagination($count);
		$pager->pageSize = 20;
		$pager->applyLimit($criteria);

		$cList = Contract::model()->findAll($criteria);
		$this->render('list', array(
			'pages' => $pager,
			'cList' => $cList,
		));
	}

	public function actionView()
	{
		$model = $this->_loadModel();
		$this->render('view', array(
			'model' => $model,
		));
	}

	public function actionSort()
	{
		$this->render('sort');
	}

	public function actionMenu()
	{
		$this->render('menu');
	}

	protected function _loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['cid']))
			{
				$this->_model=Contract::model()->findByPk($_GET['cid']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

}