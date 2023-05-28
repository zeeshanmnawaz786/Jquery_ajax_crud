<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
  Name: <input type="text" placeholder="Enter name" id="username" /><br /><br />
  Email: <input type="email" placeholder="Enter email" id="useremail" /><br /><br />
  <button id="submit">Submit</button>
  <button id="update" style="display:none">Update</button><br /><br />

  <div id="table"></div>
  <div id="updateData"></div>

  <script>
    $(document).ready(function() {

      // AJAX post
      $("button#submit").on("click", function(e) {
        e.preventDefault();
        var name = $("#username").val();
        var email = $("#useremail").val();

        var data = {
          name: name,
          email: email
        };

        // AJAX Post
        $.post("insert_data.php", data, function(response) {
          loadData();
        });
      });

      // AJAX get
      function loadData() {
        $.get("load_data.php", function(response) {
          $("#table").html(response);
        });
      }
      loadData();

      // AJAX delete
      $(document).on("click", ".deleteData", function(e) {
        var id = $(this).attr("id");
        var row = $(this).closest("tr");
        if (id) {
          $.post("delete_data.php", { id: id }, function(response) {
            row.hide();
          });
        }
      });

      // AJAX update
      $(document).on("click", ".updateData", function(e) {
        var id = $(this).attr("id");
        var name = $(this).closest("tr").find("td:eq(1)").text();
        var email = $(this).closest("tr").find("td:eq(2)").text();

        $("#username").val(name);
        $("#useremail").val(email);

        $("#submit").hide();
        $("#update").show().off("click").on("click", function(e) {
          e.preventDefault();

          var upd_name = $("#username").val();
          var upd_email = $("#useremail").val();

          $.post("update_data.php", { id: id, name: upd_name, email: upd_email }, function(response) {
            loadData();
            $("#submit").show();
            $("#update").hide();
            $("#username").val("");
            $("#useremail").val("");
          });
        });
      });

    });
  </script>
</body>
</html>
