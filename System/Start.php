<?php
namespace System;
class Start
{
    /**
     * App version
     */
    const VERSION = '0.0.1';

    /**
     * Process namespace path
     */
    const PROCESS_PATH = 'App\\Process\\';
    /**
     *
     */
    const PROCESS_SUFFIX = 'Process';

    /**
     * Bootstrap process
     * @param $argv
     */
    function boot($argv)
    {

        $params = self::sortArguments($argv);

        try {

            if (is_null($params['process'])) {
                throw new \Exception('ST01: Has not been invoked a process');
            }

            $class_name = $this::PROCESS_PATH.$params['process'].$this::PROCESS_SUFFIX;

            //Check if exist the process in the folder 'App/Process'
            if(class_exists($class_name,true)){
                //As exists the class, must be initiated the process.
                $class = new $class_name();
                $class->run($params['arguments']);

            }else{
                throw new \Exception('ST02: The called process does not exist.');
            }

        } catch (\Exception $e) {
            echo "\033[0;31m Error: " . $e->getMessage() . "\n";
        }

    }

    /**
     * Sort the CLI params.
     * @param $argv
     * @return array
     */
    static function sortArguments($argv)
    {
        $values = [];
        $values['script'] = array_shift($argv);
        $values['process'] = array_shift($argv);
        $values['arguments'] = $argv;

        return $values;
    }

}
