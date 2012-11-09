<?php

class QueryController extends Controller
{
	public function init()
	{
		parent::init();
		$this->defaultAction = 'main';
	}

	public function actionMain()
	{
		if(isset($_POST['query']))
		{
			print_r($_POST['query']);
		}
		$this->render('main', array(
			'year' => $this->yearList(),
			'morq' => $this->morqList(),
		));
	}

	public function actionGroup()
	{
		//todo
	}

	public function actionSalesman()
	{
		//todo
	}

	public function actionCustomer()
	{
		//todo
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

	public function actionSelectdate()
	{
		if($_POST['country'])
		{
			$data=array(
				'1' => 'shandong',
				'2' => 'shanxi',
			);
			foreach($data as $value=>$name)
			{
				echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
			}
		}
		else
			echo 'false';
	}

	protected function yearList($select = 2012, $start = 2007, $end = 2012)
	{
		$res = array();
		$thisyear = date('Y', time());
		$end = isset($end) ? $end : $thisyear;
		$select = isset($select) ? $select : $thisyear;
		$res['select'] = $select;
		$start = isset($start) ? $start : ($end - 5);
		for($i = $start; $i <= $end; $i++ )
		{
			$res['list'][$i] = $i;
		}
		return $res;
	}

	protected function morqList()
	{
		$res = array();
		$res['select'] = date('m', time());
		for($i = 1; $i <= 12; $i++)
		{
			$res['list'][$i] = $i . '月份';
		}
		for($i = 1; $i <= 4; $i++)
		{
			$res['list']['q'.$i] = $i . '季度';
		}
		$res['list']['y'] = '全年';
		return $res;
	}
}