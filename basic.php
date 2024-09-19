<!--
<div id="preload"> 
    <div id="load"></div>
</div>
-->
<style>
     #preload{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    -ms-flex-flow: row wrap;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    flex-flow: row wrap;
    -ms-flex-pack: center;
    -webkit-box-pack: center;
    justify-content: center;
    -ms-flex-line-pack: center;
    align-content: center;
    background:rgba(0,0,0,.95);
    z-index: 500;
    height: 100vh;
    width: 100%;
    opacity: 1;
}


.no-js #preload, .oldie #preload {
    display: none;
}

#load {
    width: 5rem;
    height: 5rem;
    padding: 0;
    opacity: 1;
}

#load:before {
    content: "";
    border-top: 4px solid rgba(255, 255, 255, 0.15);
    border-right: 4px solid rgba(255, 255, 255, 0.15);
    border-bottom: 4px solid rgba(255, 255, 255, 0.15);
    border-left: 4px solid white;
    -webkit-animation: load 1.1s infinite linear;
    animation: load 1.1s infinite linear;
    display: block;
    border-radius: 50%;
    width: 5rem;
    height: 5rem;
}
@-webkit-keyframes load {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

@keyframes load {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
  .ss-loaded #preload {
    opacity: 0;
    visibility: hidden;
    -webkit-transition: all .6s .9s ease-in-out;
    transition: all .6s .9s ease-in-out;
}

.ss-loaded #preload #load {
    opacity: 0;
    -webkit-transition: opacity .6s ease-in-out;
    transition: opacity .6s ease-in-out;
}
</style>

<script>
    
    (function($) {

"use strict";



const ssPreloader = function() {

const preloader = document.querySelector('#preload');
if (!preloader) return;

document.querySelector('html').classList.add('ss-preload');

window.addEventListener('load', function() {
    
    document.querySelector('html').classList.remove('ss-preload');
    document.querySelector('html').classList.add('ss-loaded');

    preloader.addEventListener('transitionend', function(e) {
        if (e.target.matches("#preload")) {
            this.style.display = 'none';
        }
    });
});

// force page scroll position to top at page refresh
// window.addEventListener('beforeunload' , function () {
//     window.scrollTo(0, 0);
// });

}; // end ssPreloader


(function ssInit() {

ssPreloader();
})();

})(jQuery);

</script>

