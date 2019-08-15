<!-- banner part start-->
<section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>404 Page Not Found</h1>
                            <p>The page you requested was not found.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner_img d-none d-lg-block">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/404.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- banner part start-->
<div class="whole-wrap">
	<div class="container box_1170">
	<div class="section-top-border">
	<div class="row">	
	<div class="col-lg-8 posts-list">
				<h3 class="mb-30">recent blog</h3>
				<div class="row" id="post_blog">
            

					
				</div>
			</div>
			
			<div class="col-lg-4">
            <div class="blog_right_sidebar">
			
			<aside class="single_sidebar_widget tag_cloud_widget">
                     <h4 class="widget_title">Tag Clouds</h4>
                     <ul class="list" id="tag_post">
                        
                     </ul>
                  </aside>

			</div>
			</div>
		
		</div>
		<hr>
		</div>
	</div>
</div>


    <script>
      $(document).ready(function(){
         var blog = "blog";
         $.post("<?php echo base_url(); ?>api/post",{data: blog,category : ""}, function(data,status){
            //console.log(data);
            var obj = JSON.parse(data);
            if(obj.status==200){
               var data = (obj.data);
               var hasilItems = '';
               for(i = 0;i < 3; i++){

                  var hasilItem = '<div class="col-md-4"><div class="single-defination" style="text-align:justify;"><a href="<?php echo base_url('web/post/'); ?>'+data[i]['tubmail']+'"><h4 class="mb-20">'+data[i]['judul']+'</h4></a><img data-sizes="auto"  class="lazyload center" data-src="<?php echo base_url(); ?>'+data[i]['img_tub']+'" alt="post"><p>'+data[i]['isi_post']+'</p></div></div>';        
                   hasilItems = hasilItems+hasilItem;
                  //console.log(data[i]['judul']);
               }
               document.getElementById("post_blog").innerHTML = hasilItems;
               }else{
                  console.log(obj.message);
               }

            //console.log(obj['data']);
			
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
                  /*
                     <li>
                           <a href="#">design</a>
                        </li>

                  */
                  //console.log(data[i]['judul']);
               }
               
               }else{
                  console.log(obj.message);
               }

            //console.log(obj['data']);
			
        });

      });
    </script>
