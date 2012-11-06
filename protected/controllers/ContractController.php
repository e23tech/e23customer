<?php

class ContractController extends Controller
{
	private $_model;

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
		$criteria = new CDbCriteria();
		$criteria->order = "cid DESC";
		$criteria->condition = "status = 1";
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