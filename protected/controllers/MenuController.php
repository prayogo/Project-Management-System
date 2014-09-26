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
			if($model->validate())
			{
				$Caption = $_POST['MenuDetailForm']['Caption'];
				$Link = $_POST['MenuDetailForm']['Link'];
				$Icon = $_POST['MenuDetailForm']['IconCSS'];
				$Description = $_POST['MenuDetailForm']['Description'];
				$Enable = $_POST['MenuDetailForm']['Enable'];
					
				$response = $model->getMenuDetail($model->MenuId);
				if ($model->MenuId != null && $model->MenuId != ""){
					if (!empty($response) && isset($response['MenuId'])){
						echo 1;	
					}
					else{
						$response1 = $model->insertMenu($Caption, $Link, $Icon, $Description, $Enable);
						if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
							$this->redirect(array('um/menu'));
						}else{
							$model->addError('request', $response1['exception'][2]);
						}
					}
				}
				else{
					$response1 = $model->insertMenu($Caption, $Link, $Icon, $Description, $Enable);
					if ($response1['code'] == StandardVariable::CONSTANT_RETURN_SUCCESS){
						$this->redirect(array('um/menu'));
					}else{
						$model->addError('request', $response1['exception'][2]);
					}
				}
			}
		}

		$this->render('managemenu', array('model'=>$model));
	}
}