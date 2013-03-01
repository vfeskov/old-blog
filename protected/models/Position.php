<?php

/**
 * This is the model class for table "position".
 *
 * The followings are the available columns in table 'position':
 * @property string $id
 * @property string $title
 * @property string $summary
 * @property string $startdate
 * @property string $enddate
 * @property string $companyname
 * @property string $companysize
 * @property string $companyindustry
 */
class Position extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Position the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'position';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, summary, startdate, enddate, companyname, companysize, companyindustry', 'required'),
			array('title, companyname, companysize, companyindustry', 'length', 'max'=>100),
			array('startdate, enddate', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, summary, startdate, enddate, companyname, companysize, companyindustry', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title' => 'Title',
			'summary' => 'Summary',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
			'companyname' => 'Companyname',
			'companysize' => 'Companysize',
			'companyindustry' => 'Companyindustry',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('companyname',$this->companyname,true);
		$criteria->compare('companysize',$this->companysize,true);
		$criteria->compare('companyindustry',$this->companyindustry,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}