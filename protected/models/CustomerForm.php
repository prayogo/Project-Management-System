<?php

/**
 * This is the model class for table "MsCustomer".
 *
 * The followings are the available columns in table 'MsCustomer':
 * @property integer $CustomerId
 * @property string $Company
 * @property string $DayOfJoin
 * @property string $NPWP
 * @property string $Phone
 * @property string $Fax
 * @property string $Address
 * @property string $City
 * @property string $State
 * @property integer $CompanyTypeId
 * @property integer $CountryId
 * @property string $Webpage
 */
class CustomerForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'MsCustomer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Company, DayOfJoin, Phone, Address, City, State, CompanyTypeId, CountryId', 'required'),
			array('CompanyTypeId, CountryId', 'numerical', 'integerOnly'=>true),
			array('Company', 'length', 'max'=>200),
			array('NPWP', 'length', 'max'=>50),
			array('Phone, Fax', 'length', 'max'=>20),
			array('Address, Webpage', 'length', 'max'=>250),
			array('City, State', 'length', 'max'=>100),			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CustomerId, Company, DayOfJoin, NPWP, Phone, Fax, Address, City, State, CompanyTypeId, CountryId, Webpage', 'safe', 'on'=>'search'),
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
			'HContactPerson' => array(self::HAS_MANY,'HContactPersonForm','CustomerId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CustomerId' => 'Customer',
			'Company' => 'Company',
			'DayOfJoin' => 'Day Of Join',
			'NPWP' => 'Npwp',
			'Phone' => 'Phone',
			'Fax' => 'Fax',
			'Address' => 'Address',
			'City' => 'City',
			'State' => 'State',
			'CompanyTypeId' => 'Company Type',
			'CountryId' => 'Country',
			'Webpage' => 'Webpage',
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

		$criteria->compare('CustomerId',$this->CustomerId);
		$criteria->compare('Company',$this->Company,true);
		$criteria->compare('DayOfJoin',$this->DayOfJoin,true);
		$criteria->compare('NPWP',$this->NPWP,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('CompanyTypeId',$this->CompanyTypeId);
		$criteria->compare('CountryId',$this->CountryId);
		$criteria->compare('Webpage',$this->Webpage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CustomerForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
