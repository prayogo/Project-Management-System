<?php

/**
 * This is the model class for table "ltcountry".
 *
 * The followings are the available columns in table 'ltcountry':
 * @property integer $CountryId
 * @property string $Country
 * @property string $ISO2
 * @property string $ISO3
 * @property string $DateIn
 * @property string $UserIn
 * @property string $DateUp
 * @property string $UserUp
 *
 * The followings are the available model relations:
 * @property Mscustomer[] $mscustomers
 */
class Country extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ltcountry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Country', 'required'),
			array('Country', 'length', 'max'=>150),
			array('ISO2', 'length', 'max'=>2),
			array('ISO3', 'length', 'max'=>3),			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CountryId, Country, ISO2, ISO3', 'safe', 'on'=>'search'),
			array('DateIn','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			array('DateUp','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
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
			'mscustomers' => array(self::HAS_MANY, 'Mscustomer', 'CountryId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CountryId' => 'Country',
			'Country' => 'Country',
			'ISO2' => 'Iso2',
			'ISO3' => 'Iso3',
			'DateIn' => 'Date In',
			'UserIn' => 'User In',
			'DateUp' => 'Date Up',
			'UserUp' => 'User Up',
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

		$criteria->compare('CountryId',$this->CountryId);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('ISO2',$this->ISO2,true);
		$criteria->compare('ISO3',$this->ISO3,true);
		$criteria->compare('DateIn',$this->DateIn,true);
		$criteria->compare('UserIn',$this->UserIn,true);
		$criteria->compare('DateUp',$this->DateUp,true);
		$criteria->compare('UserUp',$this->UserUp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