<a href="#" class="scrollToTop"><i class="fa-solid fa-angle-up"></i></a>
<div id="registerModal">
      <div class="card card-authentication1 mx-auto my-4">
        <div class="close">
          <div class="bar"></div>
        </div>
        <div class="card-body">
  
       <div class="card-content p-2">
           <div class="text-center">
               <img src="<?=$url?>admin/assets/images/logo-icon.png" alt="logo icon">
           </div>
        <div class="card-title text-uppercase text-dark text-center py-3">Sign Up</div>  
            <div class="form-group">
            <label for="name" class="sr-only">Name</label>
             <div class="position-relative  has-icon-right">
                <input type="text" id="name" name="name" class="bg-soft text-dark form-control input-shadow" placeholder="Enter Your Name" >
                <div class="form-control-position">
                    <i class="icon-user"></i>
                </div>
             </div>
            </div>
            <div class="form-group">
            <label for="uname" class="sr-only">Uaername</label>
             <div class="position-relative has-icon-right">
                <input type="text" id="uname" name="uname" class="bg-soft text-dark form-control input-shadow" placeholder="Username" >
                <div class="form-control-position">
                    <i class="icon-user"></i>
                </div>
             </div>
            </div>
            <div class="form-group">
            <label for="email" class="sr-only">Email ID</label>
             <div class="position-relative has-icon-right">
                <input type="text" id="email" name="email" class="bg-soft text-dark form-control input-shadow" placeholder="Enter Your Email ID" >
                <div class="form-control-position">
                    <i class="icon-envelope-open"></i>
                </div>
             </div>
            </div>
            <div class="form-group">
             <label for="registerpassword" class="sr-only">Password</label>
             <div class="position-relative has-icon-right">
                <input type="password" id="registerpassword" name="password" class="bg-soft text-dark form-control input-shadow" placeholder="Choose Password" >
                <div class="form-control-position">
                    <i class="icon-lock register_lock"></i>
                </div>
             </div>
             <div class="form-group passwordcheck ml-2 mt-1">
               <p class="text-warning c1"><i class="fa fa-xmark mr-1"></i> at least 8 characters</p>
               <p class="text-warning c2"><i class="fa fa-xmark mr-1"></i> at least 1 lowercase character</p>
               <p class="text-warning c3"><i class="fa fa-xmark mr-1"></i> at least 1 uppercase character</p>
               <p class="text-warning c4"><i class="fa fa-xmark mr-1"></i> at least 1 numberical number</p>
               <p class="text-warning c5"><i class="fa fa-xmark mr-1"></i> at least 1 special character ($,@,#,&,!)</p>
               <p class="text-warning c6"><i class="fa fa-xmark mr-1"></i> maximum number of characters is 20</p>
            </div>
            </div>
            <div class="form-group">
             <label for="cpassword" class="sr-only">Confirm Password</label>
             <div class="position-relative has-icon-right">
                <input type="password" id="cpassword" name="cpassword" class="form-control bg-soft text-dark form-control input-shadow" placeholder="Confirm Password" >
                <div class="form-control-position">
                    <i class="icon-lock register_lock2"></i>
                </div>
             </div>
             <p class="confirmpasswordcheck ml-2 mt-1"><i class="fa mr-1"></i> </p>
            </div>
            <div class="form-group" style="overflow:hidden">
              <div class="custom-file has-icon-right" style="overflow:hidden">
                <input  accept=".jpg,.jpeg,.png,.gif,.jfif" style="overflow:hidden" type="file" class="custom-file-input" name='image' id="image">
                <label for="image" style="text-transform:none" class="custom-file-label"><span style="overflow:hidden"></span><p>Choose Profile picture...</p></label>
                <div class="form-control-position">
                  <i class="fa-solid fa-image"></i>
                </div>
              </div>
            </div>
            
            <div class="form-group">
             <label for="" class="text-dark">Gender</label>
             <div class="position-relative" style="display:flex;justify-content:space-between; margin:auto">
                 <div class="form-check">
                     <input type="radio" value="Male" id="male" class="form-check-input" name="gender">
                      <label for="male" class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                     <input type="radio" id="female" name="gender" class="form-check-input" value="Female" >
                      <label for="female" class="form-check-label">Female</label>
                </div>
                <div class="form-check">
                     <input type="radio" id="custom" name="gender" class="form-check-input" value="Custom">
                      <label for="custom" class="form-check-label" >Custom</label>
                </div>
  
             </div>
            </div>
  
           
         
  
  
            
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" id="terms" class="form-check-input">
                <label for="terms" class='form-check-label'>I Agree With Terms & Conditions</label>
              </div>
            </div>
            
            <button type="submit" class="btn btn-light btn-block waves-effect waves-light" id="register_btn">Sign Up</button>
        
            <div class="text-center mt-3">Sign Up With</div>
            
           <div class="form-row mt-4">
            <div class="form-group mb-0 col-6">
             <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
           </div>
           <div class="form-group mb-0 col-6 text-right">
            <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
           </div>
          </div>
          
          
         </div>
        </div>
        <div class="card-footer text-center py-3">
          <p class="text-warning mb-0">Already have an account? <a class='signinhere'> Sign In here</a></p>
        </div>
      </div>
    </div>


<div id="loginModal" style="">
  <div style='' class="card card-authentication1 mx-auto my-5">
      <div class="close">
        <div class="bar"></div>
      </div>
      <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
            <img src="<?=$url?>admin/assets/images/logo-icon.png" alt="logo icon">
          </div>
            <div class="card-title text-dark text-uppercase text-center py-3">Sign In</div>
              
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <input  type="text" id="loginemail" name="email" class="bg-soft text-dark form-control input-shadow" placeholder="Enter Your Email Or Username">
                            <div class="form-control-position mt-3">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <input type="password" id="loginpassword" name="password" class="bg-soft text-dark form-control input-shadow" placeholder="Enter Password">
                            <div class="form-control-position mt-3">
                                <i class="icon-lock login-lock"></i>
                            </div>
                      </div>
                    </div>
                    <div class="d-block d-sm-flex justify-content-between align-items-center mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="remember">
                                                <label class="form-check-label" for="remember">
                                                  Remember me
                                                </label>
                                            </div>
                                            <div><a href="#" class="small text-right">Lost password?</a></div>
                                        </div>
                <button type="button" class="btn btn-light btn-block" id="login_btn">Sign In</button>
                <div class="text-center mt-3">Sign In With</div>  
                <div class="form-row mt-4">
                    <div class="form-group mb-0 col-6">
                        <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
                    </div>
                    <div class="form-group mb-0 col-6 text-right">
                        <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
                    </div>
                </div>
            
            </div>
        </div>
      <div class="card-footer text-center py-3">
          <p class="text-warning mb-0">Do not have an account? <a class="signuphere"> Sign Up here</a></p>
      </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $('#login_btn').click(function(){
            var thisclicked = $(this); 
            var email = thisclicked.closest('#loginModal').find('#loginemail').val();
            var password = thisclicked.closest('#loginModal').find('#loginpassword').val();
            var remember = $("#remember").is(":checked") ? 1:0;
            if(email != '' && password != ''){
              $.ajax({
                url:"<?= base_url('ajax/login') ?>",
                method:"POST",
                data:{login:'login',email:email,password:password,remember:remember},
                success:function(data){
                        location.reload();
                    }
                })
            }
            
        });
        
        
        
        
        $('#logout_btn').click(function(){   
            $.ajax({
                url:"<?= base_url('ajax/login') ?>",
                method:"POST",
                data:{logout_btn:'logout'},
                success:function(data){
            location.reload();
        }
    })
  });
  });


  
