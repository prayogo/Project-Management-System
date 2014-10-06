<?php

class GroupController extends Controller
{
	public $layout='//layouts/master';
	
	public function actionManagegroup()
	{
		$model_detail=new GroupHeaderForm;
		$model_detail->Enable=1;
		$model_detail->isCopyGroup=0;
		$model_detail->isChange=false;
		
		$activeTab = "groupdetail";
		
		$model_access=new GroupAccessForm;
		$checkAccess=array();
		
		$model_user=new GroupUserForm;
		$checkUser=array();
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='group-header-form-form')
		{
			echo CActiveForm::validate($model_detail);
			Yii::app()->end();
		}
		
		if (isset($_POST['GroupHeaderForm'])){
			$activeTab = "groupdetail";
			$model_detail->attributes=$_POST['GroupHeaderForm'];
			$model_detail->HGroupId = $_POST['GroupHeaderForm']['HGroupId'];
			if ($model_detail->HGroupId != null && $model_detail->HGroupId != ""){
				$model_detail->setScenario('update');
			}else{
				$model_detail->setScenario('insert');
			}
			
			if($model_detail->validate())
			{
				$model_detail->HGroupId = $_POST['GroupHeaderForm']['HGroupId'];
				$model_detail->Group = $_POST['GroupHeaderForm']['Group'];
				$model_detail->Description = $_POST['GroupHeaderForm']['Description'];
				$model_detail->isCopyGroup = $_POST['GroupHeaderForm']['isCopyGroup'];
				$model_detail->GroupIdCopy = $_POST['GroupHeaderForm']['GroupIdCopy'];
				$model_detail->Enable = $_POST['GroupHeaderForm']['Enable'];
				$model_detail->isChange=$_POST['GroupHeaderForm']['isChange'];
			
				if (isset($_POST['GroupAccessForm']['isChange']) && $_POST['GroupAccessForm']['isChange'] != null && 
					$_POST['GroupAccessForm']['isChange'] != ""){
	
					if (isset($_POST['GroupAccessForm']["GroupAccess"])){
						$activeTab = "groupaccess";
						$model_access->isChange=$_POST['GroupAccessForm']['isChange'];
						foreach ($_POST['GroupAccessForm']["GroupAccess"] as $key => $value) {
							if ($value == "on"){
								array_push($checkAccess, $key);
							}
						}
					}
					
				}
				
				if (isset($_POST['GroupUserForm']['isChange']) && $_POST['GroupUserForm']['isChange'] != null && 
					$_POST['GroupUserForm']['isChange'] != ""){
					
					if (isset($_POST['GroupUserForm']["GroupUser"])){
						$activeTab = "groupuser";
					  	$model_user->isChange=$_POST['GroupUserForm']['isChange'];
					  	foreach ($_POST['GroupUserForm']["GroupUser"] as $key => $value) {
						  	if ($value == "on"){
							  	array_push($checkUser, $key);
						  	}
					  	}
					}
					
				}
				
				if ($model_detail->HGroupId != null && $model_detail->HGroupId != ""){
					$response1 = $model_detail->updateGroup($model_detail->HGroupId, $model_detail->Group, $model_detail->Description, $model_detail->Enable, $model_detail->isChange, $checkAccess, $checkUser);
					if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
						$this->redirect(array('um/group'));
					}else{
						if (isset($response1['exception'][2])){
							$model_detail->addError('request', $response1['exception'][2]);
						}else{
							$model_detail->addError('request', 'Oops, something wrong. Please try again later.');
						}
					}
				}
				else{
					$response1 = $model_detail->insertGroup($model_detail->Group, $model_detail->Description, $model_detail->Enable, $model_detail->isChange, $checkAccess, $checkUser);
					if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
						$this->redirect(array('um/group'));
					}else{
						if (isset($response1['exception'][2])){
							$model_detail->addError('request', $response1['exception'][2]);
						}else{
							$model_detail->addError('request', 'Oops, something wrong. Please try again later.');
						}
					}
				}
			}
		}else{
			$paramURL = CHttpRequest::getParam('id');
			if (isset($paramURL) && $paramURL != null && $paramURL != ""){
				$response = $model_detail->getGroupHeaderDetail($paramURL);
				if (!isset($response['code'])){
					if (!empty($response) && isset($response[0]['HGroupId'])){
						$model_detail->HGroupId = $response[0]['HGroupId'];
						$model_detail->Group = $response[0]['Group'];
						$model_detail->Description = $response[0]['Description'];
						$model_detail->Enable = $response[0]['Enable'];
						  
						$response2 = $model_access->getGroupAccessList($model_detail->HGroupId);
						if (!isset($response2['code'])){
							foreach ($response2 as $row) {
								if ($row["canAccess"] == "1"){
									array_push($checkAccess, $row["MenuId"]);
								}
							}
						}
						
						$response3 = $model_user->getGroupUserList($model_detail->HGroupId);
						if (!isset($response3['code'])){
							foreach ($response3 as $row) {
								if ($row["canAccess"] == "1"){
									array_push($checkUser, $row["UserId"]);
								}
							}
						}
					}
				}
			}	
		}
		
		$this->render('managegroup', array(
			'activeTab'=>$activeTab,
			'model_detail'=>$model_detail, 
			'model_access'=>$model_access, 
			'model_user'=>$model_user, 
			'checkAccess' => $checkAccess,
			'checkUser' => $checkUser
		));
	}
	
	public function actionGetGroupList(){
		$model=new GroupHeaderForm;
		$currId = "0";
		$copyId = "NULL";
		$groupList = array();
		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['groupid']) && $_POST['groupid'] != null && $_POST['groupid'] != ""){
				$currId = $_POST['groupid'];
			}
			if (isset($_POST['copyid']) && $_POST['copyid'] != null && $_POST['copyid'] != ""){
				$copyId = $_POST['copyid'];
				$groupList = $model->getCopyGroupList($currId, $copyId);
			}else{
				$groupList = $model->getCopyGroupList($currId, $copyId);
				array_unshift($groupList, array('HGroupId'=>'0', 'Group'=>''));
			}
		}
		echo json_encode($groupList);
	}
	
	public function actionGroupAccessList(){
		$model=new GroupAccessForm;
		$GroupId = "0";
		$accessList = array();
		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['groupid']) && $_POST['groupid'] != null && $_POST['groupid'] != ""){
				$GroupId = $_POST['groupid'];
			}
			
			$accessList = $model->getGroupAccessList($GroupId);
		}
		echo json_encode($accessList);
	}
	
	public function actionGroupUserList(){
		$model=new GroupUserForm;
		$GroupId = "0";
		$accessList = array();
		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['groupid']) && $_POST['groupid'] != null && $_POST['groupid'] != ""){
				$GroupId = $_POST['groupid'];
			}
			
			$accessList = $model->getGroupUserList($GroupId);
		}
		echo json_encode($accessList);
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