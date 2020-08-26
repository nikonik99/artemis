<?php

    function metas($metaFile){
        try{
            echo file_get_contents($metaFile);
        } catch (Exception $e){
            //writelog
        }
    }
    
    function includes($scriptPreFile){
        try{
            echo file_get_contents($scriptPreFile);
        } catch (Exception $e){
            //writelog
        }
    }

    function postIncludes($scriptPostFile){
        try{
            echo file_get_contents($scriptPostFile);
        } catch (Exception $e){
            //writelog
        }
    }

    function skelHead($headFile){
        try{
            echo file_get_contents($headFile);
        } catch (Exception $e){
            //writelog
        }
    }
    
    function skelMenu($menuFile){
        try{
            echo file_get_contents($menuFile);
        } catch (Exception $e){
            //writelog
        }
    }

    function skelFooter($footerFile){
        try{
            echo file_get_contents($footerFile);
        } catch (Exception $e){
            //writelog
        }
    }
    
    function skelPage($pageFile){
        try{
            echo file_get_contents($pageFile);
        } catch (Exception $e){
            //writelog
        }
    }
?>