<?php

class UserController extends Controller
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
				array('deny',
					'actions' => array('list', 'delete', 'add'),
					'users' => $this->getUsers(EC_USER),
				),
				array('deny',
					'actions' => array('delete', 'add'),
					'users' => $this->getUsers(EC_OPERATOR),
				),
				array('allow',
					'users' => $this->getUsers(EC_FOUNDER),
				),
				array('deny',
					'users' => array('?'),
				),
			)
		);
	}

	public function actionAdd()
	{
		$model = new User();
		$groupList = Group::model()->findAll();
		$groupOption = CHtml::listData($groupList, 'gid', 'group');
		$roleOption = array(EC_USER => '业务员', EC_OPERATOR => '领导');

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
			'roleOption' => $roleOption,
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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	protected function _loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['uid']))
			{
				if($this->getUserRole(Yii::app()->user->id) == EC_FOUNDER)
					$this->_model=User::model()->findByPk($_GET['uid']);
				elseif($_GET['uid'] == Yii::app()->user->id)
					$this->_model=User::model()->findByPk(Yii::app()->user->id);
				else
					throw new CHttpException(404,'权限不足.');
			}
			else
			{
				$this->_model=User::model()->findByPk(Yii::app()->user->id);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}