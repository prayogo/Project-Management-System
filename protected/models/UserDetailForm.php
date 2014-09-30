<?php

/**
 * This is the model class for table "msuser".
 *
 * The followings are the available columns in table 'msuser':
 * @property integer $UserId
 * @property string $Username
 * @property string $Name
 * @property string $Email
 * @property string $Phone
 * @property string $Password
 * @property string $Enable
 * @property string $UserIn
 * @property string $DateIn
 * @property string $UserUp
 * @property string $DateUp
 */
class UserDetailForm extends CActiveRecord
{
	public $Confirm_Password;
	public $Copy_User;
	public $User;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'msuser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Username, Name, Email, Phone, Password, Confirm_Password', 'required'),
			array('Username, Password, Confirm_Password', 'length', 'max'=>50),
			array('Name', 'length', 'max'=>250),
			array('Email', 'length', 'max'=>150),			
			array('Phone', 'length', 'max'=>20),			
			array('Enable', 'boolean'),
			array('Password','compare','compareAttribute'=>'Confirm_Password'),
			array('Email', 'email'),
			array('Username','unique','on'=>'insert'),
			array('Email','unique','on'=>'insert'),
			array('Phone', 'numerical','integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('UserId, Username, Name, Email, Phone, Password, Enable', 'safe', 'on'=>'search'),
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
			'UserId' => 'UserId',
			'Username' => 'Username',
			'Name' => 'Name',
			'Email' => 'Email',
			'Phone' => 'Phone',
			'Password' => 'Password',
			'Confirm_Password' => 'Confirm Password',
			'Copy_User' => 'Copy User Access',
			'Enable' => 'Enable',
			'User' => 'User',
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

		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Enable',$this->Enable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserDetailForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Function for get single user detail, return 1 row
	 * @param string $UserId, user id.
	*/
	public function getUserDetail($UserId){
		$connection=Yii::app()->db;
		$connection->active=true;
	
		try
		{ 
			$sql = "call Spr_Get_UserDetail (".$UserId.")";
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
	 * Function for get list user
	*/
	public function getUserList(){
		$connection=Yii::app()->db;
		$connection->active=true;
	
		try
		{ 
			$sql = "call Spr_Get_UserList()";
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
	 * Function for insert user detail
	 * @param string $Username, username.
	 * @param string $Name, name.
	 * @param string $Email, email.
	 * @param string $Phone, phone.
	 * @param string $Password, password
	 * @param boolean $Enable, enable/disable menu.
	 * @param int $UserId, Source User Id.
	*/
	public function insertUser($Username, $Name, $Email, $Phone, $Password, $Enable, $UserId)
	{
		$response = array('code'=>'', 'exception'=>'');
		$connection=Yii::app()->db;
		$connection->active=true;
		$userin=GlobalFunction::getLoginUserName();
		
		$transaction=$connection->beginTransaction();
		try
		{ 
			$sql = "call Spr_Insert_User ('".$Username."', '".$Name."', '".$Email."', 
				'".$Phone."','".$Password."','".$Enable."', '".$userin."')";
			$command=$connection->createCommand($sql);
			$status=$command->execute();
			
			if(isset($UserId) && $UserId != null && $UserId != ""){
				copyUserAccess($Username, $UserId, $transaction);
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
	 * Function for copy user access
	 * @param string $Username, destination username.
	 * @param int $UserId, source user.
	 * @param object $transaction, Sql Transaction.
	*/
	public function copyUserAccess($Username, $UserId, $transaction)
	{
		$response = array('code'=>'', 'exception'=>'');
		$connection=Yii::app()->db;
		$connection->active=true;
		$userin=GlobalFunction::getLoginUserName();
		
		try
		{ 
			$sql = "call Spr_Copy_User_Access ('".$Username."', ".$UserId.", '".$userin."')";
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

