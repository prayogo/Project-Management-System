<?php

class PmsController extends Controller
{
	public $layout='//layouts/master';
	
	public function actionCustomer()
	{
		$model=new CustomerForm;

		if (isset($_POST['CustomerForm'])){
			if ($_POST['CustomerForm']['UserId'] != null && $_POST['CustomerForm']['UserId'] != ""){
				$response1 = $model->deleteCustomer($_POST['CustomerForm']['UserId']);
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
		
		$this->render('customer', array('model'=>$model));
	}

	public function actionProject ()
	{
		$this->render('project');
	}

	public function actionAgreement ()
	{
		$this->render('agreement');
	}

	public function actionConsultant ()
	{
		$this->render('consultant');
	}

	public function actionDeliverables ()
	{
		$this->render('deliverables');
	}

	public function actionPayment ()
	{
		$this->render('payment');
	}
	
	public function actionGetCustomerList(){
		if(isset($_POST['ajax']))
		{
			$model=new CustomerForm;
			$response = $model->getCustomerList();			
			echo(json_encode($response));	
		}else{
			$this->redirect(array('pms/customer'));
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