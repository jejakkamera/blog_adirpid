  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb_iner text-center">
                  <div class="breadcrumb_iner_item">
                     <h1><?php echo $post->judul; ?></h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?php echo base_url().$post->img_tub; ?>" alt="<?php echo $post->judul; ?>">
                  </div>
                  <div class="blog_details">
                   

                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-user"></i> <?php echo $post->label; ?></a></li>
                        <li><a href="#"><i class="far fa-calendar"></i> <?php echo $post->create_date; ?></a></li>
                     </ul>
                     <?php echo stripcslashes($post->detail); ?>
                     
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> Lily and 4
                        people like this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="#">
                                 <h4>Space The Final Frontier</h4>
                              </a>
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="#">
                                 <h4>Telescopes 101</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="img/post/next.png" alt="">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="img/blog/author.png" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4>Harvard milan</h4>
                        </a>
                        <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                           our dominion twon Second divided from</p>
                     </div>
                  </div>
               </div>
               <div class="comments-area">
                  <h4>05 Comments</h4>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="img/comment/comment_1.png" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                 Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">Emilly Blunt</a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="img/comment/comment_2.png" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                 Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">Emilly Blunt</a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="img/comment/comment_3.png" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                 Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">Emilly Blunt</a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" action="#" id="commentForm">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                           </div>
                        </div>
                     </div>
                     <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm btn_1">Send Message <i
                              class="flaticon-right-arrow"></i> </button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                              <div class="input-group-append">
                                 <button class="btn" type="button"><i class="ti-search"></i></button>
                              </div>
                           </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
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
                 
                  <aside class="single_sidebar_widget instagram_feeds">
                     <h4 class="widget_title">Instagram Feeds</h4>
                     <ul class="instagram_row flex-wrap">
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="img/post/post_5.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="img/post/post_6.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="img/post/post_7.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="img/post/post_8.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="img/post/post_9.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="img/post/post_10.png" alt="">
                           </a>
                        </li>
                     </ul>
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

                  var hasilItem = '<div class="media post_item"><img class="lazyload" width="90px" height="80" width="80" src="<?php echo base_url(); ?>'+data[i]['img_tub']+'" alt="post"><div class="media-body"><a href="<?php echo base_url('web/post/'); ?>'+data[i]['tubmail']+'"><h3>'+data[i]['judul']+'</h3></a><p>'+data[i]['label']+'</p></div></div>';
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
               }
               
               }else{
                  console.log(obj.message);
               }
			
        });

      });
    </script>