<?php

class PmsController extends Controller
{
	public $layout='//layouts/master';
	
	public function actionCustomer()
	{
		$this->render('customer');
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