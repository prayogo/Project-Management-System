<?php

/**
 * This is the model class for table "ltfaculty".
 *
 * The followings are the available columns in table 'ltfaculty':
 * @property integer $FacultyId
 * @property string $Code
 * @property string $Faculty
 * @property string $Enable
 * @property string $UserIn
 * @property string $DateIn
 * @property string $UserUp
 * @property string $DateUp
 */
class Faculty extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ltfaculty';
	}
	
	public $varEnable;
	
	public function getEnableText(){
		if ($this->Enable == '1'){
			return StandardVariable::CONSTANT_ENABLE;	
		}else {
			return StandardVariable::CONSTANT_DISABLE;	
		}
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Code, Faculty', 'required'),
			array('Code, UserIn, UserUp', 'length', 'max'=>50),
			array('varEnable', 'length', 'max'=>10),
			array('Code', 'unique', 'className' => 'Faculty', 'attributeName' => 'Code', 'message'=>'This code is already in use'),
			array('Faculty', 'length', 'max'=>250),
			array('Enable', 'length', 'max'=>1),
			array('DateIn, DateUp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('FacultyId, Code, Faculty, Enable, varEnable', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'FacultyId' => 'FacultyId',
			'Code' => 'Code',
			'Faculty' => 'Faculty',
			'Enable' => 'Status',
			'UserIn' => 'User In',
			'DateIn' => 'Date In',
			'UserUp' => 'User Up',
			'DateUp' => 'Date Up',
			'varEnable' => 'Status'
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
	
		$criteria->compare('FacultyId',$this->FacultyId);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('Faculty',$this->Faculty,true);
		$criteria->compare('Enable',$this->Enable,true);
		$criteria->compare("CASE Enable
								WHEN 1 THEN 'Enable'
								ELSE 'Disable' 
							END", $this->varEnable, true);
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
	 * @return Faculty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
