<?php

class UserController extends Controller
{
	public $layout='//layouts/master';
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->actionManageuser();
	}

	public function actionManageuser()
	{
		$model_detail=new UserDetailForm;
		$model_detail->Enable=1;

		$activeTab = "userdetail";

		$model_access=new UserAccessForm;
		$checkAccess=array();
		
		$model_user=new UserGroupForm;
		$checkGroup=array();
		
		if(isset($_POST['UserDetailForm'])){
			$model_detail->setUsername($_POST['UserDetailForm']['Username']);
		}

		if(isset($_POST['ajax']) && $_POST['ajax']==='user-detail-form-userdetail-form')
		{
			echo CActiveForm::validate($model_detail);
			echo CActiveForm::validate($model_access);
			Yii::app()->end();
		}
		
		// user detail form POST
		if(isset($_POST['UserDetailForm']))
		{
			$model_detail->attributes=$_POST['UserDetailForm'];			
			$model_detail->UserId = $_POST['UserDetailForm']['UserId'];
			if ($model_detail->UserId != null && $model_detail->UserId != ""){
				$model_detail->setScenario('update');
			}else{
				$model_detail->setScenario('insert');
			}

			if($model_detail->validate())
			{
				$model_detail->Username = $_POST['UserDetailForm']['Username'];
				$model_detail->Name = $_POST['UserDetailForm']['Name'];
				$model_detail->Email = $_POST['UserDetailForm']['Email'];
				$model_detail->Phone = $_POST['UserDetailForm']['Phone'];
				$model_detail->Password = $_POST['UserDetailForm']['Password'];				
				$model_detail->Enable = $_POST['UserDetailForm']['Enable'];				
				$model_detail->Copy_User = $_POST['UserDetailForm']['Copy_User'];
				$model_detail->User = $_POST['UserDetailForm']['User'];
				$model_detail->isChange=$_POST['UserDetailForm']['isChange'];
				
				if (isset($_POST['UserAccessForm']['isChange']) && $_POST['UserAccessForm']['isChange'] != null && $_POST['UserAccessForm']['isChange'] != ""){
					
					if (isset($_POST['UserAccessForm']["UserAccess"])){
						$activeTab = "useraccess";
						$model_access->isChange=$_POST['UserAccessForm']['isChange'];
						foreach ($_POST['UserAccessForm']["UserAccess"] as $key => $value) {
							if ($value == "on"){
								array_push($checkAccess, $key);
							}
						}
					}
					else{
						array_push($checkAccess, 0);
					}
					
				}
				
				if (isset($_POST['UserGroupForm']['isChange']) && $_POST['UserGroupForm']['isChange'] != null && $_POST['UserGroupForm']['isChange'] != ""){
					
					if (isset($_POST['UserGroupForm']["UserGroup"])){
						$activeTab = "usergroup";
					  	$model_user->isChange=$_POST['UserGroupForm']['isChange'];
					  	foreach ($_POST['UserGroupForm']["UserGroup"] as $key => $value) {
						  	if ($value == "on"){
							  	array_push($checkGroup, $key);
						  	}
					  	}
					}
				  	else{
				  		array_push($checkGroup, 0);
				  	}
				}

				$response = $model_detail->getUserDetail($model_detail->UserId);
				
				if ($model_detail->UserId != null && $model_detail->UserId != ""){					
					if (!empty($response) && isset($response[0]['UserId'])){						
						$response1 = $model_detail->updateUser($model_detail->UserId, $model_detail->Username, $model_detail->Name, $model_detail->Email, $model_detail->Phone, $model_detail->Password, $model_detail->Enable, $model_detail->isChange, $checkAccess, $checkGroup);
						if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
							$this->redirect(array('um/user'));
						}else{
							if (isset($response1['exception'][2])){
								$model_detail->addError('request', $response1['exception'][2]);
							}else{
								$model_detail->addError('request', 'Oops, something wrong. Please try again later.');
							}
						}
					}
					else{
						$model_detail->addError('request', 'User not exists');
					}
				}
				else{
					$response1 = $model_detail->insertUser($model_detail->Username, $model_detail->Name, $model_detail->Email, $model_detail->Phone, $model_detail->Password, $model_detail->Enable, $model_detail->isChange, $checkAccess, $checkGroup);
					if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){						
						$this->redirect(array('um/user'));
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
				$response = $model_detail->getUserDetail($paramURL);
				if (!empty($response) && isset($response[0]['UserId'])){
					$model_detail->UserId = $response[0]['UserId'];
					$model_detail->Username = $response[0]['Username'];
					$model_detail->Name = $response[0]['Name'];
					$model_detail->Email = $response[0]['Email'];
					$model_detail->Phone = $response[0]['Phone'];					  
					$model_detail->Enable = $response[0]['Enable'];
					$model_detail->Password = StandardVariable::CONSTANT_PASSWORD;
					$model_detail->Confirm_Password = StandardVariable::CONSTANT_PASSWORD;

					$response2 = $model_access->getUserAccessList($model_detail->UserId);
					if (!isset($response2['code'])){
						foreach ($response2 as $row) {
							if ($row["canAccess"] == "1"){
								array_push($checkAccess, $row["MenuId"]);
							}
						}
					}
						
					$response3 = $model_user->getUserGroupList($model_detail->UserId);
					if (!isset($response3['code'])){
						foreach ($response3 as $row) {
							if ($row["canAccess"] == "1"){
								array_push($checkGroup, $row["HGroupId"]);
							}
						}
					}
				  }
			}	
		}

		$this->render('manageuser', array(
			'activeTab'=>$activeTab,
			'model_detail'=>$model_detail, 
			'model_access'=>$model_access, 
			'model_user'=>$model_user, 
			'checkAccess' => $checkAccess,
			'checkGroup' => $checkGroup
		));
	}

	public function actionGetUserList(){
		$model=new UserDetailForm;
		$userList = "";
				
		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['userid']) && $_POST['userid'] != null && $_POST['userid'] != ""){
				$userList = $model->getUserList($_POST['userid']);
			}
			else {
				$userList = $model->getUserList(0);
				array_unshift($userList, array('UserId'=>'0', 'Username'=>''));
			}
		}
		echo json_encode($userList);
	}

	public function actionCopyUserList(){
		$model=new UserDetailForm;
		$userList = array();
		$currId = "0";
		$copyId = "NULL";

		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['userid']) && $_POST['userid'] != null && $_POST['userid'] != ""){
				$currId = $_POST['userid'];
			}
			if (isset($_POST['User']) && $_POST['User'] != null && $_POST['User'] != ""){
				$copyId = $_POST['User'];
				$userList = $model->getCopyUserList($currId, $copyId);
			}else{
				$userList = $model->getCopyUserList($currId, $copyId);
				array_unshift($userList, array('UserId'=>'0', 'Username'=>''));
			}			
		}
		echo json_encode($userList);
	}

	public function actionUserAccessList(){
		$model=new UserAccessForm;
		$UserId = "0";
		$accessList = array();
		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['userid']) && $_POST['userid'] != null && $_POST['userid'] != ""){
				$UserId = $_POST['userid'];
			}
			
			$accessList = $model->getUserAccessList($UserId);
		}
		echo json_encode($accessList);
	}

	public function actionUserGroupList(){
		$model=new UserGroupForm;
		$UserId = "0";
		$accessList = array();
		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['userid']) && $_POST['userid'] != null && $_POST['userid'] != ""){
				$UserId = $_POST['userid'];
			}
			
			$accessList = $model->getUserGroupList($UserId);
		}
		echo json_encode($accessList);
	}
}