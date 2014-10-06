<?php

/**
 * This is the model class for table "trdetailgroupaccess".
 *
 * The followings are the available columns in table 'trdetailgroupaccess':
 * @property integer $DGroupAccessId
 * @property integer $HGroupId
 * @property integer $MenuId
 */
class GroupAccessForm extends CActiveRecord
{
	public $canAccess = false;
	public $isChange = false;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trdetailgroupaccess';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('HGroupId, MenuId', 'required'),
			array('HGroupId, MenuId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DGroupAccessId, HGroupId, MenuId', 'safe', 'on'=>'search'),
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
			'DGroupAccessId' => 'Dgroup Access',
			'HGroupId' => 'Hgroup',
			'MenuId' => 'Menu',
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

		$criteria->compare('DGroupAccessId',$this->DGroupAccessId);
		$criteria->compare('HGroupId',$this->HGroupId);
		$criteria->compare('MenuId',$this->MenuId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GroupAccessForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Function for get list group access menu
	 * @param int $GroupId, for find access by specified group id, 0 for all
	*/
	public function getGroupAccessList($GroupId){
		$connection=Yii::app()->db;
		$connection->active=true;
	
		try
		{ 
			$sql = "call Spr_Get_GroupAccessList (".$GroupId.")";
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
