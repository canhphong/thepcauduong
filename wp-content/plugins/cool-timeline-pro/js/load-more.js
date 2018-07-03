jQuery(function($){

  if(typeof ctlloadmore != 'undefined' && typeof ctlloadmore.attribute != 'undefined') 
    {   
    var page =2;
    var loading = false;
    $('body').on('click', '.ctl_load_more', function(){
       var timeline_wrp= $(this).parents('.cool-timeline');
       var org_label=$(this).text();
       var loading_text=$(this).attr("data-loading-text");
       var button = timeline_wrp.find('.ctl_load_more');
       var last_year = timeline_wrp.find('.timeline-year:last').data('section-title');
       var alternate = timeline_wrp.find('.timeline-post:last').data('alternate');
    
        if( ! loading ) {
           $(this).html(loading_text);
          var max_pages= $(this).attr("data-max-num-pages");
          var max_page_num=parseInt(max_pages)+1;
           var type=$(this).attr("data-timeline-type");
             loading = true;
                var data = {
                    action: 'ctl_ajax_load_more',
                    page: page,
                    last_year:last_year,
                    alternate:alternate,
                    attribute: ctlloadmore.attribute
                };
                $.post(ctlloadmore.url, data, function(res) {
                    if( res.success) {
                         timeline_wrp.find('.cooltimeline_cont').append( res.data );
                         button.html(org_label);

                          timeline_wrp.find("a[class^='ctl_prettyPhoto']").prettyPhoto({
                             social_tools: false 
                             });
                           timeline_wrp.find("a[rel^='ctl_prettyPhoto']").prettyPhoto({
                              social_tools: false
                            });

                         page = page + 1;
                         loading = false;
                       if(page>=max_page_num){
                            button.hide();
                          }

                    } else {
                        // console.log(res);
                    }
                }).fail(function(xhr, textStatus, e) {
                   console.log(xhr.responseText);
                });

            }
  });

}

if(typeof ct_load_more != 'undefined' && typeof ct_load_more.attribute != 'undefined') 
    {   

     var page =2;
    var loading = false;
    $('body').on('click', '.ctl_load_more', function(){
       var timeline_wrp= $(this).parents('.cool-timeline');
       var button = timeline_wrp.find('.ctl_load_more');
       var last_year = timeline_wrp.find('.timeline-year:last').data('section-title');
       var alternate = timeline_wrp.find('.timeline-post:last').data('alternate');
       var org_label=$(this).text();
       var loading_text=$(this).attr("data-loading-text");

        if( ! loading ) {
          $(this).html(loading_text);
          var max_pages= $(this).attr("data-max-num-pages");
          var max_page_num=parseInt(max_pages)+1;
           var type=$(this).attr("data-timeline-type");
             loading = true;
                var data = {
                    action: 'ct_ajax_load_more',
                    page: page,
                    last_year:last_year,
                    alternate:alternate,
                    attribute: ct_load_more.attribute
                };
                $.post(ct_load_more.url, data, function(res) {
                    if( res.success) {
                         timeline_wrp.find('.cooltimeline_cont').append( res.data );
                         page = page + 1;
                         loading = false;
                        button.html(org_label);
                         timeline_wrp.find("a[class^='ctl_prettyPhoto']").prettyPhoto({
                             social_tools: false 
                             });
                           timeline_wrp.find("a[rel^='ctl_prettyPhoto']").prettyPhoto({
                              social_tools: false
                            });
                       if(page>=max_page_num){
                            button.hide();
                          }

                    } else {
                        // console.log(res);
                    }
                }).fail(function(xhr, textStatus, e) {
                   console.log(xhr.responseText);
                });

            }
  });


     }

    $(".ct-cat-filters").on("click",function($event){
        $event.preventDefault();
      $(".cat-filter-wrp ul li a").removeClass('active-category');
      $(this).addClass('active-category');
       var cat_name=$(this).text();
       var parent_wrp= $(this).parents(".cool_timeline");
       var preloader= parent_wrp.find('.filter-preloaders');
       parent_wrp.find(".custom-pagination").hide();
       preloader.show();
       var parent_id=parent_wrp.attr("id");
       var navigation="#"+parent_id+"-navi";
       var termSlug=$(this).data("term-slug");
        var action=$(this).data("action");
        var tm_type=$(this).data("tm-type");
       var loading = false;
       var org_label=$(this).text();
       var loading_text=$(this).attr("data-loading-text");
        
        if(tm_type=="story-tm"){
           var all_attrs= ctlloadmore.attribute;
           var ajax_url= ctlloadmore.url;
        }else{
         var all_attrs= ct_load_more.attribute;
         var ajax_url= ct_load_more.url;
        }

        if( ! loading ) {
           parent_wrp.find('.cooltimeline_cont').html(' ');
             loading = true;
                var data = {
                    action:action,
                    termslug:termSlug,
                    attribute:all_attrs
                };
                $.post(ajax_url, data, function(res) {
                    if( res.success) {
                     parent_wrp.find('.cooltimeline_cont').html(res.data);
                          loading = false;
                           preloader.hide();
                           $(navigation).remove();
                          $(parent_wrp).find(".timeline-main-title").text(cat_name);
                          $(parent_wrp).find(".no-content").hide();
                           $("#"+parent_id).find("a[class^='ctl_prettyPhoto']").prettyPhoto({
                             social_tools: false 
                             });
                            $("#"+parent_id).find("a[rel^='ctl_prettyPhoto']").prettyPhoto({
                              social_tools: false
                            });

                    } else {
                        // console.log(res);
                    }
                }).fail(function(xhr, textStatus, e) {
                   console.log(xhr.responseText);
                });
          }      
       });


});
