<?php
//include "microProtector.php";

include_once"../dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
session_start();
?>
<html lang="en">
  <head>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Secure page</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <style>
          .shift{
              margin-left: 1.15%;
              margin-right: 1.15%;
          }
      
      </style>
  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
                        <div class="container-fluid bg-info shift">
                            <div class="col-md-12" align="center">
                                <img alt="Bootstrap Image Preview" src="../images/mylogo1.png"  height="120px" width="120px"class="img-rounded">
                                <h2 class="text-center">
                                Welcome To Ms bhawan's  online Meal ON / OFF system.
                                </h2>
                            </div>
					    </div>
                    </div>
					<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Brand -->
                        <a class="navbar-brand" href="#">MS Bhawan PG3</a>

                        <!-- Links -->
                        <div class="collapse navbar-collapse" id="nav-content">   
                        <ul class="navbar-nav">
                        <li class="nav-item">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#smallShoes">
                         About the developer
                        </button>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="pending-request">Pending Requests <span class="badge badge-pill badge-danger">9</span></a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="Preview">
                        <a class="dropdown-item" href="#">Dropdown Link 1</a>
                        <a class="dropdown-item" href="#">Dropdown Link 2</a>
                        <a class="dropdown-item" href="#">Dropdown Link 3</a>
                        </div>
                        </li>
                        </ul>
                        </div>
                    </nav>
                    </div>
                </div>
            </div>
        </div>
      </div>