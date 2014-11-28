<?php

/**
 * This is the model class for table "ltdepartment".
 *
 * The followings are the available columns in table 'ltdepartment':
 * @property integer $DepartmentId
 * @property string $Code
 * @property string $Department
 * @property integer $FacultyId
 * @property string $Enable
 * @property string $UserIn
 * @property string $DateIn
 * @property string $UserUp
 * @property string $DateUp
 *
 * The followings are the available model relations:
 * @property Ltfaculty $faculty
 */
class Department extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ltdepartment';
	}
	
	public $varEnable;
	public $varFaculty;
	
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
			array('Code, Department, FacultyId', 'required'),
			array('FacultyId', 'numerical', 'integerOnly'=>true),
			array('Department, varFaculty', 'length', 'max'=>250),
			array('varEnable', 'length', 'max'=>10),
			array('Enable', 'length', 'max'=>1),
			array('Code, UserIn, UserUp', 'length', 'max'=>50),
			array('DateIn, DateUp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DepartmentId, Code, Department, FacultyId, Enable, varEnable, varFaculty', 'safe', 'on'=>'search'),
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
			'Faculty' => array(self::BELONGS_TO, 'Faculty', 'FacultyId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'DepartmentId' => 'DepartmentId',
			'Code' => 'Code',
			'Department' => 'Department',
			'FacultyId' => 'Faculty',
			'varFaculty' => 'Faculty',
			'Enable' => 'Status',
			'varEnable' => 'Status',
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
		$criteria->with = array('Faculty');

		$criteria->compare('DepartmentId',$this->DepartmentId);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('Department',$this->Department,true);
		$criteria->compare('FacultyId',$this->FacultyId);
		$criteria->compare('Faculty.Faculty', $this->varFaculty, true);
		$criteria->compare('t.Enable',$this->Enable,true);
		$criteria->compare("CASE t.Enable
								WHEN 1 THEN 'Enable'
								ELSE 'Disable' 
							END", $this->varEnable, true);
		$criteria->compare('UserIn',$this->UserIn,true);
		$criteria->compare('DateIn',$this->DateIn,true);
		$criteria->compare('UserUp',$this->UserUp,true);
		$criteria->compare('DateUp',$this->DateUp,true);

		$sort = new CSort();
		$sort->attributes = array(
			'Faculty.Faculty'=>array(
				'asc'=>'Faculty.Faculty ASC',
				'desc'=>'Faculty.Faculty DESC',
			),
			'*', // this adds all of the other columns as sortable
		);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Department the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
