<?php

class ContactController extends Controller
{
	public function actionAdd()
	{
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
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
		}
		$this->render('add',array('model'=>$model));
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionEdit()
	{
		$this->render('edit');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionList()
	{
		$this->render('list');
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
}