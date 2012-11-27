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
				array('deny',
					'actions' => array('list', 'delete', 'add', 'edit', 'view'),
					'users' => $this->getUsers(EC_USER),
				),
				array('deny',
					'actions' => array('delete', 'add', 'edit'),
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