<?php
class Controller extends CController
{
	public $layout='//layouts/common';
	public $menu=array();
	public $breadcrumbs=array();

	public function init()
	{
		parent::init();
	}

	public function beforeAction($action)
	{
		if(parent::beforeAction($action))
		{
			if($this->action->id == 'menu') $this->layout = '//layouts/menu';
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * 强制进行登录验证（以下三个方法）
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(), array(
			'LoginRequired',
			'accessControl',
		));
	}

	public function filterLoginRequired($filterChain)
	{
		$actions = $this->noLoginRequiredActions();
		if (!in_array($filterChain->action->id, $actions))
			if (Yii::app()->user->isGuest)
				Yii::app()->user->loginRequired();
		$filterChain->run();
	}

	public function noLoginRequiredActions()
	{
		return array('login');
	}

	protected function getGidStr($user)
	{
		if($this->isFounder($user))
		{
			return;
		}
		if($this->isSalesman($user))
		{
            return " AND uid = " . $user->id;
			//throw new CHttpException(403,'权限不足！');
		}
		if($this->isDirector($user))
		{
			$gid = User::model()->findByPk($user->id)->gid;
		}
		$scope = User::model()->findByPk($user->id)->scope;
		if(empty($scope))
		{
			if($this->isOperator($user))
				return;
			else
				throw new CHttpException(403,'权限不足！');
		}
		else
		{
			$scope = unserialize($scope);
			$res = isset($gid) ? strval($gid) : '';
			if(!empty($scope))
			{
				foreach($scope as $val)
				{
					$res .= empty($res) ? $val : ', ' . $val;
				}
			}
			return " AND gid IN (" . $res . ")";
		}
	}

	public function getUserRole($uid = '')
	{
		$pk = !empty($uid) ? $uid : Yii::app()->user->id;
		$model = User::model()->findByPk($pk);
		return $model->role;
	}

	protected function loadModel($uid)
	{
		return User::model()->findByPk(intval($uid));
	}

	protected function isFounder($user)
	{
		return ($this->loadModel($user->id)->role == EC_FOUNDER);
	}

	protected function isOperator($user)
	{
		return ($this->loadModel($user->id)->role == EC_OPERATOR);
	}

	protected function isDirector($user)
	{
		return ($this->loadModel($user->id)->role == EC_DIRECTOR);
	}

	protected function isSalesman($user)
	{
		return ($this->loadModel($user->id)->role == EC_USER);
	}

}