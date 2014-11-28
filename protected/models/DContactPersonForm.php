<?php

/**
 * This is the model class for table "TrDContactPerson".
 *
 * The followings are the available columns in table 'TrDContactPerson':
 * @property integer $DContactPId
 * @property integer $HContactPId
 * @property integer $PhoneTypeId
 * @property string $Phone
 * @property string $UserIn
 * @property string $DateIn
 * @property string $UserUp
 * @property string $DateUp
 */
class DContactPersonForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TrDContactPerson';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('HContactPId, PhoneTypeId, Phone, UserIn, DateIn', 'required'),
			array('HContactPId, PhoneTypeId', 'numerical', 'integerOnly'=>true),
			array('Phone', 'length', 'max'=>20),
			array('UserIn, UserUp', 'length', 'max'=>50),
			array('DateUp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DContactPId, HContactPId, PhoneTypeId, Phone, UserIn, DateIn, UserUp, DateUp', 'safe', 'on'=>'search'),
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
			'DContactPId' => 'Dcontact Pid',
			'HContactPId' => 'Hcontact Pid',
			'PhoneTypeId' => 'Phone Type',
			'Phone' => 'Phone',
			'UserIn' => 'User In',
			'DateIn' => 'Date In',
			'UserUp' => 'User Up',
			'DateUp' => 'Date Up',
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

		$criteria->compare('DContactPId',$this->DContactPId);
		$criteria->compare('HContactPId',$this->HContactPId);
		$criteria->compare('PhoneTypeId',$this->PhoneTypeId);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('UserIn',$this->UserIn,true);
		$criteria->compare('DateIn',$this->DateIn,true);
		$criteria->compare('UserUp',$this->UserUp,true);
		$criteria->compare('DateUp',$this->DateUp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DContactPersonForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
