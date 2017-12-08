<?php

class RequestsBotController extends AdminController
{
	 public function actionList( $id_type = RequestsBot::TYPE_EVACUTOR )
    {
    	$this->layout = "/layouts/structure";


    	$cs = Yii::app()->getClientScript();
        $cs->registerCssFile($this->getAssetsUrl() . '/css/request_bot.css');
        $cs->registerScriptFile($this->getAssetsUrl() . '/js/request_bot.js');


        $RequestsBot = new RequestsBot('search');
        $RequestsBot->unsetAttributes();
        if ( isset($_GET['RequestsBot']) ) {
            $RequestsBot->attributes = $_GET['RequestsBot'];
        }
        $RequestsBot->id_type = $id_type;
        $RequestsBot->confirmed = 1; // show only confirmed
        

       
        
        $this->render('list', array(
            'model' => $RequestsBot,
            'id_type'=>$id_type,
        )); 

         //refresh new messages
        $RequestsBot->viewAllRequestsByThisType();
    }

    public function actionGotNewRecords()
    {
    	$json = new JsonModel;
    	$result = array();
		
    	foreach( RequestsBot::getTypes() as $got_id_type => $name_type )
    	{
    		$criteria = new CDbCriteria;
    		$criteria->addCondition("status = :status and id_type = :type and confirmed = 1");
    		$criteria->params = array(
    				':status'=>RequestsBot::STATUS_NEW,
    				':type'=>$got_id_type,
    			);

    		$count = (int)RequestsBot::model()->count( $criteria  );
    		if($count == 0)
    			$count = "";

    		$result[] = array(
    				'class'=>".sw_type_{$got_id_type} .badge",
    				'count'=>$count,
    				'id_type'=>$got_id_type,
    				'redirect'=>"/admin/requestsBot/list/id_type/{$got_id_type}",
    			);
    	}




		$json->registerResponseObject('data', $result);
		
		$json->returnJson();
    }
}
