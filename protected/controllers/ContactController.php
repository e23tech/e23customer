<?php

class ContactController extends Controller
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
					'actions' => array('list', 'delete', 'edit', 'view'),
					'users' => $this->getUsers(EC_USER),
				),
				array('deny',
					'actions' => array('edit', 'delete'),
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

	public function actionAdd($cuid = 0)
	{
		$cuidList = array();
		if(!request()->isPostRequest && !$cuid)
		{
			$cuid = 0;
			$customer = Customer::model()->findAll("status = 1");
			$cuidList = CMap::mergeArray(array('' => ''), CHtml::listData($customer, 'cuid', 'customer'));
		}

		$model=new Contact;

		// uncomment the following code to enable ajax-based validation

		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-add-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}


		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('contact/list/cuid/' . $cuid));
			}
		}

		$this->render('add',array(
			'model'=>$model,
			'cuid' => $cuid,
			'cuidList' => $cuidList,
		));
	}

	public function actionDelete()
	{
		$model = $this->_loadModel();
		$model->status = 0;
		if($model->save())
			$this->redirect(url('contact/list'));
	}

	public function actionEdit()
	{

		$model = $this->_loadModel();
		// uncomment the following code to enable ajax-based validation

		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-edit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}


		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
			if($model->validate() && $model->save())
			{
				$this->redirect(url('contact/view/coid/'.$_GET['coid']));
			}
		}

		$this->render('edit',array(
			'model'=>$model,
		));
	}

	public function actionList($cuid = 0)
	{
		$criteria = new CDbCriteria();
		$criteria->order = "coid DESC";
		$criteria->condition = $cuid > 0 ? "cuid = $cuid AND status = 1" : "status = 1";
		$count = Contact::model()->count($criteria);

		$pager = new CPagination($count);
		$pager->pageSize = 20;
		$pager->applyLimit($criteria);

		$contactList = Contact::model()->findAll($criteria);
		$this->render('list', array(
			'pages' => $pager,
			'coList' => $contactList,
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
			if(isset($_GET['coid']))
			{
				$this->_model=Contact::model()->findByPk($_GET['coid']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}