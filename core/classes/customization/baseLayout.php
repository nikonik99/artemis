<?php
    
    class baseLayout{
    
        private $m; //theme decoded manifest
        
        /*  constructor
            @param $pathToManifest full path to theme manifest file
        */
        public __construct($pathToManifest){
            if(file_exists($pathToManifest)){
                $m = json_decode(file_get_contents($pathToManifest), true);
            }
        }
        
        /*  getManifestPath
            @return array representing theme manifest resources
        */
        public getManifestArr{
            return $m;
        }
        
        /*  setManifestPath
            @param $pathToManifest full path to theme manifet file
            @return operation status code
            
            : -> -1 = File Not Found
            : -> -2 = File Not Readable
            : -> -3 = Not Valid JSON
            : ->  0 = Sucessfully got new path 
        */
        public setManifestPath($pathToManifest){
            $manifest = NULL;
            if(!file_exists($pathToManifest)){
                return -1;
            }else{
                try{
                    $manifest = file_get_contents($pathToManifest);
                } catch (Exception $e){
                    return -2;
                }
                $tmp = json_decode($manifest, true);
                if($tmp == NULL){
                    return -3;
                }else{
                    $m = $tmp;
                    return 0;
                }
            }
        }
        
        /* printBefore
           prints page inclusions stored in manifest's (components->scripts->pre) field
           @return HTML output of the theme resources or status error code
           
           : -> -1 = File Not Found
           : -> -2 = File Not Readable
        */
        public printBefore(){
            $before = NULL;
            if(file_exists($m["components"]["scripts"]["pre"])){
                try{
                    $before = file_get_contents($m["components"]["scripts"]["pre"]);
                    return $before;
                } catch (Exception $e){
                    return -2;
                }
            }else{
                return -1;
            }
        }
        
        /* printSkel
           prints page html skeleton stored in manifest's (components->skel->$portion) field
           
           @param $portion portion to print (account, cart, footer, header, index, menu, page, [otherskel])
           @return HTML output of the theme files or status error code
           
           : -> -1 = File Not Found
           : -> -2 = File Not Readable
           : -> -3 = Invalid skel selected
        */
        public printSkel($portion){
            $skel = NULL;
            if(array_key_exists($m["components"]["skel"][$portion])){
                if(file_exists($m["components"]["skel"][$portion])){
                    try{
                        $skel = file_get_contents($m["components"]["skel"][$portion]);
                        return $skel;
                    } catch (Exception $e){
                        return -2;
                    }
                }else{
                    return -1;
                }
            }else{
                return -3;
            }
        }
        
        /* printAfter
           prints page after-load scripts stored in manifest's (components->scripts->post) field
           @return HTML output of the theme resources or status error code
           
           : -> -1 = File Not Found
           : -> -2 = File Not Readable
        */
        public printAfter(){
            $after = NULL;
            if(file_exists($m["components"]["scripts"]["post"])){
                try{
                    $after = file_get_contents($m["components"]["scripts"]["post"]);
                    return $after;
                } catch (Exception $e){
                    return -2;
                }
            }else{
                return -1;
            }
        }
        
    
    }
    
?>