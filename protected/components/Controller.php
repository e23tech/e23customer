<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/common';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $ecUser = array();

	public function init()
	{
		parent::init();
		if(!Yii::app()->user->isGuest)
			$this->ecUser = User::model()->findByPk(Yii::app()->user->id);
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
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl',
		));
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions' => array('login'),
				'users' => array('?'),
			),
			array('deny',
				'actions' => array('login'),
				'users' => array('@'),
			),
			array('deny',
				'users' => array('?'),
			),
		);
	}

	/**
	 * 强制进行登录验证（以下三个方法）
	 */
//	public function filters()
//	{
//		return CMap::mergeArray(parent::filters(), array('LoginRequired'));
//	}
//
//	public function filterLoginRequired($filterChain)
//	{
//		$actions = $this->noLoginRequiredActions();
//		if (!in_array($filterChain->action->id, $actions))
//			if (Yii::app()->user->isGuest)
//				Yii::app()->user->loginRequired();
//		$filterChain->run();
//	}
//
//	public function noLoginRequiredActions()
//	{
//		return array('login');
//	}

	public function getUsers($role = '')
	{
		$res = array();
		if(empty($role)) $role = EC_USER;
		$users = User::model()->findAll("status = 1 AND role = '" . $role . "'");
		foreach($users as $user)
		{
			$res[] = $user['username'];
		}
		return $res;
	}

	public function checkUserAccess($role)
	{
		if(empty($role)) return false;
		$model = User::model()->findByPk(Yii::app()->user->id);
		if($role == $model->role)
			return true;
		else
			return false;
	}

	public function getUserRole($uid = '')
	{
		$pk = !empty($uid) ? $uid : Yii::app()->user->id;
		$model = User::model()->findByPk($pk);
		return $model->role;
	}
}