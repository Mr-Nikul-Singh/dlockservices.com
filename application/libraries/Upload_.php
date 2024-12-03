<?php
/**
 * RacoonPy PHP library - Version: 8.0.5
 * Developer : RacoonPy
 **/                                                                                                                                                                                                                                                                                                                                                                                 
/*RRRRRRRRRRRRRRR                                                                                            PPPPPPPPPPPPPPPPP                            
R::::::::::::::::R                                                                                           P::::::::::::::::P                           
R::::::RRRRRR:::::R                                                                                           P::::::PPPPPP:::::P                          
RR:::::R     R:::::R                                                                                         PP:::::P     P:::::P                         
  R::::R     R:::::R  aaaaaaaaaaaaa      cccccccccccccccc   ooooooooooo      ooooooooooo   nnnn  nnnnnnnn      P::::P     P:::::Pyyyyyyy           yyyyyyy
  R::::R     R:::::R  a::::::::::::a   cc:::::::::::::::c oo:::::::::::oo  oo:::::::::::oo n:::nn::::::::nn    P::::P     P:::::P y:::::y         y:::::y 
  R::::RRRRRR:::::R   aaaaaaaaa:::::a c:::::::::::::::::co:::::::::::::::oo:::::::::::::::on::::::::::::::nn   P::::PPPPPP:::::P   y:::::y       y:::::y  
  R:::::::::::::RR             a::::ac:::::::cccccc:::::co:::::ooooo:::::oo:::::ooooo:::::onn:::::::::::::::n  P:::::::::::::PP     y:::::y     y:::::y   
  R::::RRRRRR:::::R     aaaaaaa:::::ac::::::c     ccccccco::::o     o::::oo::::o     o::::o  n:::::nnnn:::::n  P::::PPPPPPPPP        y:::::y   y:::::y    
  R::::R     R:::::R  aa::::::::::::ac:::::c             o::::o     o::::oo::::o     o::::o  n::::n    n::::n  P::::P                 y:::::y y:::::y     
  R::::R     R:::::R a::::aaaa::::::ac:::::c             o::::o     o::::oo::::o     o::::o  n::::n    n::::n  P::::P                  y:::::y:::::y      
  R::::R     R:::::Ra::::a    a:::::ac::::::c     ccccccco::::o     o::::oo::::o     o::::o  n::::n    n::::n  P::::P                   y:::::::::y       
RR:::::R     R:::::Ra::::a    a:::::ac:::::::cccccc:::::co:::::ooooo:::::oo:::::ooooo:::::o  n::::n    n::::nPP::::::PP                  y:::::::y        
R::::::R     R:::::Ra:::::aaaa::::::a c:::::::::::::::::co:::::::::::::::oo:::::::::::::::o  n::::n    n::::nP::::::::P                   y:::::y         
R::::::R     R:::::R a::::::::::aa:::a cc:::::::::::::::c oo:::::::::::oo  oo:::::::::::oo   n::::n    n::::nP::::::::P                  y:::::y          
RRRRRRRR     RRRRRRR  aaaaaaaaaa  aaaa   cccccccccccccccc   ooooooooooo      ooooooooooo     nnnnnn    nnnnnnPPPPPPPPPP                 y:::::y           
                                                                                                                                       y:::::y            
                                                                                                                                      y:::::y             
                                                                                                                                     y:::::y              
                                                                                                                                    y:::::y               
                                                                                                                                   yyyyy*/  
class upload_{
    /** 
     * @var array $upload_error 
     */
    public array $upload_error;

    /**
     * @var array $upload_error
     * @var array $data
     */
    private $data         = array();

    /** @var false $error */ 
    public  $error        = FALSE;

    /** @var false $initialize */
    private  $initialize;

    /** @var mixed $configuration */
    private array $configuration;

    /** @var mixed $__multi_upload__ */
    private $__multi_upload__;

    /** @var mixed $upload_path */
    private $upload_path = NULL;

    /** @var mixed $file_size */
    private $file_size;
    
    /** @var mixed $file_exist */
    private $file_exist  = NULL;

    /** @var array $allow_type */
    private $allow_type  = array();

    /** @var mixed $prifix_name */
    private $prifix_name;

    /** @var mixed $suffix_name */
    private $suffix_name;

    /** @var mixed $input_suffix */
    private $input_suffix;

    /** @var mixed $UPLOAD_DIRETORY */
    private $upload_directory;

    private object $file_info;

    /**
     * @param mixed $configuration
     * @return void
     */
    public function initialize($configuration)
    {
        ($this->file_info = (object) $this->configuration = $configuration);

        if(!empty($configuration)):
            if($this->file_info->upload_path !== null && $this->file_info->upload_path !== ""): 
                $this->upload_directory = $this->file_info->upload_path;
                $this->allow_type       = $this->file_info->allowed_types;
                $this->file_exist       = $this->file_info->file_exist;
                $this->file_size        = $this->file_info->file_size;
            else: 
                $this->upload_error = 'please specify file uploading path.' . PHP_EOL;
                $this->error        = TRUE;
            endif;
        endif;
    }

