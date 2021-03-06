<?php

/**
 * This is the model base class for the table "appform_application_form_history".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ApplicationFormHistory".
 *
 * Columns in table "appform_application_form_history" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $application_type_id
 * @property integer $inc_document_id
 * @property integer $investor_region_id
 * @property string $contact_email
 * @property integer $application_step_id
 * @property integer $user_action_id
 * @property string $action_time
 *
 */
abstract class BaseApplicationFormHistory extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'appform_application_form_history';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ApplicationFormHistory|ApplicationFormHistories', $n);
	}

	public static function representingColumn() {
		return 'contact_email';
	}

	public function rules() {
		return array(
			array('id, application_type_id, inc_document_id, investor_region_id, contact_email, application_step_id, user_action_id, action_time', 'required'),
			array('id, application_type_id, inc_document_id, investor_region_id, application_step_id, user_action_id', 'numerical', 'integerOnly'=>true),
			array('contact_email', 'length', 'max'=>60),
			array('id, application_type_id, inc_document_id, investor_region_id, contact_email, application_step_id, user_action_id, action_time', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'application_type_id' => Yii::t('app', 'Application Type'),
			'inc_document_id' => Yii::t('app', 'Inc Document'),
			'investor_region_id' => Yii::t('app', 'Investor Region'),
			'contact_email' => Yii::t('app', 'Contact Email'),
			'application_step_id' => Yii::t('app', 'Application Step'),
			'user_action_id' => Yii::t('app', 'User Action'),
			'action_time' => Yii::t('app', 'Action Time'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('application_type_id', $this->application_type_id);
		$criteria->compare('inc_document_id', $this->inc_document_id);
		$criteria->compare('investor_region_id', $this->investor_region_id);
		$criteria->compare('contact_email', $this->contact_email, true);
		$criteria->compare('application_step_id', $this->application_step_id);
		$criteria->compare('user_action_id', $this->user_action_id);
		$criteria->compare('action_time', $this->action_time, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}