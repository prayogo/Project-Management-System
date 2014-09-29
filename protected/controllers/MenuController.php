<?php

class MenuController extends Controller
{
	public $layout='//layouts/master';
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->actionManagemenu();
	}
	
	public function actionManagemenu()
	{
		$model=new MenuDetailForm;
		$model->Enable=1;
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='menu-detail-form-menudetail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// menu detail form POST
		if(isset($_POST['MenuDetailForm']))
		{
			$model->attributes=$_POST['MenuDetailForm'];
			$model->MenuId = $_POST['MenuDetailForm']['MenuId'];
			if ($model->MenuId != null && $model->MenuId != ""){
				$model->setScenario('update');
			}else{
				$model->setScenario('insert');
			}

			if($model->validate())
			{
				$model->Caption = $_POST['MenuDetailForm']['Caption'];
				$model->Link = $_POST['MenuDetailForm']['Link'];
				$model->IconCSS = $_POST['MenuDetailForm']['IconCSS'];
				$model->Description = $_POST['MenuDetailForm']['Description'];
				$model->ParentId = $_POST['MenuDetailForm']['ParentId'];
				$model->Enable = $_POST['MenuDetailForm']['Enable'];
				if ($model->MenuId != null && $model->MenuId != ""){
					$response = $model->getMenuDetail($model->MenuId);
					if (!empty($response) && isset($response[0]['MenuId'])){
						$response1 = $model->updateMenu($model->MenuId, $model->Caption, $model->Link, $model->IconCSS, $model->Description, $model->ParentId, $model->Enable);
						if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
							$this->redirect(array('um/menu'));
						}else{
							$model->addError('request', $response1['exception'][2]);
						}
					}
					else{
						$model->addError('request', 'Menu not exists!');
					}
				}
				else{
					$response1 = $model->insertMenu($model->Caption, $model->Link, $model->IconCSS, $model->Description, $model->ParentId, $model->Enable);
					if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
						$this->redirect(array('um/menu'));
					}else{
						$model->addError('request', $response1['exception'][2]);
					}
				}
			}
		}else{
			$paramURL = CHttpRequest::getParam('id');
			if (isset($paramURL) && $paramURL != null && $paramURL != ""){
				$response = $model->getMenuDetail($paramURL);
				if (!empty($response) && isset($response[0]['MenuId'])){
					  $model->MenuId = $response[0]['MenuId'];
					  $model->Caption = $response[0]['Caption'];
					  $model->Link = $response[0]['Link'];
					  $model->IconCSS = $response[0]['IconCSS'];
					  $model->Description = $response[0]['Description'];
					  $model->ParentId = $response[0]['ParentId'];
					  $model->Enable = $response[0]['Enable'];
				  }
			}	
		}

		$this->render('managemenu', array('model'=>$model));
	}
	
	public function actionGetParentMenuList(){
		$model=new MenuDetailForm;
		$parentList = "";
		$id = "NULL";
		if (isset($_POST['ajax']) && $_POST['ajax'] != null && $_POST['ajax'] != ""){
			if (isset($_POST['menuid']) && $_POST['menuid'] != null && $_POST['menuid'] != ""){
				if (isset($_POST['id']) && $_POST['id'] != null && $_POST['id'] != ""){
					$id = $_POST['id'];
					$parentList = $model->getParentMenuList($_POST['menuid'], $id);
				}else{
					$parentList = $model->getParentMenuList($_POST['menuid'], $id);
					array_unshift($parentList, array('MenuId'=>'0', 'Caption'=>''));
				}
			}else{
				$parentList = $model->getParentMenuList(0, $id);
				array_unshift($parentList, array('MenuId'=>'0', 'Caption'=>''));
			}
		}
		echo json_encode($parentList);
	}
}