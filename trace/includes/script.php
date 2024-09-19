<script>
    $(document).ready(function(){
    $(".search1").on("keyup", function(){
        var search = $(this).val();
        if (search !=="") {
            $.ajax({
                url:" <?= base_url('trace/ajax/autofill') ?>",
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
})
    $(document).ready(function(){
    $(".search2").on("keyup", function(){
        var search = $(this).val();
        if (search !=="") {
            $.ajax({
                url:" <?= base_url('trace/ajax/autofill') ?>",
                type:"POST",
                cache:false,
                data:{query:search},
                success:function(data){
                    $(".bbb2").html(data);
                    $(".bbb2").fadeIn();
                }  
            });
        }else{
            $(".bbb2").html("");  
            $(".bbb2").fadeOut();
        }
    });
})



</script>


        <script>
                    const filterButtons = document.querySelector("#filter-btns").children;
                    const items = document.querySelector(".tabRight").children;
  
                        for (let i = 0; i < filterButtons.length; i++) {
                            filterButtons[i].addEventListener("click", function () {
                                for (let j = 0; j < filterButtons.length; j++) {
                                    filterButtons[j].classList.remove("active")
                                }
                                this.classList.add("active");
                                const target = this.getAttribute("data-target")
                        
                                for (let k = 0; k < items.length; k++) {
                                    items[k].style.display = "none";
                                    if (target == items[k].getAttribute("data-id")) {
                                        items[k].style.display = "block";
                                    }
                                    if (target == "all") {
                                        items[k].style.display = "block";
                                    }
                                }
                        
                            })
                        }
                </script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
