<?php

class JoblistController extends AdminController
{
	 public function actionCreate()
    {
        $model = new Joblist;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/Joblist/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Joblist', $id);
        $jobFinder = new Job('search');
        $jobFinder->unsetAttributes();
        if ( isset($_GET['Joblist']) ) {
            $jobFinder->attributes = $_GET['Joblist'];
        }
        $jobFinder->list_id = $model->id;

        if(isset($_POST['Joblist']))
        {
            $model->attributes = $_POST['Joblist'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'jobFinder' => $jobFinder
        ));
    }
}
