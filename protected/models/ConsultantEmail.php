<?php

/**
 * This is the model class for table "trconsultantemail".
 *
 * The followings are the available columns in table 'trconsultantemail':
 * @property integer $ConsultantEmailId
 * @property integer $ConsultantId
 * @property string $Email
 * @property string $Primary
 * @property string $UserIn
 * @property string $DateIn
 * @property string $UserUp
 * @property string $DateUp
 *
 * The followings are the available model relations:
 * @property Msconsultant $consultant
 */
class ConsultantEmail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trconsultantemail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ConsultantId, Email', 'required'),
			array('ConsultantId', 'numerical', 'integerOnly'=>true),
			array('Email', 'length', 'max'=>250),
			array('Primary', 'length', 'max'=>1),
			array('UserIn, UserUp', 'length', 'max'=>50),
			array('DateIn, DateUp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ConsultantEmailId, ConsultantId, Email, Primary, UserIn, DateIn, UserUp, DateUp', 'safe', 'on'=>'search'),
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
			'consultant' => array(self::BELONGS_TO, 'Consultant', 'ConsultantId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ConsultantEmailId' => 'Consultant Email',
			'ConsultantId' => 'Consultant',
			'Email' => 'Email',
			'Primary' => 'Primary',
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

		$criteria->compare('ConsultantEmailId',$this->ConsultantEmailId);
		$criteria->compare('ConsultantId',$this->ConsultantId);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Primary',$this->Primary,true);
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
	 * @return ConsultantEmail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
