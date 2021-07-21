$(document).ready(function () {
  if (getUrlParameter("conversation_id")) {
    var conversationId = getUrlParameter("conversation_id");
    $("#roomid").val(conversationId);
  }

  $('input[name="personaldetails"]').change(function(){
    if($('#name').prop('checked')) {
      $("#userid").attr("placeholder", "xyz abc");
    }else if($('#uid').prop('checked')) {
      $("#userid").attr("placeholder", "73fh77h2119h1");
    }
  });

  var accounttype;

  $("#enterroom").submit(function (event) {
    event.preventDefault();
    var conversation_id = $("#roomid").val();
    if (conversation_id == "") {
      alert("Please enter Room Number to proceed !!");
    } else {
        accounttype = "user";
        if($('#name').prop('checked')) {
          var name = $("#userid").val();
          var data = {
            conversation_id: conversation_id,
          };
          $("#enterbtn").html('<span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span> Checking Room Id');
          $.ajax({
            type: "POST",
            url: "getconversation.php", //the script to call to get data
            dataType: "json",
            data: data,
            success: function (
              result //on recieve of reply
            ) {
              console.log(result);
              console.log(result.id);
              if (result.id === conversation_id) {
                getuserid(conversation_id, accounttype, name);
              } else {
                alert("Room Id Not Found !!");
                $("#enterbtn").html("Submit");
              }
            },
            error: function (er) {
              console.log(er);
              console.log(er.responseText);
              alert("Room Id Not Found !!");
              $("#enterbtn").html("Submit");
            },
          });
        }else if($('#uid').prop('checked')) {
          var user_id = $('#userid').val();
          var data = {
            conversation_id: conversation_id,
          };
          $("#enterbtn").html('<span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span> Checking Room Id');
          $.ajax({
            type: "POST",
            url: "getconversation.php", //the script to call to get data
            dataType: "json",
            data: data,
            success: function (
              result //on recieve of reply
            ) {
              console.log(result);
              console.log(result.id);
              if (result.id === conversation_id) {
                enterroom(conversation_id, accounttype, user_id);
              } else {
                alert("Room Id Not Found !!");
                $("#enterbtn").html("Submit");
              }
            },
            error: function (er) {
              console.log(er);
              console.log(er.responseText);
              alert("Room Id Not Found !!");
              $("#enterbtn").html("Submit");
            },
          });
      }
    }
  });
});

function enterroom(conversation_id, accounttype, user_id) {
  data = { user: accounttype, id: user_id };
  $.ajax({
    type: "POST",
    url: "checkuser.php", //the script to call to get data
    dataType: "json",
    data: data,
    success: function (
      result //on recieve of reply
    ) {
      console.log(result);
      if (result === 1) {
        window.open(
          "viewconversation.php?conversation_id=" +
            conversation_id +
            "&user_id=" +
            user_id +
            "&account_type=" +
            accounttype,
          "_self"
        );
        $("#enterbtn").html("Submit");
      } else {
        alert("Account Not Found !!!");
        $("#enterbtn").html("Submit");
      }
    },
    error: function (er) {
      console.log(er);
      console.log(er.responseText);
      alert("Error Occured When Connecting to Server !!\nPlease Rety");
      $("#enterbtn").html("Submit");
    },
  });
}


function randomenterroom(conversation_id, accounttype, name) {
      window.open("viewconversation.php?conversation_id=" + conversation_id +"&name=" + name + "&account_type=" + accounttype,"_self");
}