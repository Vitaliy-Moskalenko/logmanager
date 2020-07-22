<?php

class ApiController extends Controller
{
    // Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    Const APPLICATION_ID = 'ASCCPE';

    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';
    /**
     * @return array action filters
     */
    public function filters()
    {
            return array();
    }

    // Actions
    public function actionList()
    {
		
		$models = Access::model()->findAll();
		
		// Did we get some results?
		if(empty($models)) 
			$this->_sendResponse(200, sprintf('No records where found'));
		else {
			// Prepare response
			$rows = array();
			foreach($models as $model)
				$rows[] = $model->attributes;
				// Send the response
				$this->_sendResponse(200, CJSON::encode($rows), 'application/json');
		}		
		
    }
	
	private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
	{
		// set the status
		$status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
		header($status_header);
		header('Content-type: ' . $content_type);
		
		if($body != '') 
			echo $body;

		Yii::app()->end();
	}

	private function _getStatusCodeMessage($status)
	{
		// these could be stored in a .ini file and loaded
		// via parse_ini_file()... however, this will suffice
		// for an example
		$codes = Array(
			200 => 'OK',
			400 => 'Bad Request',
			401 => 'Unauthorized',
			402 => 'Payment Required',
			403 => 'Forbidden',
			404 => 'Not Found',
			500 => 'Internal Server Error',
			501 => 'Not Implemented',
		);
		return (isset($codes[$status])) ? $codes[$status] : '';
	}	

}