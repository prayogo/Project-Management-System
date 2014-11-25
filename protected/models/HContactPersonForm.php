<?php

/**
 * This is the model class for table "TrHContactPerson".
 *
 * The followings are the available columns in table 'TrHContactPerson':
 * @property integer $HContactPId
 * @property integer $CustomerId
 * @property string $Name
 * @property string $Email
 * @property string $Job
 */
class HContactPersonForm extends CActiveRecord
{
	public $isChange = false;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TrHContactPerson';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CustomerId, Name, Email', 'required'),
			array('CustomerId', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>250),
			array('Email', 'length', 'max'=>100),
			array('Job', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('HContactPId, CustomerId, Name, Email, Job', 'safe', 'on'=>'search'),
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
			'HContactPId' => 'Hcontact Pid',
			'CustomerId' => 'Customer',
			'Name' => 'Name',
			'Email' => 'Email',
			'Job' => 'Position',
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

		$criteria->compare('HContactPId',$this->HContactPId);
		$criteria->compare('CustomerId',$this->CustomerId);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Job',$this->Job,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HContactPersonForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
