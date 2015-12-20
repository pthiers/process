<?php
namespace System;
use Carbon\Carbon;
abstract class Process {
    /**
     * @return mixed
     */
    abstract function run();

    /**
     * Process constructor.
     */
    function __construct()
    {
        echo "Start process time : ". Carbon::now()->toDateTimeString() ."\n";
    }


    /**
     * Process destructor.
     * Show
     */
    function __destruct()
    {
        echo "End process time : ". Carbon::now()->toDateTimeString() ."\n";
    }
}