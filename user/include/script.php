  <!-- Vendor JS Files -->
  <script src="../nice/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../nice/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../nice/assets/vendor/chart.js/chart.min.js"></script>
  <script src="../nice/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../nice/assets/vendor/quill/quill.min.js"></script>
  <script src="../nice/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../nice/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../nice/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../nice/assets/js/main.js"></script>
<!-- 
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable({
        language: {
          "decimal": "",
          "emptyTable": "ไม่พบข้อมูล",
          "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
          "infoEmpty": "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
          "infoFiltered": "(filtered from _MAX_ total entries)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "แสดง _MENU_ รายการ",
          "loadingRecords": "กำลังค้นหา...",
          "processing": "Processing...",
          "search": "ค้นหา:  ",
          "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
          "paginate": {
            "first": "First",
            "last": "Last",
            "next": "Next",
            "previous": "Previous"
          },
          "aria": {
            "sortAscending": ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
          }
        }
      });
    });
  </script> -->

  <!-- button select -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="product/button/src/ui-choose.js"></script>
  <script>
    $('.ui-choose').ui_choose();
    var uc_02 = $('#uc_02').data('ui-choose');
    uc_02.click = function(value, item) {
      console.log('click', value);
    };
    uc_02.change = function(value, item) {
      console.log('change', value);
    };
  </script>

  <!-- datatable -->
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- cal -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->

  <!-- cal ปุ่ม -->
  <script type="text/javascript">
    function inputnum(a) {
      document.getElementById("show").value += a;
    }
  </script>

<script>
  $(document).ready(function() {
    $('#tableall').DataTable();
  });
</script>