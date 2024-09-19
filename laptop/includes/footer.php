<script>
   $(document).ready(function(){
    const filterclose = document.querySelector('.filter .close');
    const filter = document.querySelector('.filter');
    const filter_btn = document.querySelector('.filterBtn');
    const page = document.querySelector('.page');
    filterclose.addEventListener("click", () => {
      filter.classList.add('close');
      filter.classList.remove('active');
      })
 
    filter_btn.addEventListener("click", () => {
      filter.classList.add('active');
      filter.classList.remove('close');
      })

  $("#search").on("keyup", function(){
  var search = $(this).val();
  if (search !=="") {
  $.ajax({
  url:" <?= base_url('ajax/search') ?>",
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
 
 
  $("#criteria").on("keyup", function(){
  var criteria = $(this).val();
  if (criteria !=="") {
  $.ajax({
  url:"<?= base_url('laptop/ajax/autofill') ?>",
  type:"POST",
  cache:false,
  data:{criteria:criteria},
  success:function(data){
  var check = document.getElementById('criteria_result') ;
  check.value=criteria;
  check.click();
  check.checked=true;

  }  
  });
  }
  
  var check = document.getElementById('criteria_result') ;
  check.click();
  if(check.checked=false){
    document.getElementById('criteria').value='';
  }
  });

  });
  </script>
  <script src="<?= base_url('admin/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/sidebar-menu.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/app-script.js') ?>"></script>
  
    <script src="<?= base_url('admin/assets/js/off-canvas.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/misc.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/dashboard.js') ?>"></script>
    
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/dataTables.jqueryui.min.js') ?>"></script>
   
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> 
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
  <script src="<?= base_url('laptop/js/select.js') ?>"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> 

   
    

  
  
  
</body>
</html>