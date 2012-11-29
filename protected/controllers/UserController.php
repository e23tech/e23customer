<?php

class UserController extends Controller
{
	private $_model;
	protected $_roleOption;

	public function init()
	{
		parent::init();
		$this->defaultAction = 'list';
		$this->_roleOption = array('' => '', EC_USER => '业务员', EC_DIRECTOR => '部门主任', EC_OPERATOR => '公司领导');
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
					'actions' => array('menu', 'list', 'view', 'edit'),
					'expression' => array($this, 'isOperator'),
				),
				array('allow',
					'actions' => array('menu', 'view', 'edit'),
					'expression' => array($this, 'isDirector'),
				),
				array('allow',
					'actions' => array('menu', 'view', 'edit'),
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
		$model = new User();
		$groupList = Group::model()->findAll();
		$groupOption = CHtml::listData($groupList, 'gid', 'group');

		// uncomment the following code to enable ajax-based validation
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-add-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('user/list'));
			}
		}
		$this->render('add',array(
			'model'=>$model,
			'groupOption' => $groupOption,
			'roleOption' => $this->_roleOption,
		));
	}

	public function actionDelete()
	{
		$model = $this->_loadModel();
		$model->status = 0;
		if($model->save())
			$this->redirect(url('user/list'));
	}

	public function actionEdit()
	{
		$model = $this->_loadModel();
		$groupList = Group::model()->findAll();
		$groupOption = CHtml::listData($groupList, 'gid', 'group');
		// uncomment the following code to enable ajax-based validation
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-eidt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['User']))
		{
			if(empty($_POST['User']['password'])) unset($_POST['User']['password']);
			$model->attributes=$_POST['User'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('user/list'));
			}
		}
		$this->render('edit',array(
			'model'=>$model,
			'groupOption' => $groupOption,
			'roleOption' => $this->_roleOption,
		));
	}

	public function actionList()
	{
		$criteria = new CDbCriteria();
		$criteria->order = "uid DESC";
		$count = User::model()->count($criteria);

		$pager = new CPagination($count);
		$pager->pageSize = 20;
		$pager->applyLimit($criteria);

		$uList = User::model()->findAll($criteria);
		$this->render('list', array(
			'pages' => $pager,
			'uList' => $uList,
		));
	}

	public function actionMenu()
	{
		$this->render('menu');
	}

	public function actionView()
	{
		$model = $this->_loadModel();
		$this->render('view', array(
			'model' => $model,
		));
	}

	protected function _loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['uid']))
			{
				if($this->isFounder(user()))
					$this->_model=User::model()->findByPk($_GET['uid']);
				elseif($_GET['uid'] == user()->id)
					$this->_model=User::model()->findByPk(user()->id);
				else
					throw new CHttpException(404,'权限不足.');
			}
			else
			{
				$this->_model=User::model()->findByPk(user()->id);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}