</script>

<script>
   $(document).ready(function(){
    $('#register_btn').click(function(){
        var thisclicked = $(this); 
	      var name = thisclicked.closest('#registerModal').find('#name').val();
	      var uname = thisclicked.closest('#registerModal').find('#uname').val();
	      var email = thisclicked.closest('#registerModal').find('#email').val();
	      var password = thisclicked.closest('#registerModal').find('#registerpassword').val();
	      var cpassword = thisclicked.closest('#registerModal').find('#cpassword').val();
	      var gender = document.querySelector('input[name="gender"]:checked').value;
        var image = $('#image')[0].files;
        var terms = $("#terms").is(":checked") ? 1:0;
        if(terms==1){
          if(password==cpassword){
            if(password.length>=8 && password.length<=20 && password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/) && password.match(/[$@#&!]+/)){
                if(name !='' && uname !='' && email !=''){
                  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                  if(email.match(mailformat)){
                    var fd = new FormData();
                    if(image.length > 0 ){
                      fd.append('image',image[0]);
                      fd.append('name',name);
                      fd.append('uname',uname);
                      fd.append('email',email);
                      fd.append('password',password);
                      fd.append('gender',gender);
                      $.ajax({
                        url:"<?= base_url('ajax/register') ?>",
                          type: 'post',
                          data: fd,
                          contentType: false,
                          processData: false,
                          success: function(response){
                            alert(response);
                            location.reload();
                            document.querySelector('#loginModal').style.display = "block";
                          },
                      });
                    }
                    else{
                      alert('Please Select a Photo for Profile ficture')
                    }
                  }
                  else{
                    alert('Enter Correct Email Id')
                  }
                }
                else{
                  alert('Please Fill Up the Form Completely');
                }
              }
              else{
                alert('Use Strong Password');
              }

          }
          else{
            alert('Password Does Not Matched...');
          }
          
        }
        else{
          alert('Please Agree With Terms & Condition...');
        }
        
    });
  $("#registerpassword").keyup(function(){
    const registerpasswordcheck = document.querySelector("#registerpassword").value;
    if( registerpasswordcheck!=''){
      document.querySelector('.passwordcheck').style.display = "block";
      check_pass();
    }
    else{
      document.querySelector('.passwordcheck').style.display = "none";
    }
    
  });
  function check_pass(){
    var code=document.querySelector("#registerpassword").value;
    const c1 = document.querySelector('.passwordcheck .c1');
    const c2 = document.querySelector('.passwordcheck .c2');
    const c3 = document.querySelector('.passwordcheck .c3');
    const c4 = document.querySelector('.passwordcheck .c4');
    const c5 = document.querySelector('.passwordcheck .c5');
    const c6 = document.querySelector('.passwordcheck .c6');
    if (code.length>=8){
      c1.classList.remove("text-warning");
      c1.classList.add("line-through");
      c1.classList.add("text-success");
      document.querySelector('.passwordcheck .c1 i').classList.add("fa-check");

    }
    else{
      c1.classList.add("text-warning");
      c1.classList.remove("line-through");
      c1.classList.remove("text-success");
      document.querySelector('.passwordcheck .c1 i').classList.remove("fa-check");
    }
    if(code.match(/[a-z]+/)){      
      c2.classList.remove("text-warning");
      c2.classList.add("line-through");
      c2.classList.add("text-success");
      document.querySelector('.passwordcheck .c2 i').classList.add("fa-check");
    }
    else{
      c2.classList.add("text-warning");
      c2.classList.remove("line-through");
      c2.classList.remove("text-success");
      document.querySelector('.passwordcheck .c2 i').classList.remove("fa-check");
    }
    if(code.match(/[A-Z]+/)){      
      c3.classList.remove("text-warning");
      c3.classList.add("line-through");
      c3.classList.add("text-success");
      document.querySelector('.passwordcheck .c3 i').classList.add("fa-check");
    }
    else{
      c3.classList.add("text-warning");
      c3.classList.remove("line-through");
      c3.classList.remove("text-success");
      document.querySelector('.passwordcheck .c3 i').classList.remove("fa-check");
    }
    if(code.match(/[0-9]+/)){      
      c4.classList.remove("text-warning");
      c4.classList.add("line-through");
      c4.classList.add("text-success");
      document.querySelector('.passwordcheck .c4 i').classList.add("fa-check");
    }
    else{
      c4.classList.add("text-warning");
      c4.classList.remove("line-through");
      c4.classList.remove("text-success");
      document.querySelector('.passwordcheck .c4 i').classList.remove("fa-check");
    }
    if(code.match(/[$@#&!]+/)){      
      c5.classList.remove("text-warning");
      c5.classList.add("line-through");
      c5.classList.add("text-success");
      document.querySelector('.passwordcheck .c5 i').classList.add("fa-check");
    }
    else{
      c5.classList.add("text-warning");
      c5.classList.remove("line-through");
      c5.classList.remove("text-success");
      document.querySelector('.passwordcheck .c5 i').classList.remove("fa-check");
    }
    if (code.length<=20){
      document.querySelector('.passwordcheck .c6').style.display = "none";
    }
    else{
      document.querySelector('.passwordcheck .c6').style.display = "block";
    }

 
}
});
</script>
<script>
  <?php if(isset($_SESSION['auth_user'])) : ?>
    $(document).ready(function(){

    const drop_menu_icon = document.querySelector(".signinfo");
    const dropmenu = document.querySelector(".dropmenu");
        drop_menu_icon.addEventListener("click",() => {
            dropmenu.classList.toggle("active");

        });
        })

  <?php else :?>
    $(document).ready(function(){
          const loginClose = document.querySelector('#loginModal .close');
          loginClose.addEventListener("click", () => {
            document.querySelector('#loginModal').style.display = "none";
          })
          const loginModalActive = document.querySelectorAll(".loginModalActive");
            for (let i = 0; i < loginModalActive.length; i++) {
              var loginbtn =loginModalActive[i];
              loginbtn.addEventListener("click", () => {
              document.querySelector('#loginModal').style.display = "block";
            })
            }
          const login_lock = document.querySelector(".login-lock");
          const loginpassword = document.querySelector("#loginpassword");
          login_lock.addEventListener("click", function () {
              const type = loginpassword.getAttribute("type") === "password" ? "text" : "password";
              loginpassword.setAttribute("type", type);
          });
          const registerClose = document.querySelector('#registerModal .close');
          registerClose.addEventListener("click", () => {
            document.querySelector('#registerModal').style.display = "none";
          })
          const registerModalActive = document.querySelector('.registerModalActive');
          registerModalActive.addEventListener("click", () => {
              document.querySelector('#registerModal').style.display = "block";
            })
            const register_lock = document.querySelector(".register_lock");
          const registerpassword = document.querySelector("#registerpassword");
          register_lock.addEventListener("click", function () {
              const type = registerpassword.getAttribute("type") === "password" ? "text" : "password";
              registerpassword.setAttribute("type", type);
          });
          const register_lock2 = document.querySelector(".register_lock2");
          const cpassword = document.querySelector("#cpassword");
          register_lock2.addEventListener("click", function () {
              const type = cpassword.getAttribute("type") === "password" ? "text" : "password";
              cpassword.setAttribute("type", type);
          });
          const signuphere = document.querySelector('.signuphere');
          signuphere.addEventListener("click", () => {
            document.querySelector('#loginModal').style.display = "none";
            document.querySelector('#registerModal').style.display = "block";
          })
          const signinhere = document.querySelector('.signinhere');
          signinhere.addEventListener("click", () => {
            document.querySelector('#registerModal').style.display = "none";
            document.querySelector('#loginModal').style.display = "block";
          })
          })
          <?php endif; ?>
</script>

    <script>
          $(document).ready(function(){
          'use strict';

( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.custom-file-input' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName ){

				label.querySelector( '.custom-file-label span' ).innerHTML = fileName;
        document.querySelector('.custom-file-label p').style.display = "none";
        document.querySelector('.custom-file-label span').style.display = "block";
      }

			else{
        document.querySelector('.custom-file-label span').style.display = "none";
        document.querySelector('.custom-file-label p').style.display = "block";
      }
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));
})
        </script>







