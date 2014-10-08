<?php

/**
 * This is the model class for table "trheadergroup".
 *
 * The followings are the available columns in table 'trheadergroup':
 * @property integer $HGroupId
 * @property string $Group
 * @property string $Description
 * @property string $Enable
 */
class GroupHeaderForm extends CActiveRecord
{
	public $isCopyGroup;
	public $GroupIdCopy;
	public $isChange = false;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trheadergroup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Group, Description', 'required'),
			array('Group', 'length', 'max'=>50),
			array('Description', 'length', 'max'=>250),
			array('Enable', 'length', 'max'=>1),
			array('isCopyGroup', 'boolean'),
			array('GroupIdCopy', 'numerical','integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('HGroupId, Group, Description, Enable', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'HGroupId' => 'GroupId',
			'Group' => 'Group',
			'Description' => 'Description',
			'Enable' => 'Enable',
			'isCopyGroup' => 'Copy Group',
			'GroupIdCopy' => 'Group',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('HGroupId',$this->HGroupId);
		$criteria->compare('Group',$this->Group,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Enable',$this->Enable,true);
		$criteria->compare('isCopyGroup',$this->Enable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GroupHeaderForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Function for get list group
	 */
	public function getGroupList(){
		$connection=Yii::app()->db;
		$connection->active=true;
	
		try
		{ 
			$sql = "call spr_get_grouplist";
			$command=$connection->createCommand($sql);
			$dataReader=$command->query();
			$rows=$dataReader->readAll();
			return $rows;
		}
		catch(Exception $e)
		{
			$response = array('code'=>'', 'exception'=>'');
			$response['code'] = StandardVariable::CONSTANT_RETUNN_ERROR;
			$response['exception'] = $e->errorInfo;
			return $response;
		}
	}
	
	/**
	 * Function for get group list, return group id dan group name
	 * @param int $currGroupId, select all menu list except given group id
	 * @param int $findById, group id which want to find
	*/
	public function getCopyGroupList($currGroupId, $findById){
		$connection=Yii::app()->db;
		$connection->active=true;
	
		try
		{ 
			$sql = "call spr_get_copygrouplist (".$currGroupId.", ".$findById.")";
			$command=$connection->createCommand($sql);
			$dataReader=$command->query();
			$rows=$dataReader->readAll();
			return $rows;
		}
		catch(Exception $e)
		{
			$response = array('code'=>'', 'exception'=>'');
			$response['code'] = StandardVariable::CONSTANT_RETUNN_ERROR;
			$response['exception'] = $e->errorInfo;
			return $response;
		}
	}
	
	/**
	 * Function for insert group detail
	 * @param string $Group, group name.
	 * @param string $Description, group description.
	 * @param string $Enable, enable/disable group.
	 * @param string $isChange, flag for field change in view.
	 * @param string $groupAccess, array of menu id which want assign to group.
	 * @param string $groupUser, array of user id which want assign to group.
	*/
	public function insertGroup($Group, $Description, $Enable, $isChange, $groupAccess, $groupUser)
	{
		$response = array('code'=>'', 'exception'=>'');
		$connection=Yii::app()->db;
		$connection->active=true;
		$username=GlobalFunction::getLoginUserName();
		
		$transaction=$connection->beginTransaction();
		try
		{ 
			$id = 0;
			if ($isChange == "1"){
				$sql = "call Spr_Insert_GroupDetail ('".$Group."','".$Description."',".$Enable.",'".$username."')";
				$command=$connection->createCommand($sql);
				$dataReader=$command->query();
				$rows=$dataReader->readAll();
				$id = $rows[0]["primaryid"];
				$dataReader->close();
			}
			
			$command = false;
			
			for($i = 0; $i < count($groupAccess); $i++){
				$sql = "call Spr_Insert_Update_GroupAccess (".$id.", ".$groupAccess[$i].",'".$username."')";
				$command=$connection->createCommand($sql);
				$status=$command->execute();
			}
			
			for($i = 0; $i < count($groupUser); $i++){
				$sql = "call Spr_Insert_Update_GroupUser (".$id.", ".$groupUser[$i].",'".$username."')";
				$command=$connection->createCommand($sql);
				$status=$command->execute();
			}
			
		   	$transaction->commit();
		   	$response['code'] = StandardVariable::CONSTANT_RETURN_SUCCESS;
		}
		catch(Exception $e)
		{
			$response['code'] = StandardVariable::CONSTANT_RETUNN_ERROR;
			$response['exception'] = $e->errorInfo;
		   	$transaction->rollback();
		}
		
		return $response;
	}
	
	/**
	 * Function for insert group detail
	 * @param string $GroupId, group id.
	 * @param string $Group, group name.
	 * @param string $Description, group description.
	 * @param string $Enable, enable/disable group.
	 * @param string $isChange, flag for field change in view.
	 * @param string $groupAccess, array of menu id which want assign to group.
	 * @param string $groupUser, array of user id which want assign to group.
	*/
	public function updateGroup($GroupId, $Group, $Description, $Enable, $isChange, $groupAccess, $groupUser)
	{
		$response = array('code'=>'', 'exception'=>'');
		$connection=Yii::app()->db;
		$connection->active=true;
		$username=GlobalFunction::getLoginUserName();
		
		$transaction=$connection->beginTransaction();
		
		try
		{ 
			if ($isChange == "1"){
				$sql = "call Spr_Update_GroupDetail (".$GroupId.",'".$Group."','".$Description."',".$Enable.",'".$username."')";
				$command=$connection->createCommand($sql);
				$dataReader=$command->execute();
			}
			
			$command = false;
			$strParamAccess= "";
			for($i = 0; $i < count($groupAccess); $i++){
				$strParamAccess = $strParamAccess.','.$groupAccess[$i];
				if ($groupAccess[$i] != 0){
					$sql = "call Spr_Insert_Update_GroupAccess (".$GroupId.", ".$groupAccess[$i].",'".$username."')";
					$command=$connection->createCommand($sql);
					$status=$command->execute();
				}
			}
			if (count($groupAccess) > 0){
				$strParamAccess = substr($strParamAccess, 1);
				$sql = "call Spr_Delete_GroupAccess (".$GroupId.", '".$strParamAccess."', '".$username."')";
				$command=$connection->createCommand($sql);
				$status=$command->execute();
			}
			
			$strParamUser = "";
			for($i = 0; $i < count($groupUser); $i++){
				$strParamUser = $strParamUser.','.$groupUser[$i];
				if ($groupUser[$i] != 0){
					$sql = "call Spr_Insert_Update_GroupUser (".$GroupId.", ".$groupUser[$i].",'".$username."')"; 
					$command=$connection->createCommand($sql);
					$status=$command->execute();
				}
			}
			
			if (count($groupUser) > 0){
				$strParamUser = substr($strParamUser, 1);
				$sql = "call Spr_Delete_GroupUser (".$GroupId.", '".$strParamUser."', '".$username."')";
				$command=$connection->createCommand($sql);
				$status=$command->execute();
			}

		   	$transaction->commit();
		   	$response['code'] = StandardVariable::CONSTANT_RETURN_SUCCESS;
		}
		catch(Exception $e)
		{
			$response['code'] = StandardVariable::CONSTANT_RETUNN_ERROR;
			$response['exception'] = $e->errorInfo;			
		   	$transaction->rollback();
		}
		
		return $response;
	}
	
	public function getGroupHeaderDetail($GroupId){
		$connection=Yii::app()->db;
		$connection->active=true;
	
		try
		{ 
			$sql = "call Spr_Get_GroupHeaderDetail (".$GroupId.")";
			$command=$connection->createCommand($sql);
			$dataReader=$command->query();
			$rows=$dataReader->readAll();
			return $rows;
		}
		catch(Exception $e)
		{
			$response = array('code'=>'', 'exception'=>'');
			$response['code'] = StandardVariable::CONSTANT_RETUNN_ERROR;
			$response['exception'] = $e->errorInfo;
			return $response;
		}
	}
	
	public function deleteGroup($GroupId){
		$response = array('code'=>'', 'exception'=>'');
		$connection=Yii::app()->db;
		$connection->active=true;
		$username=GlobalFunction::getLoginUserName();
		
		$transaction=$connection->beginTransaction();
		
		try
		{ 
			$sql = "call Spr_Delete_GroupDetail (".$GroupId.",'".$username."')";
			$command=$connection->createCommand($sql);
			$status=$command->execute();
			
			$sql = "call Spr_Delete_GroupAccess (".$GroupId.", '0', '".$username."')";
			$command=$connection->createCommand($sql);
			$status=$command->execute();
			
			$sql = "call Spr_Delete_GroupUser (".$GroupId.", '0', '".$username."')";
			$command=$connection->createCommand($sql);
			$status=$command->execute();

		   	$transaction->commit();
		   	$response['code'] = StandardVariable::CONSTANT_RETURN_SUCCESS;
		}
		catch(Exception $e)
		{
			$response['code'] = StandardVariable::CONSTANT_RETUNN_ERROR;
			$response['exception'] = $e->errorInfo;			
		   	$transaction->rollback();
		}
		
		return $response;
	}
}
