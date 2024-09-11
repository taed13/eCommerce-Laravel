<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<!--app JS-->
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://developercodez.com/developerCorner/parsley/parsley.min.js"></script>
<script src="{{asset('snackbar/dist/js-snackbar.js')}}"></script>
<script type="text/javascript" src="{{asset('multiSelect/jquery.multi-select.js')}}"></script>

<script>
  $(document).ready(function() {
    $("#show_hide_password a").on("click", function(event) {
      event.preventDefault();
      if ($("#show_hide_password input").attr("type") == "text") {
        $("#show_hide_password input").attr("type", "password");
        $("#show_hide_password i").addClass("bx-hide");
        $("#show_hide_password i").removeClass("bx-show");
      } else if (
        $("#show_hide_password input").attr("type") == "password"
      ) {
        $("#show_hide_password input").attr("type", "text");
        $("#show_hide_password i").removeClass("bx-hide");
        $("#show_hide_password i").addClass("bx-show");
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    $("#formSubmit").on("submit", function(e) {
      if ($(this).parsley().validate()) {
        e.preventDefault();
        var formData = new FormData(this);
        var html = '<button class="btn btn-primary" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>';
        var html1 = '<input type="submit" id="submitButton" class="btn btn-primary px-4" />';
        $("#submitButton").html(html);
        $.ajax({
          url: $(this).attr("action"),
          type: "POST",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(result) {
            if(result.status == 'Success'){
              showAlert(result.status, result.message);
              $("#submitButton").html(html1);

              if(result.data.reload == true) {
                setTimeout(function() {
                  location.reload();
                }, 2000);
              }
            } else {
              showAlert(result.status, result.message);
              $("#submitButton").html(html1);
            }
          },
          error: function(err) {
            showAlert(err.responseJSON.status, err.responseJSON.message);
            $("#submitButton").html(html1);
          }
        });
      }
    });
  });

  function deleteData(id, table) {
    var html = '<button class="btn btn-danger" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>';
    var html1 = '<button class="btn btn-danger" type="button">Delete</button>';
    if (confirm("Are you sure you want to delete this?")) {
      $.ajax({
        url: "{{url('admin/deleteData')}}/" + id + "/" + table + "",
        type: "GET",
        data: {
          id: id,
          table: table,
          _token: "{{csrf_token()}}"
        },
        success: function(result) {
          if(result.status == 'Success'){
            showAlert(result.status, result.message);
            $("#submitButton").html(html1);

            if(result.data.reload == true) {
              setTimeout(function() {
                location.reload();
              }, 2000);
            }
          } else {
            showAlert(result.status, result.message);
            $("#submitButton").html(html1);
          }
        },
        error: function(err) {
          showAlert(result.responseJSON.status, result.responseJSON.message);
          $("#submitButton").html(html1);
        }
      });
    }
  }
</script>

<script>
  function showAlert (status, message) {
    SnackBar({
      status: status,
      message: message,
      position: 'br'
    })
  }
</script>

<script>
  $(document).ready(function () {
    $("#example").DataTable();
  });
</script>
<script>
  $(document).ready(function () {
    var table = $("#example2").DataTable({
      lengthChange: false,
      buttons: ["copy", "excel", "pdf", "print"],
    });

    table
      .buttons()
      .container()
      .appendTo("#example2_wrapper .col-md-6:eq(0)");
  });
</script>

<script type="text/javascript">
  $(function () {
    $("#attribute_id").multiSelect();
    $("#ice-cream").multiSelect();
    $("#line-wrap-example").multiSelect({
      positionMenuWithin: $(".position-menu-within"),
    });
    $("#categories").multiSelect({
      noneText: "All categories",
      presets: [
        {
          name: "All categories",
          all: true,
        },
        {
          name: "My categories",
          options: ["a", "c"],
        },
      ],
    });
    $("#modal-example").multiSelect({
      modalHTML: '<div class="multi-select-modal">',
    });
  });
</script>