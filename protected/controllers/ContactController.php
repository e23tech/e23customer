<?php

class ContactController extends Controller
{
	private $_model;

	public function actionAdd($cuid = 0)
	{
		if(!request()->isPostRequest && !$cuid)
			Yii::app()->end('缺少$cuid');

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

	public function actionView($coid = 0)
	{
		if(!$coid) Yii::app()->end('缺少参数$coid');

		$model = Contact::model()->findByPk($coid);

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