<?php

class ChatrawebhookController extends Controller
{
	public function actionIndex()
	{
		echo date("d-m-Y H.i.s");
		try
    	{
    		if (!file_exists('uploaded-docs/chatra/')) {
    		    mkdir('uploaded-docs/chatra/', 0777, true);
    		}

    		$ip = " IP=".@$_SERVER['REMOTE_ADDR'].", PORT=".@$_SERVER['REMOTE_PORT'];
			$filename = "test.txt";//"ChatraWebhok-" . date("Y.m.d") . ".txt";
	    	$content = date("d-m-Y H.i.s") . " # " . $ip . "\r\n" ." POSTdATA = ". json_encode(@$_POST). "\r\n";
	    	$handle = @fopen("uploaded-docs/chatra/" . $filename, "a+");
	    	var_dump($handle);
	    	@fwrite($handle, $content);
	    	@fclose($handle);
	    	return true;
	    } catch ( Exception $e ) {
	      	return false;
	    }
	}
}