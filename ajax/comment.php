<?php
session_start();
include("../admin/config/dbcon.php");
include("../includes/baseurl.php");
//comment.php
if(isset($_POST["comment"]))
{

	$data = array(
		':comment'			=>	$_POST["comment"],
        ':url'				=>	$_POST["url"],
		':user_id'			=>	$_POST["user_id"],
		
	);

	$query = "
	INSERT INTO comment
	(url,user_id,comment) 
	VALUES (:url,:user_id,:comment)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Comment Successfully Submitted";

}



if(isset($_POST["commentShow"])){
	$url =$_POST["url"];
	$comment = "SELECT * FROM comment WHERE url = '$url'";
	$comment_run = mysqli_query($con, $comment);
	if(mysqli_num_rows($comment_run) > 0){
	   foreach($comment_run as $row){
			$cid = $row['user_id'];
			$c =  mysqli_query($con, "SELECT * FROM users WHERE id = '$cid'");
			if(mysqli_num_rows($c) > 0){
				foreach($c as $d){
			?>
		  
		<div class="d-flex mb-4 w-100">
			<div class="mr-2">
				<div class="commentShowImage" style="width:55px;height:55px">
					<img src="<?= base_url('admin/upload/user/image/').$d['user_photo'] ?>" alt="avatar" style="width:100%;height:100%;border-radius:50%">
				</div>
			</div>
			<div class="commentContent w-100">
				<div class="commentHeader d-flex">
					<h3 class="mr-2" style="font-size:18px;color:black;margin:0;padding:2px">
					<?= $d['name']?>
					</h3>
					<sub style="margin:0;padding:0;color:black"><?= date('d-M-Y',strtotime($row['created_at'])); ?></sub>
				</div>
				<div class="commentText">
					<p style="font-size:13px;color:black;margin:0;padding:2px"><?= $row['comment']?></p>
				</div>
				<div class="d-flex mt-2">
					<p style="margin:0;margin-right:16px">
                        <a class="" data-toggle="collapse" href="#<?=$row['id'].'show' ?>" role="button" aria-expanded="false" aria-controls="<?=$row['id'].'show' ?>"  style="text-transform: uppercase;font-size:14px;font-weight:600;color:rgb(122, 126, 129);" >
                            <i class="fa-solid fa-eye"></i>view replies
                        </a>
                    </p>
					<?php if(isset($_SESSION['auth_user'])) : ?>
					<p style="margin:0">
                        <a class="" data-toggle="collapse" href="#<?=$row['id'] ?>" role="button" aria-expanded="false" aria-controls="<?=$row['id'] ?>"  style="text-transform: uppercase;font-size:14px;font-weight:600;color:rgb(122, 126, 129);" >
                            <i class="fa-solid fa-reply"></i>reply
                        </a>
                    </p>
					<?php else :?>
					
					<?php endif; ?>
				</div>
				<div class="mt-1">
					
					<?php if(isset($_SESSION['auth_user'])) : ?>
					<div class="reply collapse" style="margin:0;padding:0"  id="<?=$row['id'] ?>" >
						<div class="d-flex">
							<div>
								
								<div class="reply-user-image">
									<?php
									$id = $_SESSION['auth_user']['user_id'];
									foreach(mysqli_query($con,"SELECT * FROM users WHERE id = '$id'") as $r){
									}
									 ?>
									<img style="width:100%;height:100%;border-radius:50%" src="<?= base_url('admin/upload/user/image/'.$r['user_photo']) ?>" alt=""> 
								</div>
							</div>
							<div class="form-group col-md-10 mt-4">
								<input type="text" class="reply_msg" id="reply" placeholder="reply">
								<hr>
								<input type="hidden" class="reply_user_id" value="<?= $_SESSION['auth_user']['user_id'];?>" id="reply_user_id">
								<input type="hidden" id="rurl" value="<?= $row['url'] ?>">
								<div class="reply-btn-group" style="margin-top:5px;">
									<button type="button" value="<?= $row['id'] ?>" class="btn btn-primary reply_btn">reply</button>
								</div>
								
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<div class="replyShow collapse" id="<?=$row['id'].'show' ?>">
					<?php
					$commentId =$row['id'];
					$reply = "SELECT * FROM reply WHERE commentId = '$commentId'";
					$reply_run = mysqli_query($con, $reply);
					if(mysqli_num_rows($reply_run) > 0){
					foreach($reply_run as $row){
						$user_id = $row['user_id'];
						$q =  mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
						if(mysqli_num_rows($q) > 0){
							foreach($q as $r){
						?>
                    <div class="d-flex mr-2 mb-2">
						<div>
							<div style="width:40px;height:40px">
								<img src="<?= base_url('admin/upload/user/image/'.$r['user_photo'])?>" alt="#" style="width:100%;height:100%;border-radius:50%">
							</div>
						</div>
						<div>
							<div class="d-flex">
								<h3 class="mr-2" style="font-size:18px;color:black;margin:0;padding:2px">
									<?= $r['name']?>
								</h3>
								<sub style="margin:0;padding:0;color:black"><?= date('d-M-Y',strtotime($row['created_at'])); ?></sub>
							</div>
							<div class="commentText">
								<p style="font-size:13px;color:black;margin:0;padding:2px"><?= $row['reply']?></p>
							</div>
						</div>
					</div>


<?php

       }}}}
?>






				</div>




			</div>
		</div>
  <?php

}}}}}
?>

<script>

$(document).ready(function(){
  $('.reply_btn').click(function(){
    var thisclicked = $(this); 
	var commentId = thisclicked.closest('.reply').find('.reply_btn').val();
	var reply = thisclicked.closest('.reply').find('.reply_msg').val();
    var user_id = $('#reply_user_id').val();
    var url = $('#rurl').val();
    if(reply == '')
        {
            alert("Please Enter something..");
            return false;
        }
        else
        {
            $.ajax({
                url:"<?= base_url('ajax/reply') ?>",
                method:"POST",
                data:{reply:reply,user_id:user_id,commentId:commentId,url:url},
                success:function(data) {
					location.reload();
                }
            })
		}
		
   
     });
    

});
</script>