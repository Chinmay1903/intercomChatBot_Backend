<?php
session_start();
if ($_GET["account_type"] == "random") {
    $data = array("conversation_id" => $_GET["conversation_id"], "name" => $_GET["name"], "user" => $_GET["account_type"]);
    $data = json_encode($data);
} else {
    $data = array("conversation_id" => $_GET["conversation_id"], "user_id" => $_GET["user_id"], "user" => $_GET["account_type"]);
    $data = json_encode($data);
}
setcookie("conversationroom", $data, 2147483647);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conversation</title>
    <link rel="icon" href="assets/image/Intercom.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="css/custom.css" />
  </head>
  <body>
    <header>
      <nav
        class="navbar navbar-expand-lg navbar-light"
        style="background-color: lightgreen"
      >
        <p id="con_id" class="navbar-brand" href="#">
          <svg width="30" height="30" viewBox="0 0 256 256" class="d-inline-block align-top" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" >
            <path d="M221.867 140.748a8.534 8.534 0 0 1-17.067 0V64a8.534 8.534 0 0 1 17.067 0v76.748zm-2.978 53.413c-1.319 1.129-32.93 27.655-90.889 27.655-57.958 0-89.568-26.527-90.887-27.656a8.535 8.535 0 0 1-.925-12.033 8.53 8.53 0 0 1 12.013-.942c.501.42 28.729 23.563 79.8 23.563 51.712 0 79.503-23.31 79.778-23.545 3.571-3.067 8.968-2.655 12.033.925a8.534 8.534 0 0 1-.923 12.033zM34.133 64A8.534 8.534 0 0 1 51.2 64v76.748a8.534 8.534 0 0 1-17.067 0V64zm42.668-17.067a8.534 8.534 0 0 1 17.066 0v114.001a8.534 8.534 0 0 1-17.066 0v-114zm42.666-4.318A8.532 8.532 0 0 1 128 34.082a8.532 8.532 0 0 1 8.534 8.533v123.733a8.534 8.534 0 0 1-17.067 0V42.615zm42.667 4.318a8.534 8.534 0 0 1 17.066 0v114.001a8.534 8.534 0 0 1-17.066 0v-114zM224 0H32C14.327 0 0 14.327 0 32v192c0 17.672 14.327 32 32 32h192c17.673 0 32-14.328 32-32V32c0-17.673-14.327-32-32-32z" fill="#1F8DED" />
          </svg>
          Intercom Conversation Room Id :
        </p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" id="copy" title="Copy Url to Clipboard"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tone" title="Notification Tone Off"><i class="fa fa-volume-off" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <section>
      <div class="container-flex msg-box" id="conversation">
      </div>
    </section>
    <footer>
      <div class="container-flex fixed-bottom py-4 px-3" style="background-color: lightgreen">
        <div id="preview"></div>
        <div class="input-group">
          <textarea id="msg" type="text" oninput="isValidURL()" class="form-control" placeholder="Message..." aria-label="Recipient's username" aria-describedby="basic-addon2" cols="30" rows="1"></textarea>
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-paperclip" aria-hidden="true"></i></button>
            <button id="sendmsg" class="btn btn-primary" type="button">
              <i class="fa fa-paper-plane" aria-hidden="true"></i> Send
            </button>
          </div>
        </div>
      </div>
    </footer>

    <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Upload Form</h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h2 class="text-center">Welcome</h2>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Upload Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <!-- Form -->
              <!-- <form method="post" action="" enctype="multipart/form-data"> -->
              Select file :
              <input type="file" accept="image/*" name="file" id="file" class="form-control"  onchange="readURL(this);" /><br />
              <!-- Preview-->
              <!-- <div id="preview"></div><br /> -->
              <img id="blah" src="http://placehold.it/180" alt="your image" /><br />
              Enter Message :
              <input type="text" name="msg2" id="msg2" class="form-control" placeholder="Message..."/><br />
              <!-- <input type="button" class="btn btn-info" value="Upload" id="btn_upload" /> -->
            <!-- </form> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="attachmetsent" type="button" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
          </div>
        </div>
      </div>
    </div>

    <button id="scroll-btn" style="display: none;">New Message <i class="fa fa-angle-double-down" aria-hidden="true"></i></button>

    <div id="loader" class="loading">Loading&#8230;</div>

    <script src="js/lib/jquery.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="js/lib/favico-0.3.10.min.js"></script>
    <script src="js/lib/geturlparameter.js"></script>
    <script src="js/lib/favico-0.3.10.min.js"></script>
    <script src="js/viewconversation.js"></script>
  </body>
</html>
