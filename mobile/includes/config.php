<?php
$connect = new PDO("mysql:host=localhost;dbname=vs", "root", "");

$host = "localhost";
$username = "root";
$password = "";
$database = "vs";
$con =mysqli_connect("$host","$username","$password","$database",);

?>
<?php include("baseurl.php"); ?>




<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    const compareChartSearch = document.querySelector('.compareChartSearch');
    $('.compareSearchList').click(function(){
      compareChartSearch.classList.remove('active');
      var thisclicked = $(this); 
	    var value = thisclicked.closest('.pp').find('input').val();
      $.ajax({
              url:"<?= base_url('mobile/ajax/compare') ?>",
              method:"POST",
              data:{compare:'compare',id:value},
              success:function(data){
                load_comparecart_data();
              }
            })
     
   });
    $('.singleRemove').click(function(){
      var thisclicked = $(this); 
	    var value = thisclicked.closest('.compareCartContent').find('input').val();
      $.ajax({
        url:" <?= base_url('mobile/ajax/compare') ?>",
        type:"POST",
        cache:false,
        data:{singleRemove:'singleRemove',value:value},
        success:function(data){
          load_comparecart_data();
          }  
      });
   });
    $('.pRemoveAllBtn').click(function(){
      $.ajax({
        url:" <?= base_url('mobile/ajax/compare') ?>",
        type:"POST",
        cache:false,
        data:{pRemoveAllBtn:'pRemoveAllBtn'},
        success:function(data){
            load_comparecart_data();
          }  
      });
   });

   
    $('.mobile_compare').click(function(){
      var thisclicked = $(this); 
      var id = thisclicked.closest('.p').find('.mobile_compare').val();
      document.querySelector('.compareResultModal').style.display = "block";
      $.ajax({
        url:"<?= base_url('mobile/ajax/compare') ?>",
        method:"POST",
        data:{compare:'compare',id:id},
        success:function(data){
          load_comparecart_data();
          $('.compareResultModal .data').html(data);
        
        }
      })
    });
        



  function load_comparecart_data(){
    $.ajax({
        url:" <?= base_url('mobile/ajax/compare') ?>",
        type:"POST",
        cache:false,
        data:{comparecart:'comparecart'},
        success:function(data){
        $(".compareCart").html(data);
          }  
      });
    }
  });
</script>

