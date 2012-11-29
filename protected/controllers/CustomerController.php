<?php

class CustomerController extends Controller
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
					'actions' => array('menu', 'add'),
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
		$model=new Customer;

		// uncomment the following code to enable ajax-based validation
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-add-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}


		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('customer/view/cuid/' . Yii::app()->db->getLastInsertID()));
			}
		}
		$this->render('add',array('model'=>$model));
	}

	public function actionDelete()
	{
		$model = $this->_loadModel();
		$model->status = 0;
		if($model->save())
			$this->redirect(url('customer/list'));
	}

	public function actionEdit()
	{
		$model = $this->_loadModel();

		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-edit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('customer/view/cuid/' . $_GET['cuid']));
			}
		}
		$this->render('add',array('model'=>$model));
	}

	public function actionList()
	{
		$criteria = new CDbCriteria();
		$criteria->order = "type DESC, cuid DESC";
		$criteria->condition = "status = 1";
		$count = Customer::model()->count($criteria);

		$pager = new CPagination($count);
		$pager->pageSize = 20;
		$pager->applyLimit($criteria);

		$cuList = Customer::model()->findAll($criteria);
		$this->render('list', array(
			'pages' => $pager,
			'cuList' => $cuList,
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
			if(isset($_GET['cuid']))
			{
				$this->_model=Customer::model()->findByPk($_GET['cuid']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}