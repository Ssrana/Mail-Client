<?php 
class Controller_Openmail extends Controller
{
        public function action_index()
        {  
		if (isset($_GET["m_no"])) { $m_no  = $_GET["m_no"]; } else { $page=1; }; 
				$imap = imap_open("{imap.gmail.com:993/imap/ssl/novalidate-cert}", "sanchika.rana@webyog.com", "Beecules12"); 
				if( $imap ) { 
			    //Check no.of.msgs 
     			$num = imap_num_msg($imap); 
     			//if there is a message in your inbox 
     			if( $num >0 ) { 
          		//read that mail recently arrived 
          		echo imap_qprint(imap_body($imap, $m_no)); 
     			} 
     			//close the stream 
     			imap_close($imap); 
			}
		}
} 
?>