<?php
class Controller_Fetchlist extends Controller
{
const connection_string = "{imap.gmail.com:993/imap/ssl/novalidate-cert}";

	public function action_index()
        {
			$mbox = imap_open(self::connection_string, , "Beecules12")
			or die("can't connect: " . imap_last_error());

			echo "<a href='http://localhost/Sendmail'>Compose</a>";
			echo "</br></br>";
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
			$limit=10;
			$offset = ($page-1) * $limit; 

			$MC = imap_check($mbox);
			if(!$MC== False)
			{
				$num = $MC->Nmsgs;			
				$start= $num-$offset-1;
				$end=$num-$offset-10;
				$result = imap_fetch_overview($mbox,"$end:$start");
				$result = array_reverse($result); //the default order is oldest first
			}//message count check

			//paging 
			$view = View::factory('fetchview')
			->set('result', $result);
			$this->response->body($view);	
			$next=$page+1;
			$previous=$page-1;
			if($offset==0)  //first page
			{
				echo "<a href='http://localhost/Fetchlist?page=$next'>".'Next'."</a> ";
			}
			else
			{
				if(sizeof($result) < $limit) //last page
				{

					echo "<a href='http://localhost/Fetchlist?page=$previous'>".'Previous'."</a> "; 
				}
				else
				{
					echo "<a href='http://localhost/Fetchlist?page=$next'>".'Next'."</a> ";?>&nbsp&nbsp
					<?php	
					echo "<a href='http://localhost/Fetchlist?page=$previous'>".'Previous'."</a> ";
				}
			}
			imap_close($mbox);
		};'
		
}																

