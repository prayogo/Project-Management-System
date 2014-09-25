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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-detail-form-userdetail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// user detail form POST
		if(isset($_POST['UserDetailForm']))
		{
			$model->attributes=$_POST['UserDetailForm'];
			if($model->validate())
			{
				$response = $model->getUserDetail($model->UserId);
				if ($model->UserId != null && $model->UserId != ""){
					if (!empty($response) && isset($response['UserId'])){
						echo 1;	
					}
					else{
						//$response1 = $model->insertMenu($Caption, $Link, $Icon, $Description, $Enable);
						if ($response1['code'] == 'M1'){
							$this->redirect(array('um/user'));
						}else{
							$model->addError('request', $response1['exception'][2]);
						}
					}
				}
				else{
					//$response1 = $model->insertMenu($Caption, $Link, $Icon, $Description, $Enable);
					if ($response1['code'] == 'M1'){
						$this->redirect(array('um/user'));
					}else{
						$model->addError('request', $response1['exception'][2]);
					}
				}
			}
		}

		$this->render('manageuser', array('model'=>$model));
	}
}