<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Room</title>
    <link rel="icon" href="assets/image/Intercom.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: lightgreen" >
        <a class="navbar-brand" href="#">
          <svg width="30" height="30" viewBox="0 0 256 256" class="d-inline-block align-top" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" >
            <path d="M221.867 140.748a8.534 8.534 0 0 1-17.067 0V64a8.534 8.534 0 0 1 17.067 0v76.748zm-2.978 53.413c-1.319 1.129-32.93 27.655-90.889 27.655-57.958 0-89.568-26.527-90.887-27.656a8.535 8.535 0 0 1-.925-12.033 8.53 8.53 0 0 1 12.013-.942c.501.42 28.729 23.563 79.8 23.563 51.712 0 79.503-23.31 79.778-23.545 3.571-3.067 8.968-2.655 12.033.925a8.534 8.534 0 0 1-.923 12.033zM34.133 64A8.534 8.534 0 0 1 51.2 64v76.748a8.534 8.534 0 0 1-17.067 0V64zm42.668-17.067a8.534 8.534 0 0 1 17.066 0v114.001a8.534 8.534 0 0 1-17.066 0v-114zm42.666-4.318A8.532 8.532 0 0 1 128 34.082a8.532 8.532 0 0 1 8.534 8.533v123.733a8.534 8.534 0 0 1-17.067 0V42.615zm42.667 4.318a8.534 8.534 0 0 1 17.066 0v114.001a8.534 8.534 0 0 1-17.066 0v-114zM224 0H32C14.327 0 0 14.327 0 32v192c0 17.672 14.327 32 32 32h192c17.673 0 32-14.328 32-32V32c0-17.673-14.327-32-32-32z" fill="#1F8DED" />
          </svg>
          Admin
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" -expanded="false" aria-label="Toggle navigation" >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <section>
      <div class="container my-3 py-3">
        <div class="row">
          <div class="col"></div>
          <div class="col-6">
            <h2>Create New Conversation Room</h2>
            <div class="form-group">
            <label for="exampleInputEmail1">Enter Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter Title">
            <small id="emailHelp" class="form-text text-muted">Required</small>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Enter Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email">
            <small id="emailHelp" class="form-text text-muted">Optional</small>
            </div>
            <button type="button" id="createroom" class="btn btn-primary btn-lg btn-block">Create Room</button>
          </div>
          <div class="col"></div>
        </div>
      </div>
      <div class="container my-3 py-3">
        <div class="row">
          <div class="col"></div>
          <div class="col-6 text-center">
            <h2>CREATED ROOM ID</h2>
            <h5 id="roomid" class="my-3 py-3 border border-primary">Your Room Id Will be Here</h5>
            <button id="enterroom" type="submit" class="btn btn-primary btn-lg">
              Enter Room
            </button>
          </div>
          <div class="col"></div>
        </div>
      </div>
    </section>
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/admin.js"></script>
  </body>
</html>
