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
		$model=new UserDetailForm;
		$model->Enable=1;
		
		if(isset($_POST['UserDetailForm'])){
			$model->setUsername($_POST['UserDetailForm']['Username']);
		}

		if(isset($_POST['ajax']) && $_POST['ajax']==='user-detail-form-userdetail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// user detail form POST
		if(isset($_POST['UserDetailForm']))
		{
			$model->attributes=$_POST['UserDetailForm'];			
			$model->UserId = $_POST['UserDetailForm']['UserId'];
			if ($model->UserId != null && $model->UserId != ""){
				$model->setScenario('update');
			}else{
				$model->setScenario('insert');
			}

			if($model->validate())
			{
				$model->Username = $_POST['UserDetailForm']['Username'];
				$model->Name = $_POST['UserDetailForm']['Name'];
				$model->Email = $_POST['UserDetailForm']['Email'];
				$model->Phone = $_POST['UserDetailForm']['Phone'];
				$model->Password = $_POST['UserDetailForm']['Password'];				
				$model->Enable = $_POST['UserDetailForm']['Enable'];				
				$model->Copy_User = $_POST['UserDetailForm']['Copy_User'];
				$model->User = $_POST['UserDetailForm']['User'];
				


				$response = $model->getUserDetail($model->UserId);
				
				if ($model->UserId != null && $model->UserId != ""){					
					if (!empty($response) && isset($response[0]['UserId'])){						
						$response1 = $model->updateUser($model->Username, $model->Name, $model->Email, $model->Phone,$model->Password, $model->Enable, $model->Copy_User, $model->User);
						if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
							$this->redirect(array('um/user'));
						}else{
							$model->addError('request', $response1['exception'][2]);
						}
					}
					else{
						$model->addError('request', 'User not exists');
					}
				}
				else{
					$response1 = $model->insertUser($model->Username, $model->Name, $model->Email, $model->Phone,$model->Password, $model->Enable, $model->Copy_User, $model->User);
					if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){						
						$this->redirect(array('um/user'));
					}else{
						$model->addError('request', $response1['exception'][2]);
					}
				}
			}
		}else{
			$paramURL = CHttpRequest::getParam('id');
			if (isset($paramURL) && $paramURL != null && $paramURL != ""){
				$response = $model->getUserDetail($paramURL);
				if (!empty($response) && isset($response[0]['UserId'])){
					  $model->UserId = $response[0]['UserId'];
					  $model->Username = $response[0]['Username'];
					  $model->Name = $response[0]['Name'];
					  $model->Email = $response[0]['Email'];
					  $model->Phone = $response[0]['Phone'];					  
					  $model->Enable = $response[0]['Enable'];
					  $model->Password = StandardVariable::CONSTANT_PASSWORD;
					  $model->Confirm_Password = StandardVariable::CONSTANT_PASSWORD;
				  }
			}	
		}
		
		$this->render('manageuser', array('model'=>$model));
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
}