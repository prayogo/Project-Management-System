<?php

/**
 * This is the model class for table "msconsultant".
 *
 * The followings are the available columns in table 'msconsultant':
 * @property integer $ConsultantId
 * @property string $LectureId
 * @property string $EmployeeId
 * @property string $Name
 * @property string $ResidentId
 * @property integer $CategoryId
 * @property integer $DepartmentId
 * @property string $UserIn
 * @property string $DateIn
 * @property string $UserUp
 * @property string $DateUp
 *
 * The followings are the available model relations:
 * @property Ltcategory $category
 * @property Ltdepartment $department
 * @property Trconsultantemail[] $trconsultantemails
 */
class Consultant extends CActiveRecord
{
	public $varCategory;
	public $varDepartment;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'msconsultant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, ResidentId, CategoryId, DepartmentId', 'required'),
			array('CategoryId, DepartmentId', 'numerical', 'integerOnly'=>true),
			array('LectureId, EmployeeId', 'length', 'max'=>15),
			array('Name', 'length', 'max'=>250),
			array('ResidentId, UserIn, UserUp', 'length', 'max'=>50),
			array('DateIn, DateUp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ConsultantId, LectureId, EmployeeId, Name, ResidentId, CategoryId, DepartmentId, varCategory, varDepartment', 'safe', 'on'=>'search'),
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
			'Category' => array(self::BELONGS_TO, 'Category', 'CategoryId'),
			'Department' => array(self::BELONGS_TO, 'Department', 'DepartmentId'),
			'ConsultantEmail' => array(self::HAS_MANY, 'ConsultantEmail', 'ConsultantId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ConsultantId' => 'ConsultantId',
			'LectureId' => 'Lecture Id',
			'EmployeeId' => 'Employee Id',
			'Name' => 'Name',
			'ResidentId' => 'Resident Id',
			'CategoryId' => 'Category',
			'DepartmentId' => 'Department',
			'varCategory' => 'Category', 
			'varDepartment' => 'Department',
			'UserIn' => 'UserIn',
			'DateIn' => 'DateIn',
			'UserUp' => 'UserUp',
			'DateUp' => 'DateUp',
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
		
		$criteria->with = array('Category','Department');

		$criteria->compare('ConsultantId',$this->ConsultantId);
		$criteria->compare('LectureId',$this->LectureId,true);
		$criteria->compare('EmployeeId',$this->EmployeeId,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('ResidentId',$this->ResidentId,true);
		$criteria->compare('CategoryId',$this->CategoryId);
		$criteria->compare('Category.Category', $this->varCategory, true);
		$criteria->compare('DepartmentId',$this->DepartmentId);
		$criteria->compare('Department.Department', $this->varDepartment, true);
		$criteria->compare('UserIn',$this->UserIn,true);
		$criteria->compare('DateIn',$this->DateIn,true);
		$criteria->compare('UserUp',$this->UserUp,true);
		$criteria->compare('DateUp',$this->DateUp,true);
		
		$sort = new CSort();
		$sort->attributes = array(
			'Category.Category'=>array(
				'asc'=>'Category.Category ASC',
				'desc'=>'Category.Category DESC',
			),
			'Department.Department'=>array(
				'asc'=>'Department.Department ASC',
				'desc'=>'Department.Department DESC',
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
	 * @return Consultant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function behaviors()
    {
        return array('ESaveRelatedBehavior' => array(
                'class' => 'application.components.ESaveRelatedBehavior')
        );
    }
	
	public function gridConsultantEmail(){
		$criteria = new CDbCriteria();
		$criteria->select = 'Email';
		$criteria->condition = '`Primary`=1 AND ConsultantId=:ConsultantId';
		$criteria->params = array(':ConsultantId'=>$this->ConsultantId);
		$model = ConsultantEmail::model()->findAll($criteria);
		$emailstr = "";
		if ($model != NULL){
			foreach($model as $emails){
				$emailstr = $emailstr. $emails->Email. ', ';
			}
			$emailstr = substr($emailstr, 0, strlen($emailstr) - 2);
		}else{
			$emailstr = ' - ';	
		}
		
		return $emailstr;
	}
}
