
   <script src="<?= base_url('admin/assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/sidebar-menu.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/app-script.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/misc.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/dashboard.js') ?>"></script>
  <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/dataTables.jqueryui.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/Jquery3.4.1.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/aos.js') ?>"></script>
  <script src="<?= base_url('assets/js/main.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/jquery.themepunch.tools.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/jquery.themepunch.revolution.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.actions.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.carousel.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.kenburn.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.migration.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.navigation.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.parallax.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.slideanims.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/revolution/js/extensions/revolution.extension.video.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js') ?>"></script> 
  <script src="<?= base_url('assets/js/script.js') ?>"></script>  
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> 
  <script>
      $(document).ready(function(){
        $("#navsearch").on("keyup", function(){
          var search = $(this).val();
          if (search !=="") {
          $.ajax({
          url:" <?= base_url('ajax/search') ?>",
          type:"POST",
          cache:false,
          data:{query:search},
          success:function(data){
          $("#bbb").html(data);
          $("#bbb").fadeIn();
          }  
          });
          }else{
          $("#bbb").html("");  
          $("#bbb").fadeOut();
          }
      });
      });
  </script>    
  <script>
      $(document).ready(function(){
        $("#homesearch").on("keyup", function(){
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
      });
  </script>    

   
    

  
  
  
</body>
</html>