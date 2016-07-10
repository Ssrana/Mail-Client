<?php
/**
 * Hello World controller
 */
class Controller_Send extends Controller
{

        public function action_index()
        {
                $mdl = new Model_mailcount();
                #$ret = $mdl->foo(1, 2);//page, page_size
                $ret_count = $mdl->foo();
echo "<pre>";
var_export($ret_count);

        }
}																

//controller