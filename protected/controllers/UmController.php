<?php

class UmController extends Controller
{
	public $layout='//layouts/master';

	public function actionGroup()
	{
		$this->render('group');
	}

	public function actionUser()
	{
		$this->render('user');
	}

	public function actionMenu()
	{
		$model=new MenuDetailForm;
		$response = $model->getMenuList();
		if (isset($response['code']) && $response['code'] == 'M0'){
			$model->addError('request', $response['exception'][2]);	
		}else{

		}
		$this->render('menu', array('model'=>$model, 'data'=>$response));
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