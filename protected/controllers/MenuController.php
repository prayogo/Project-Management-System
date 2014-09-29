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
		if(isset($_POST['MenuDetailForm']) && isset($_POST['ParentId']))
		{
			$model->attributes=$_POST['MenuDetailForm'];
			if($model->validate())
			{
				$model->MenuId = $_POST['MenuDetailForm']['MenuId'];
				$model->Caption = $_POST['MenuDetailForm']['Caption'];
				$model->Link = $_POST['MenuDetailForm']['Link'];
				$model->IconCSS = $_POST['MenuDetailForm']['IconCSS'];
				$model->Description = $_POST['MenuDetailForm']['Description'];
				$model->ParentId = $_POST['ParentId'];
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
						$response1 = $model->insertMenu($model->Caption, $model->Link, $model->IconCSS, $model->Description, $model->ParentId, $model->Enable);
						if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
							$this->redirect(array('um/menu'));
						}else{
							$model->addError('request', $response1['exception'][2]);
						}
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
					  $model->Enable = $response[0]['Enable'];
				  }
			}	
		}
		
		if (isset($model->MenuId) && $model->MenuId != null && $model->MenuId != ""){
			$parentList = $model->getParentMenuList($model->MenuId);	
		}else{
			$parentList = $model->getParentMenuList(0);
		}

		$this->render('managemenu', array('model'=>$model, 'data'=>$parentList));
	}
}