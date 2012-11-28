<?php

class GroupController extends Controller
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
					'actions' => array('list', 'view'),
					'expression' => array($this, 'isOperator'),
				),
				array('deny',
					'expression' => array($this, 'isDirector'),
				),
				array('deny',
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
		$model = new Group();

		// uncomment the following code to enable ajax-based validation
		if(isset($_POST['ajax']) && $_POST['ajax']==='group-add-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Group']))
		{
			$model->attributes=$_POST['Group'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('group/list'));
			}
		}
		$this->render('add',array(
			'model'=>$model,
		));
	}

	public function actionDelete()
	{
		$model = $this->_loadModel();
		$model->status = 0;
		if($model->save())
			$this->redirect(url('group/list'));
	}

	public function actionEdit()
	{
		$model = $this->_loadModel();
		if(isset($_POST['ajax']) && $_POST['ajax']==='group-edit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Group']))
		{
			$model->attributes=$_POST['Group'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('group/list'));
			}
		}
		$this->render('edit',array(
			'model' => $model,
		));

	}

	public function actionList()
	{
		$criteria = new CDbCriteria();
		$count = Group::model()->count($criteria);

		$pager = new CPagination($count);
		$pager->pageSize = 20;
		$pager->applyLimit($criteria);
		$group = Group::model()->findAll();
		$this->render('list', array(
			'group' => $group,
			'pages' => $pager,
		));
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
			if(isset($_GET['gid']))
			{
				$this->_model=Group::model()->findByPk($_GET['gid']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}