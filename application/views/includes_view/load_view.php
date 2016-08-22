<script>

$(document).ready(function () {
    
               var page = <?PHP echo $page; ?>
               
             
               showPage(page);
                
//                $('[data-toggle="offcanvas"]').click(function () {
//                    $('.row-offcanvas').toggleClass('active')
//                });
            });    
    function showPage(page) {
       
        switch(page){
            case 0 :
                        $('#main_view').load('<?php echo base_url('sports/default_'); ?>');
                        break;
                        
        }
        
    }

</script>