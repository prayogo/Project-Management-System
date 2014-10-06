<?php

class UmController extends Controller
{
	public $layout='//layouts/master';

	public function actionGroup()
	{
		$model=new GroupHeaderForm;

		if (isset($_POST['GroupHeaderForm'])){
			if ($_POST['GroupHeaderForm']['GroupId'] != null && $_POST['GroupHeaderForm']['GroupId'] != ""){
				$response1 = $model->deleteGroup($_POST['GroupHeaderForm']['GroupId']);
				if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
					$this->refresh();
				}else{
					if (isset($response1['exception'][2])){
						$model->addError('request', $response1['exception'][2]);
					}else{
						$model->addError('request', 'Oops, something wrong. Please try again later.');
					}
				}
			}
		}
		
		$this->render('group', array('model'=>$model));
	}

	public function actionUser()
	{		
		$model=new UserDetailForm;

		if (isset($_POST['UserDetailForm'])){
			if ($_POST['UserDetailForm']['UserId'] != null && $_POST['UserDetailForm']['UserId'] != ""){
				$response1 = $model->deleteUser($_POST['UserDetailForm']['UserId']);
				if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
					$this->refresh();
				}else{
					if (isset($response1['exception'][2])){
						$model->addError('request', $response1['exception'][2]);
					}else{
						$model->addError('request', 'Oops, something wrong. Please try again later.');
					}
				}
			}
		}

		$this->render('user', array('model'=>$model));
	}

	public function actionMenu()
	{
		$model=new MenuDetailForm;
		if (isset($_POST['MenuDetailForm'])){
			if ($_POST['MenuDetailForm']['MenuId'] != null && $_POST['MenuDetailForm']['MenuId'] != ""){
				$response1 = $model->deleteMenu($_POST['MenuDetailForm']['MenuId']);
				if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
					$this->refresh();
				}else{
					if (isset($response1['exception'][2])){
						$model->addError('request', $response1['exception'][2]);
					}else{
						$model->addError('request', 'Oops, something wrong. Please try again later.');
					}
				}
			}
		}
		
		$this->render('menu', array('model'=>$model));
	}
	
	public function actionGetMenuList(){
		if(isset($_POST['ajax']))
		{
			$model=new MenuDetailForm;
			$response = $model->getMenuList();
			for($i = 0; $i < count($response); $i++){
				$response[$i]['Link'] = Yii::app()->createUrl($response[$i]['Link']);
			}

			echo(json_encode($response));	
		}else{
			$this->redirect(array('um/menu'));
		}
	}
	
	public function actionGetGroupList(){
		if(isset($_POST['ajax']))
		{
			$model=new GroupHeaderForm;
			$response = $model->getGroupList();
			echo(json_encode($response));	
		}else{
			$this->redirect(array('um/group'));
		}	
	}

	public function actionGetUserList(){
		if(isset($_POST['ajax']))
		{
			$model=new UserDetailForm;
			$response = $model->getUserList(0);
			echo(json_encode($response));	
		}else{
			$this->redirect(array('um/user'));
		}	
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