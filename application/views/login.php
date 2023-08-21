<!DOCTYPE html>
<html>
<head>
  <title>Login - Sistem Toko Ikan Sektor Channa</title>
  <link rel="stylesheet"type="text/css"href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <script type="text/javascript"src="<?php echo base_url().'assets/js/jquery.js';?>"></script>
  <script type="text/javascript"src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
</head>
<body>
  <section class="vh-100" style="background-color: #4585c5;">
   <!-- <section class="vh-100" style="background-color: #508bfc;"> -->
    <div class="container py-3 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100"  >
        <div class="col-12 col-md-8 col-lg-6 col-xl-5" >
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h3 class="mb-2"><b> SISTEM TOKO IKAN<br><font color="#4585c5">SEKTOR CHANNA</b></font></h3>
             <img width="162" height="211" class="mb-3" src="<?php echo base_url().'assets2/img/logo.png';?>" /> 
             <h3 class="mb-2">Login</h3>
             <?php
             if(isset($_GET['pesan'])){
               if($_GET['pesan'] == "gagal"){
                 echo"<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
               }else if($_GET['pesan'] == "logout"){
                 echo"<div class='alert alert-danger'>Anda telah logout.</div>";
               }else if($_GET['pesan'] == "belumlogin"){
                 echo"<div class='alert alert-success'>Silahkan login dulu.</div>";
               }
             }        
             ?>
             <form method="post"action="<?php echo base_url().'welcome/login'?>">
              <div class="form-outline mb-2">
                <b>
                  <label class="form-label" for="typeEmailX-2" style=" display: block; text-align: start;">Username</label>
                  <input type="text"name="username"placeholder="Masukkan Username..."class="form-control">
                  <?php echo form_error('username'); ?>
                </div>
                <div class="form-outline mb-2">
                  <label class="form-label" for="typePasswordX-2" style=" display: block; text-align: start;">Password</label>
                  <input type="password"name="password"placeholder="Masukkan Password..."class="form-control">
                  <?php echo form_error('password'); ?>
                </div>
              </b>
              <button class="btn btn-primary btn-lg btn-block" type="submit" value="Login">Login</button>
            </div>
          </div>
        </div>
      </section>
    </body>
    </html>