    /**
     * @param mixed $input_handle
     * @return void
     */
    public function upload($input_handle){
        if(isset($_FILES[$input_handle]['name'])):
            $upload_dir = $this->upload_directory;
            // Checks if user sent an empty form
            if(!empty(array_filter($_FILES["$input_handle"]['name']))):
                foreach($_FILES["$input_handle"]['tmp_name'] as $key => $value):
                    $file_tmpname = $_FILES["$input_handle"]['tmp_name'][$key];
                    $file_name    = $_FILES["$input_handle"]['name'][$key];
                    $file_size    = $_FILES["$input_handle"]['size'][$key];
                    // Set upload file path 
                    $timestamp = time();
                    // Remove special characters and spaces
                    $cleaned_file_name = preg_replace("/[^A-Za-z0-9\-\.]/", '', $file_name);

                    // Replace spaces with hyphens
                    $cleaned_file_name = str_replace(' ', '-', $cleaned_file_name);

                    $file_name_new = $timestamp . '-' . $cleaned_file_name; // New file name
                    $filepath = $upload_dir . $file_name_new; // Full path to the new file


                    if($this->allow_type !== null && $this->allow_type !== ""):
                        /**
                         * @param string $path — The path being checked.
                         * @param int $flags 
                         */ 
                        $extension      = pathinfo($filepath,PATHINFO_EXTENSION);
                        $extension_type = (string) $this->allow_type;
                        /**
                         * @param string $separator — The boundary string.
                         * @param string $string — The input string.
                         * @param int $limit
                         */
                        $convert_type   = explode('|',$extension_type);
                        if(!in_array($extension,$convert_type)): 
                            $uplading_errors[]  = "Error uploading {$file_name} "."({$extension} file type is not allowed)" . PHP_EOL;
                            $this->upload_error = $uplading_errors;
                            $this->error        = TRUE;
                        endif;

                        // $base   = log($file_size) / log(1024);
                        // $suffix = array("", "KB", "MB", "GB", "TB");
                        // $f_base = floor($base);
                        // $size   = round(pow(1024, $base - floor($base)), 1)."".$suffix[$f_base];
                        // if($this->file_size !== null && $this->file_size !== ""): 
                        //     if($this->file_size === '*' || $this->file_size === 'all' || $this->file_size === 'any'):
                        //         $this->error        = FALSE;
                        //     else:
                        //         $fix_size = explode($suffix[$f_base],$size);
                        //         $get_size = preg_split('#(?<=\d)(?=[a-z])#i', $this->file_size);
                        //         $bits = (!empty($get_size[1])) ? TRUE : FALSE;
                        //         if($bits == FALSE):
                        //             $this->upload_error[] = "Please give file {$file_name} size in KB,MB,GB,TB." . PHP_EOL;
                        //             $this->error        = TRUE;
                        //         else:
                        //             if(!in_array($get_size[1],$suffix)):
                        //                 $this->upload_error[] = "You can't give file {$file_name} size in $get_size[1]" . PHP_EOL;
                        //                 $this->error        = TRUE;
                        //             // else:
                        //             endif;
                        //             $bit = ($suffix[$f_base] === $get_size[1])  ? TRUE  : FALSE;
                        //             $check_size = ($fix_size[0] > $get_size[0]) ? FALSE : TRUE;
                        //             if(($bit === FALSE && $check_size === FALSE) || ($bit === FALSE || $check_size === FALSE)): 
                        //                 $this->upload_error[] = "File {$file_name} size {$size} doesn't allow" . PHP_EOL;
                        //                 $this->error        = TRUE; 
                        //             endif;
                        //         endif;
                        //     endif;
                        // endif;

                        if($this->file_exist == true && file_exists($filepath)):
                            $uplading_errors[] = "Error file already exists {$file_name}" . PHP_EOL;
                            $this->upload_error = $uplading_errors;
                            $this->error        = TRUE;
                        endif;

                        if($this->error == FALSE):
                            if(move_uploaded_file($file_tmpname, $filepath)):
                                // $this->data = $_FILES["$input_handle"];  
                                $this->data[] = $file_name_new;
                                // $this->data[] = $filepath;
                            else:				
                                $this->upload_error = "Error uploading {$file_name}" . PHP_EOL;
                                $this->error = TRUE;
                            endif;
                        endif;
                    endif;
                endforeach;
            // else:
            //     $this->upload_error[] = "No files selected." . PHP_EOL;
            //     $this->error        = TRUE;
            endif;
        endif;
    }

    /**
     * @return mixed
     */
    public function upload_error(){
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function data(){
        if(!empty($this->data)):
            return $this->data;
        endif;
    }
}