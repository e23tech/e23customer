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
		$moneyAll = 0;
		$list = array();
		if(isset($_POST['query']))
		{
			$criteria = new CDbCriteria();
			$criteria->condition = $this->getCondition($_POST['query']);
			$criteria->order = "cid DESC";
			$list = Contract::model()->findAll($criteria);
			$moneyAll = 0;
			foreach($list as $val)
			{
				$moneyAll += $val['money'];
			}
		}
		$this->render('main', array(
			'year' => $this->yearList(),
			'morq' => $this->morqList(),
			'cList' => $list,
			'moneyall' => $moneyAll,
		));
	}

	public function actionGroup()
	{
		$moneyAll = 0;
		$list = array();
		$groupList = Group::model()->findAll();
		$groupOption = CHtml::listData($groupList, 'gid', 'group');
		if(isset($_POST['query']))
		{
			$criteria = new CDbCriteria();
			$criteria->condition = $this->getCondition($_POST['query']);
			$criteria->order = "cid DESC";
			$list = Contract::model()->findAll($criteria);
			$moneyAll = 0;
			foreach($list as $val)
			{
				$moneyAll += $val['money'];
			}
		}
		$this->render('group', array(
			'year' => $this->yearList(),
			'morq' => $this->morqList(),
			'cList' => $list,
			'moneyall' => $moneyAll,
			'groupoption' => $groupOption,
		));
	}

	public function actionSalesman()
	{
		$moneyAll = 0;
		$list = array();
		//$salesmanlist = User::model()->findAll("status=1 AND role = " . EC_USER);
		$salesmanlist = User::model()->findAll("status=1");
		$salesmanOptions = CHtml::listData($salesmanlist, 'uid', 'realname');
		if(isset($_POST['query']))
		{
			$criteria = new CDbCriteria();
			$criteria->condition = $this->getCondition($_POST['query']);
			$criteria->order = "cid DESC";
			$list = Contract::model()->findAll($criteria);
			$moneyAll = 0;
			foreach($list as $val)
			{
				$moneyAll += $val['money'];
			}
		}
		$this->render('salesman', array(
			'year' => $this->yearList(),
			'morq' => $this->morqList(),
			'cList' => $list,
			'moneyall' => $moneyAll,
			'salesmanoptions' => $salesmanOptions,
		));
	}

	public function actionCustomer()
	{
		$moneyAll = 0;
		$list = array();
		$customerList = Customer::model()->findAll("status=1");
		$customerOption = CHtml::listData($customerList, 'cuid', 'customer');
		if(isset($_POST['query']))
		{
			$criteria = new CDbCriteria();
			$criteria->condition = $this->getCondition($_POST['query']);
			$criteria->order = "cid DESC";
			$list = Contract::model()->findAll($criteria);
			$moneyAll = 0;
			foreach($list as $val)
			{
				$moneyAll += $val['money'];
			}
		}
		$this->render('customer', array(
			'year' => $this->yearList(),
			'morq' => $this->morqList(),
			'cList' => $list,
			'moneyall' => $moneyAll,
			'customerOption' => $customerOption,
		));
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

	protected function getCondition($arr)
	{
		$res = '';
		$salesmanstr = '';

		$type = $arr['type'];
		if(is_numeric($arr['morq']))
		{
			$res = "$type LIKE '" . $arr['year'] . '-' . str_pad($arr['morq'], 2, 0, STR_PAD_LEFT) . "-%'";
		}
		elseif(!is_numeric($arr['morq']) && substr($arr['morq'], 0, 1) == 'q')
		{
			$qstart = (substr($arr['morq'], 1, 1) - 1) * 3 + 1;
			$qend = (substr($arr['morq'], 1, 1) - 1) * 3 + 4;
			$res = "$type > '" . $arr['year'] . '-' . str_pad($qstart, 2, 0, STR_PAD_LEFT) . "-00' AND $type < '" . $arr['year'] . '-' . str_pad($qend, 2, 0, STR_PAD_LEFT) . "-00'";
		}
		else
		{
			$res = "$type LIKE '" . $arr['year'] . "-%'";
		}

		if($arr['salesman'])
		{
			$salesmanstr = "'" . $arr['salesman'] . "'";
		}
		elseif($arr['group'])
		{
			$salesmanlist = User::model()->findAll("status = 1 AND gid = '" . $arr['group'] . "'");
			foreach($salesmanlist as $val)
			{
				$salesmanstr .= empty($salesmanstr) ? "'" . $val['uid'] . "'" : ", '" . $val['uid'] . "'";
			}
		}
		if(!empty($salesmanlist)) $res .= " AND uid IN (" . $salesmanstr . ")";

		if($arr['customer'])
		{
			$res .= " AND cuid = '" . $arr['customer'] . "'";
		}
		return $res;
	}
}