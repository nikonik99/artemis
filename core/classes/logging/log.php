<?php

    class log{
        
        private $logFile;
        
        public __construct($log){
            $logFile = $log;
        }
        
        public addRow($logLevel, $logMessage){
            $f = NULL;
            $l = NULL;
            try{
                $f = file_get_contents($logFile);
            } catch (Exception $e){
                return -1;
            }
            switch($logLevel){
                case 0:
                    $l = "INFO";
                    break;
                case 1:
                    $l = "NORMAL";
                    break;
                case 2:
                    $l = "WARNING";
                    break;
                case 3:
                    $l = "CRITICAL";
                    break;
                case default:
                    $l = "UNRECOGNIZED";
                    break;
            }
            $f = date("d/M/Y h:i:s") . " [" . intval($logLevel) . "]: " . $logMessage;
            try{
                $f = file_put_contents($logFile, $f);
            } catch (Exception $e){
                return -2;
            }
            return 0;
        }
        
        public getLastRow(){
            try{
                $f = file_get_contents($logFile);
            } catch (Exception $e){
                die("Failed to access logfile ($logFile)");
            }
            $rows = explode("\n", $f);
            return end($rows);
        }
        
        public getRow($rowNumber){
            try{
                $f = file_get_contents($logFile);
            } catch (Exception $e){
                die("Failed to access logfile ($logFile)");
            }
            $rows = explode("\n", $f);
            if(intval($rowNumber) <= count($rows)){
                return $rows[$rowNumber];
            }else{
                return -1;
            }
        }
        
    }

?>