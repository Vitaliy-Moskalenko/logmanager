<?php

class ParselogCommand extends CConsoleCommand {
		
    public function actionIndex($logpath='C:\wamp64\logs\access.log', $max=1000) {
						
		if(!preg_match('/access\.log/ui', $logpath)) { $logpath .= 'access.log'; } 
				
		if(is_file($logpath)) { echo 'Start reading log file';
            if($file = @file_get_contents($logpath)) {
				
				$admin_IP = isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : '127.0.0.1';
                $result   = [];
				
				$file = preg_replace( "#\r\n|\r|\n#", PHP_EOL, $file); // unify end of lines of different OS
                $file = explode(PHP_EOL, $file);                       // Get log content, explode to array		
                $file = array_reverse($file);
				
				foreach($file as $i=>$record) {
                    if($i == $max+1) break; 
										
					if($record !== '') {
                        preg_match_all('/"(.*?)(?:"|$)|([^"]+)/ui', $record, $column, PREG_SET_ORDER);
                        $temp  = array();
				
						foreach($column as $j=>$val) {
							$val[0] = trim($val[0]); 
							if($val[0] == '') continue;
								
							if($j == 0) {  // IP and Date
								$temp2    = explode(' - - ', $val[0]);
                                $temp2[0] = trim($temp2[0]);

                                $temp[] = $temp2[0]; // IP
                                $DATE   = str_replace(['[',']'], '', $temp2[1]);
                                $DATE   = explode(':', $DATE);
                                $temp[] = date('Y-m-d H:i:s', strtotime(str_replace('/', ' ', $DATE[0]).' '.$DATE[1].':'.$DATE[2].':'.$DATE[3])); 
                            }
							elseif($j == 1) { // Request
								if(strstr($val[0], '%')) $val[0] = urldecode($val[0]);
                                $temp[] = trim($val[0], '"');
                            }
							elseif($j == 2) { 
								$temp2 = explode(' ', $val[0]);
								$temp[]   = $temp2[0];   // Answer code
								$temp[]   = $temp2[1];   // Size of response								
							} 							
							
						} // column foreaach						
								
										
						// Get model to put records into database
						$model = new Access();
								
						$model->a_ip            = $temp[0];  // Prepare data for db
						$model->a_date          = $temp[1];
						$model->a_request       = $temp[2];
						$model->a_answer_code   = $temp[3];
						$model->a_response_size = $temp[4];
						
						if(!$model->save()) 
							exit('Error: Failed saving to database!'); 
												
						// $result[] = $temp;				
					} 
					
				} // record foreach				
				
				// var_dump($result);				
				
			}		
			else exit('Error: Cannot read log file!'); 
		} 	
		else exit('Error: Wrong log file path');
		
		


		
		
    }
	
	public function actionHelp() {
		
		echo "Apache access log parsing commmand.\n";
		echo "Usage: Parselog [path to logfile] [max value of records\n";
		echo "Example: Parselog --logpath=/var/logs/access.log --max=1000\n";
		
	}
	
}








