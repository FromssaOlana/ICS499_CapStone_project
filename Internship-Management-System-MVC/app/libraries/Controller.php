<?php
  /* 
   *  CORE CONTROLLER CLASS
   *  Loads Models & Views
   */
  class Controller {
    // Lets us load model from controllers
    public function model($model){
      // Require model file
      require_once '../app/models/' . $model . '.php';
      // Instantiate model
      return new $model();
    }

    // Lets us load view from controllers
    public function view($url, $data = []){
      // Check for view file
      if(file_exists('../app/views/'.$url.'.php')){
        // Require view file
        require_once '../app/views/'.$url.'.php';
      } else {
        // No view exists
        die('View does not exist');
      }
    }

    public function returnUploaded($uploaded){
      if(file_exists($uploaded)){
        // The location of the PDF file 
        // on the server        
        // Header content type 
        $type = mime_content_type($uploaded);
        header("Content-type: ".$type.""); 
        $real_type = explode('/',$type);
        //header("Content-Disposition: attachment; filename=InternshipEvaluatorResume.".$real_type[1]."");
        header("Content-Length: " . filesize($uploaded)); 
          
        // Send the file to the browser. 
        readfile($uploaded); 
      } else {
        // No file exists
        die('File does not exist');
      }
    }
  }