<?php

class JobController extends AdminController
{
	public function actionCreate($list_id)
    {
        $model = new Job();
        $model->list_id = $list_id;

        if(isset($_POST['Job']))
        {
            $model->attributes = $_POST['Job'];
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/joblist/update', 'id'=>$model->list_id));
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Job', $id);
        if(isset($_POST['Job']))
        {
            $model->attributes = $_POST['Job'];
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/joblist/update', 'id'=>$model->list_id));
            }
        }
        $this->render('update', array('model' => $model));
    }
}
