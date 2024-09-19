$('.brand_clear').click(function(event) {   
    if(this.checked) {
        $('.brand_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.brand_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.device_type_clear').click(function(event) {   
    if(this.checked) {
        $('.device_type_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.device_type_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.display_clear').click(function(event) {   
    if(this.checked) {
        $('.display_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.display_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.camera_clear').click(function(event) {   
    if(this.checked) {
        $('.camera_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.camera_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.ram_clear').click(function(event) {   
    if(this.checked) {
        $('.ram_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.ram_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.connectivity_clear').click(function(event) {   
    if(this.checked) {
        $('.connctivity_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.connctivity_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.feature_clear').click(function(event) {   
    if(this.checked) {
        $('.feature_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.feature_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.memory_clear').click(function(event) {   
    if(this.checked) {
        $('.memory_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.memory_item').each(function() {
            this.checked = false;                       
        });
    }
});


const filterclose = document.querySelector('.filter .close');
    const filter = document.querySelector('.filter');
    const filter_btn = document.querySelector('.filterBtn');
    const page = document.querySelector('.page');
    const grid = document.querySelector('.page-grid');
    const list = document.querySelector('.page-list');
    filterclose.addEventListener("click", () => {
      filter.classList.add('close');
      filter.classList.remove('active');
      })
 
    filter_btn.addEventListener("click", () => {
      filter.classList.add('active');
      filter.classList.remove('close');
      })
  list.addEventListener("click", () => {
    page.classList.add('list');
    page.classList.remove('grid');
    list.classList.add('page-active');
    grid.classList.remove('page-active');
  })
  grid.addEventListener("click", () => {
    page.classList.add('grid');
    page.classList.remove('list');
    list.classList.remove('page-active');
    grid.classList.add('page-active');
  })













