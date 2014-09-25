<?php

/**
 * This is the model class for table "msmenu".
 *
 * The followings are the available columns in table 'msmenu':
 * @property integer $MenuId
 * @property string $Caption
 * @property string $Link
 * @property string $IconCSS
 * @property string $Description
 * @property boolean $Enable
 */
class MenuDetailForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'msmenu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Caption, Description', 'required'),
			array('Caption, Link, IconCSS', 'length', 'max'=>250),
			array('Description', 'length', 'max'=>500),
			array('Enable', 'boolean'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('MenuId, Caption, Link, IconCSS, Description, Enable', 'safe', 'on'=>'search'),
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
			'MenuId' => 'MenuId',
			'Caption' => 'Caption',
			'Link' => 'Link',
			'IconCSS' => 'Icon',
			'Description' => 'Description',
			'Enable' => 'Enable',
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

		$criteria->compare('MenuId',$this->MenuId);
		$criteria->compare('Caption',$this->Caption,true);
		$criteria->compare('Link',$this->Link,true);
		$criteria->compare('IconCSS',$this->IconCSS,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Enable',$this->Enable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuDetailForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * Function for insert menu detail
	 * @param string $Caption, menu caption.
	 * @param string $Link, menu link address.
	 * @param string $Icon, icon css class name.
	 * @param string $Description, menu description.
	 * @param boolean $Enable, enable/disable menu.
	*/
	public function insertMenu($Caption, $Link, $Icon, $Description, $Enable)
	{
		$response = array('code'=>'', 'exception'=>'');
		$connection=Yii::app()->db;
		$connection->active=true;
		$username=GlobalFunction::getLoginUserName();
		
		$transaction=$connection->beginTransaction();
		try
		{ 
			$sql = "call Spr_Insert_Menu ('".$Caption."', '".$Link."', '".$Icon."', 
				'".$Description."', '".$Enable."', '".$username."')";
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
	
	/**
	 * Function for get single menu detail, return 1 row
	 * @param string $MenuId, menu id.
	*/
	public function getMenuDetail($MenuId){
		$connection=Yii::app()->db;
		$connection->active=true;
	
		try
		{ 
			$sql = "call Spr_Get_MenuDetail (".$MenuId.")";
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
	 * Function for get list menu
	*/
	public function getMenuList(){
		$connection=Yii::app()->db;
		$connection->active=true;
	
		try
		{ 
			$sql = "call Spr_Get_MenuList";
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
}
