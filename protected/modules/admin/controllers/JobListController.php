<?php

class JobListController extends AdminController
{
	 public function actionCreate()
    {
        $model = new JobList;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/jobList/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('JobList', $id);
        $jobFinder = new Job('search');
        $jobFinder->unsetAttributes();
        if ( isset($_GET['JobList']) ) {
            $jobFinder->attributes = $_GET['JobList'];
        }
        $jobFinder->list_id = $model->id;

        if(isset($_POST['JobList']))
        {
            $model->attributes = $_POST['JobList'];
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
