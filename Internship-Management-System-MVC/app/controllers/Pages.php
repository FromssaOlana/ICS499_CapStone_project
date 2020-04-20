<?php
  class Pages extends Controller{
    public function __construct(){
     
    }

    // Load Homepage
    public function index(){
      // If logged in, redirect to posts
      // if(isset($_SESSION['user_id'])){
      //   redirect('posts');
      // }

      //Set Data
      $data = [
        'title' => 'Metrostate Academic Internship Management System',
      ];

      // Load homepage/index view
      $this->view('pages/index', $data);
    }

    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('pages/about', $data);
    }

    public function guidelines(){
      $data = [
        
      ];
      $this->view('pages/guidelines', $data);
    }
  }