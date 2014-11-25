<?php

class CustomerController extends Controller
{
	public $layout='//layouts/master';
	
	public function actionManagecustomer()
	{
		$activeTab = "customerdetail";				
		
		var_dump($_POST);
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form-customerdetail-form')
		{
			echo CActiveForm::validate($model_detail);			
			foreach($list as $model_hcontact){
				echo CActiveForm::validate($model_hcontact);
			}
			echo CActiveForm::validate($model_dcontact);
			Yii::app()->end();
		}
		else {
			$model_detail = new CustomerForm;
			$model_hcontact = new HContactPersonForm;
			$model_dcontact = new DContactPersonForm;		
		}
		
		$list[0] = $model_hcontact;

		if(isset($_POST['CustomerForm'])) {
			$validateCustomer = false;
			$validateContactHdr = false;
			$validateContactDtl = false;
 			
			if($model_detail->validate()){
				$validateCustomer = true;
			}

			if($model_hcontact->validate()){
				$validateContactHdr = true;
			}

			if($model_dcontact->validate()){
				$validateContactDtl = true;
			}
		}

		$this->render('managecustomer', array(
			'activeTab'=>$activeTab,
			'model_detail'=>$model_detail,
			'list'=>$list
			//'model_hcontact'=>$model_hcontact, 
			//'model_dcontact'=>$model_dcontact
		));
	}

	public function actionValidateForm(){

		$model_detail = new CustomerForm;
		$model_hcontact = new HContactPersonForm;
		$model_dcontact = new DContactPersonForm;
		
		$activeTab = "customerdetail";
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form-customerdetail-form')
		{
			echo CActiveForm::validate($model_detail);
			echo CActiveForm::validate($model_hcontact);
			echo CActiveForm::validate($model_dcontact);
			Yii::app()->end();
		}

		$model_detail->attributes=$_POST['CustomerForm'];

		$hcontact = $_POST["HContactPersonForm"];
		for($i = 0; $i < count($hcontact); $i++){
			$model_hcontact = new HContactPersonForm;
			$model_hcontact = $hcontact[$i]["Name"] ;
		}

		if($model_detail->validate()){
			$validateCustomer = true;
		}

		if($model_hcontact->validate()){
			$validateContactHdr = true;
		}

		if($model_dcontact->validate()){
			$validateContactDtl = true;
		}

	}

	public function actionGetCountryList(){
		$model=new CustomerForm;
		$countryList = array();
		$id = "NULL";

		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['id']) && $_POST['id'] != null && $_POST['id'] != ""){				
				$id = $_POST['id'];
				$countryList = $model->getCountryList($id);
			}else{
				$countryList = $model->getCountryList($id);
				//array_unshift($countryList, array('CountryId'=>'0', 'Country'=>''));
			}
		}
		echo json_encode($countryList);
	}

	public function actionGetCompanyTypeList(){
		$model=new CustomerForm;
		$companyTypeList = array();
		$id = "NULL";

		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['id']) && $_POST['id'] != null && $_POST['id'] != ""){				
				$id = $_POST['id'];
				$companyTypeList = $model->getCompanyTypeList($id);
			}else{
				$companyTypeList = $model->getCompanyTypeList($id);
				//array_unshift($companyTypeList, array('CompanyTypeId'=>'0', 'CompanyType'=>''));
			}
		}
		echo json_encode($companyTypeList);
	}

	public function actionGetPhoneTypeList(){
		$model=new DContactPersonForm;
		$list = array();
		$id = "NULL";

		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['id']) && $_POST['id'] != null && $_POST['id'] != ""){				
				$id = $_POST['id'];
				$list = $model->getPhoneTypeList($id);
			}else{
				$list = $model->getPhoneTypeList($id);
				//array_unshift($list, array('PhoneTypeId'=>'0', 'PhoneType'=>''));
			}
		}
		echo json_encode($list);
	}

	public function actionaddNewForm()
	{
		$model_hcontact = new HContactPersonForm;
		$model_dcontact = new DContactPersonForm;
		
		$this->renderPartial('contactperson',array('model_hcontact'=>$model_hcontact,'model_dcontact'=>$model_dcontact), false, true);
	}

	public function actionaddNewContact($index)
	{
		$model_hcontact = new HContactPersonForm;		

		$this->renderPartial('contactperson',array('model_hcontact'=>$model_hcontact,'index'=>$index,'display'=>'block'), false, true);
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