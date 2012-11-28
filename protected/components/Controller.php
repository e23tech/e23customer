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
			$this->ecUser = User::model()->findByPk(user()->id);
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

	protected function getGroupUids($user)
	{
		$gid = User::model()->findByPk($user->id)->gid;
		$groupUsers = User::model()->findAll("gid = '$gid' AND status = '1'");
		foreach($groupUsers as $val)
		{
			$res[] = $val['uid'];
		}
		return $res;
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