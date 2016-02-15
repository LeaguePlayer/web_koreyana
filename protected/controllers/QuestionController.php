<?
	class QuestionController extends FrontController{

		public function actionCreateQuestion()
		{
			$model=new Question;
			$response['success']=false;
			
			if (isset($_POST['Question']))
			{
				
				$model->attributes=$_POST['Question'];
				$model->status=1;
				$valid=$model->save();
				$response['success']=$valid;
			}
			echo CJSON::encode($response);
			die();
			
			// if ($valid)
			// 	$this->redirect(array('page/thanks'));
			//$this->render('index',array('model'=>$model));
		}
	}
?>