<div class="compareCart">
<!------------autofill from ajax/comparecart.hp---------------------->

</div>
<div class="compareResultModal">
    <div class="compareResult">
        <div class="close">
            <div class="bar"></div>
        </div>
        <div class="data">
            
        </div>
        <div class="btnGroup d-flex">
            <button>CONTINUE</button>
        </div>
   </div>
</div>


<div class="compareChartSearch">
    <div class="compareChartSearchClose">
        <div class="bar"></div>
    </div>
    <div class="compareSearchContent position-relative">
        <h3>search the prodact to add</h3>
        <p>select a product from search suggestions</p>
        <div class="search"  style="margin-bottom:12px position:relative">
            <div class="InputContainer">
                <input  class='compareSearch3' placeholder="add another product..."/>
            </div>
            <div class="compareSearchResult">
                <!--------------autofill from ajax/compare.php---------------------->
            </div>
        </div> 
    </div>
</div>




<script>
    

const compareChartSearch = document.querySelector('.compareChartSearch');
const compareChartSearchClose = document.querySelector('.compareChartSearchClose');
compareChartSearchClose.addEventListener("click", () => {
    compareChartSearch.classList.add('close');
    compareChartSearch.classList.remove('active');
   
})

const compareResultclose = document.querySelector('.compareResultModal .close');
compareResultclose.addEventListener("click", () => {
    document.querySelector('.compareResultModal').style.display = "none";
   
})
const compareResultcontinue = document.querySelector('.btnGroup button');
compareResultcontinue.addEventListener("click", () => {
    document.querySelector('.compareResultModal').style.display = "none";
   
})



</script>