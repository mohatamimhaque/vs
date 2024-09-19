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
$('.utility_clear').click(function(event) {   
    if(this.checked) {
        $('.utility_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.utility_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.device_type_clear').click(function(event) {   
    if(this.checked) {
        $('.device_type').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.device_type').each(function() {
            this.checked = false;                       
        });
    }
});
$('.screen_size_clear').click(function(event) {   
    if(this.checked) {
        $('.screen_size_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.screen_size_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.screen_resolution_clear').click(function(event) {   
    if(this.checked) {
        $('.resolution_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.resolution_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.cpu_brand_clear').click(function(event) {   
    if(this.checked) {
        $('.cpu_brand_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.cpu_brand_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.cpu_model_clear').click(function(event) {   
    if(this.checked) {
        $('.cpu_model_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.cpu_model_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.cache_clear').click(function(event) {   
    if(this.checked) {
        $('.cache_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.cache_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.cpu_core_clear').click(function(event) {   
    if(this.checked) {
        $('.cpu_core_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.cpu_core_item').each(function() {
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
$('.graphics_clear').click(function(event) {   
    if(this.checked) {
        $('.graphics_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.graphics_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.os_clear').click(function(event) {   
    if(this.checked) {
        $('.os_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.os_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.ram_type_clear').click(function(event) {   
    if(this.checked) {
        $('.ram_type_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.ram_type_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.hdd_clear').click(function(event) {   
    if(this.checked) {
        $('.hdd_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.hdd_item').each(function() {
            this.checked = false;                       
        });
    }
});
$('.ssd_clear').click(function(event) {   
    if(this.checked) {
        $('.ssd_item').each(function() {
            this.checked = false;                        
        });
    } 
    else {
        $('.ssd_item').each(function() {
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
