<?php

class StatusController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'DocumentStatus'),
		));
	}

	public function actionCreate() 
	{
		$model = new DocumentStatus;
		
		if (isset($_POST['DocumentStatus'])) {
			$model->setAttributes($_POST['DocumentStatus']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('index'));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) 
	{
		$model = $this->loadModel($id, 'DocumentStatus');
		
		if (isset($_POST['DocumentStatus'])) {
			$model->setAttributes($_POST['DocumentStatus']);

			if ($model->save()) {
				$this->redirect(array('index'));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'DocumentStatus')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new DocumentStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['DocumentStatus']))
			$model->setAttributes($_GET['DocumentStatus']);

		$this->render('index', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new DocumentStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['DocumentStatus']))
			$model->setAttributes($_GET['DocumentStatus']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}