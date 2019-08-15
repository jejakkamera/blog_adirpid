  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb_iner text-center">
                  <div class="breadcrumb_iner_item">
                     <h2>sitemap</h2>
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
            <div class="col-lg-12 posts-list">
             BLOG <br>
             <ul>
                <li></li>
             
            <?php foreach($items as $item) { ?>
                <li>
                <a href="<?php echo base_url()."web/post/".$item['tubmail']; ?>"><?php echo $item['judul']; ?></a></li>
                
            <?php } ?>
            </ul>
            </div>
           
         </div>
      </div>
   </section>
