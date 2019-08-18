 <!-- breadcrumb start-->
 <section class="breadcrumb breadcrumb_bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb_iner text-center">
                  <div class="breadcrumb_iner_item">
                     <h1><?php echo $judul; ?></h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb start-->

       <!--================Blog Area =================-->
       <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                    <div id="load_data"></div>
                    <div id="load_data_message"></div>

                       

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                               <div class="form-group">
                                  <div class="input-group mb-3">
                                  <form action="<?php echo base_url('web/search_key'); ?>">
                                     <input type="text" name='search' class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                     <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                     </div>
                                  </div>
                               </div>
                               <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                               </form>
                            </form>
                         </aside>

                         <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list" id="tag_post">
                                
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <div id="post_blog" >

                            </div>
                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <script>
  $(document).ready(function(){

    var blog = "blog";
         $.post("<?php echo base_url(); ?>api/post",{data: blog,category : ""}, function(data,status){
            //console.log(data);
            var obj = JSON.parse(data);
            if(obj.status==200){
               var data = (obj.data);
               var hasilItems = '';
               for(i = 0;i < 5; i++){

                  /*var hasilItem = '<div class="col-md-4"><div class="single-defination" style="text-align:justify;"><a href="<?php echo base_url('web/post/'); ?>'+data[i]['tubmail']+'"><h4 class="mb-20">'+data[i]['judul']+'</h4></a><img data-sizes="auto"  class="lazyload center" data-src="<?php echo base_url(); ?>'+data[i]['img_tub']+'" alt="post"><p>'+data[i]['isi_post']+'</p></div></div>';       */ 

                  var hasilItem = '<div class="media post_item"><img class="lazyload" width="90px" height="80" width="80" src="<?php echo base_url(); ?>'+data[i]['img_tub']+'" alt="post"><div class="media-body"><a href="single-blog.html"><h3>'+data[i]['judul']+'</h3></a><p>'+data[i]['label']+'</p></div></div>';
                   hasilItems = hasilItems+hasilItem;
                  //console.log(data[i]['judul']);
               }
               document.getElementById("post_blog").innerHTML = hasilItems;
               }else{
                  console.log(obj.message);
               }

            //console.log(obj['data']);
			
        });

    var limit = 7;
    var start = 0;
    var action = 'inactive';
    var cetegory_name="<?php echo $cetegory_name; ?>";
    var category_search="<?php echo $category_search; ?>";

    function lazzy_loader(limit)
    {
        var output = '';
        
      for(var count=0; count<limit; count++)
      {
        output += '<div class="post_data">';
        output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
        output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
        output += '</div>';
      }
      $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start)
    {
      $.ajax({
        url:"<?php echo base_url(); ?>api/fetch",
        
        method:"POST",
        data:{limit:limit, start:start,cetegory_name:cetegory_name,category_search:category_search},
        cache: false,
        success:function(data)
        {
          if(data == '')
          {
            $('#load_data_message').html('<h3>No More Result Found</h3>');
            action = 'active';
          }
          else
          {
            $('#load_data').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
        lazzy_loader(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });

    var tag = "tag";
         $.post("<?php echo base_url(); ?>api/post",{data: tag,category : ""}, function(data,status){
            //console.log(data);
            var obj = JSON.parse(data);
            if(obj.status==200){
               var data = (obj.data);
               var hasilItems = '';
               for(i = 0;i < data.length; i++){
                  const anchor = document.createElement('a');
                  const list = document.getElementById('tag_post');
                  const li = document.createElement('li');
                  anchor.href = "<?php echo base_url('web/search/label/'); ?>"+data[i]['tags'];
                  anchor.innerText = data[i]['tags']+" ("+data[i]['count']+")";
                  li.appendChild(anchor);
                  list.appendChild(li);
               }
               
               }else{
                  console.log(obj.message);
               }

			
        });


  });
</script>