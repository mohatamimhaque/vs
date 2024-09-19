        </div>
    </div>
  </div>
  <script src="<?= base_url('admin/assets/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/sidebar-menu.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/app-script.js') ?>"></script>

  <script src="<?= base_url('admin/assets/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/misc.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/dashboard.js') ?>"></script>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?= base_url('admin/assets/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/dataTables.jqueryui.min.js') ?>"></script>
  
  <script type="text/javascript">
  $(document).ready(function(){
  $("#search").on("keyup", function(){
  var search = $(this).val();
  if (search !=="") {
  $.ajax({
  url:" ajax/autofill.php",
  type:"POST",
  cache:false,
  data:{query:search},
  success:function(data){
  $(".bbb").html(data);
  $(".bbb").fadeIn();
  }  
  });
  }else{
  $(".bbb").html("");  
  $(".bbb").fadeOut();
  }
  });
  // click one particular search name it's fill in textbox
  $(document).on("click",".autofill-list", function(){
  $('#search').val($(this).text());
  $('.bbb').fadeOut("fast");
  });
  });
  
     </script>
  
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> 

   <script>

       $(document).ready(function() {

           $("#description").summernote({

               placeholder: 'Type Description Here...',

               tabsize: 2,

               height: 200


             });


       });

       $(document).ready(function() {
            $('.table').DataTable();
        } );

   </script>
<script>
    $('.select_all').click(function(event) {
    if(this.checked) {
        $(':checkbox').each(function() {
            this.checked = true;                        
        });

    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });

    }
}); 
 


</script>




  
</body>
</html>