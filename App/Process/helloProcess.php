<?php
/**
 * Created by PhpStorm.
 * User: pthiers
 * Date: 19-12-15
 * Time: 8:40 PM
 */

namespace App\Process;
use System\Process;


class helloProcess extends Process
{
    /**
     * Show hello world in the console.
     */
    public function run(){
        echo "Hello World \n";
    }

}