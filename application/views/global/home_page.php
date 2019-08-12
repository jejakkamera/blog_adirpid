<!-- banner part start-->
<section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Selamat Datang di adirp.id</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner_img d-none d-lg-block">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/banner_img.png" alt="">
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


<section class="pricing_part section_padding single_page_pricing">
        <div class="container">
            <div class="row justify-content-center">
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-6">
                    <div class="single_pricing_part">
					<h3 class="widget_title">Course</h3>
					<hr>
                     <div class="media post_item">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/post/post_1.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.html">
                              <h3>From life was you fish...</h3>
                           </a>
                           <p>January 12, 2019</p>
                        </div>
                     </div>

                     <div class="media post_item">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/post/post_2.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.html">
                              <h3>The Amazing Hubble</h3>
                           </a>
                           <p>02 Hours ago</p>
                        </div>
                     </div>

                     <div class="media post_item">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/post/post_3.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.html">
                              <h3>Astronomy Or Astrology</h3>
                           </a>
                           <p>03 Hours ago</p>
                        </div>
                     </div>

                     <div class="media post_item">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/post/post_4.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.html">
                              <h3>Asteroids telescope</h3>
                           </a>
                           <p>01 Hours ago</p>
                        </div>
                     </div>
                    </div>
				</div>
				
                <div class="col-lg-6 col-sm-6">
                    <div class="single_pricing_part">
					<h3 class="widget_title">Product</h3>
					<hr>
                     <div class="media post_item">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/post/post_1.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.html">
                              <h3>From life was you fish...</h3>
                           </a>
                           <p>January 12, 2019</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/post/post_2.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.html">
                              <h3>The Amazing Hubble</h3>
                           </a>
                           <p>02 Hours ago</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/post/post_3.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.html">
                              <h3>Astronomy Or Astrology</h3>
                           </a>
                           <p>03 Hours ago</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/post/post_4.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.html">
                              <h3>Asteroids telescope</h3>
                           </a>
                           <p>01 Hours ago</p>
                        </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>
       </section>
	
<!-- cta part start-->
<section class="cta_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="cta_text text-center">
                        <h2>Very useful Friendly</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo</p>
                        <a href="#" class="btn_2 banner_btn_1">Get Started </a>
                        <a href="#" class="btn_2 banner_btn_2">Sign up for free </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
