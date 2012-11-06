<?php

class ContractController extends Controller
{
	public function init()
	{
		parent::init();
		$this->defaultAction = 'list';
	}
	public function actionAdd()
	{
		$model=new Contract;

		// uncomment the following code to enable ajax-based validation

		if(isset($_POST['ajax']) && $_POST['ajax']==='contract-contractform-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}


		if(isset($_POST['Contract']))
		{
			$model->attributes=$_POST['Contract'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				$model->save();
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

	public function actionList()
	{
		$this->render('list');
	}

	public function actionShow()
	{
		$cid = 1;
		$model = Contract::model()->findByPk($cid);
		echo $model->salesman->realname;
	}

	public function actionSort()
	{
		$this->render('sort');
	}

	public function actionMenu()
	{
		$this->render('menu');
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