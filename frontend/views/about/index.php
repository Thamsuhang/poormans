
 <script type="text/javascript">
    $(document).ready(function(){
      $('.testimonial-01').slick({
        dots: false,
  infinite: true,
  arrows: false,
  speed: 400,
   autoplay: true,
  slidesToShow: 1,
  adaptiveHeight: true
      });
    });
  </script>

<section class = " p-v-90">
    <div class = "container">
        <div class = "row">
            <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class = "title_sec">
                    <h1><?php echo $datacenter['general-content']['about-section']['title']; ?></h1>
                    <h2><?php echo $datacenter['general-content']['about-section']['subtitle']; ?></h2>
                </div>
            </div>
            <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class = "abt">
                    <?php echo $datacenter['general-content']['about-section']['description']; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class = "bg-grey p-v-90 ">
    <div class = "container">
        <div class = "row">
            <div class = "col-md-6">
                <?php if ($datacenter['page-content']['who-we-are']['title'] != ''): ?>
                    <h2 class = "title"><?php echo $datacenter['page-content']['who-we-are']['title']; ?>
                        <?php if ($datacenter['page-content']['who-we-are']['subtitle'] != ''): ?><?php endif; ?>
                        <span><?php echo $datacenter['page-content']['who-we-are']['subtitle']; ?></span>
                    </h2>
                <?php endif; ?>
                <?php if ($datacenter['page-content']['who-we-are']['description'] != ''): ?>
                    <div class = "description">
                        <?php echo $datacenter['page-content']['who-we-are']['description']; ?>
                    </div>
                <?php endif; ?>

            </div>
            <div class = "col-md-6">
                <?php if ($datacenter['page-content']['what-we-do']['title'] != ''): ?>
                    <h2 class = "title"><?php echo $datacenter['page-content']['what-we-do']['title']; ?>
                        <?php if ($datacenter['page-content']['what-we-do']['subtitle'] != ''): ?><?php endif; ?>
                        <span><?php echo $datacenter['page-content']['what-we-do']['subtitle']; ?></span>
                    </h2>
                <?php endif; ?>
                <?php if ($datacenter['page-content']['what-we-do']['description'] != ''): ?>
                    <div class = "description">
                        <?php echo $datacenter['page-content']['what-we-do']['description']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<section class = "p-v-90">
    <div class = "container">
        <div class = "row">
            <div class = "col-md-4">
                <div class = "tri-sec text-center">
                    <div class = "round-icon-fill img-circle smooth">
                        <i class = "fa <?php echo $datacenter['page-content']['about-icon-one']['icon']; ?> img-circle smooth"></i>
                    </div>
                    <h3 class = "title"><?php echo $datacenter['page-content']['about-icon-one']['title']; ?>
                        <span>  <?php echo $datacenter['page-content']['about-icon-one']['subtitle']; ?> </span>
                    </h3>

                    <div class = "description">
                        <?php echo $datacenter['page-content']['about-icon-one']['description']; ?>
                    </div>

                </div>
            </div>
            <div class = "col-md-4">
                <div class = "tri-sec text-center">
                    <div class = "round-icon-fill img-circle smooth">
                        <i class = "fa <?php echo $datacenter['page-content']['about-icon-two']['icon']; ?> img-circle smooth"></i>
                    </div>
                    <h3 class = "title"><?php echo $datacenter['page-content']['about-icon-two']['title']; ?>
                        <span>  <?php echo $datacenter['page-content']['about-icon-two']['subtitle']; ?> </span>
                    </h3>

                    <div class = "description">
                        <?php echo $datacenter['page-content']['about-icon-two']['description']; ?>
                    </div>

                </div>
            </div>
            <div class = "col-md-4">
                <div class = "tri-sec text-center">
                    <div class = "round-icon-fill img-circle smooth">
                        <i class = "fa <?php echo $datacenter['page-content']['about-icon-three']['icon']; ?> img-circle smooth"></i>
                    </div>
                    <h3 class = "title"><?php echo $datacenter['page-content']['about-icon-three']['title']; ?>
                        <span>  <?php echo $datacenter['page-content']['about-icon-three']['subtitle']; ?> </span>
                    </h3>

                    <div class = "description">
                        <?php echo $datacenter['page-content']['about-icon-three']['description']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class = "testimonials p-t-90 p-b-0 bg-grey">
    <div class = "container">
        <h2 class = "title text-center"><strong>What </strong> People Say ?</h2>
        <div class = "testimonial-01 test-01">
            <?php foreach ($datacenter['testimonials'] as $item) : ?>
                <div class = "testimonial">
                    <div class = "description"><?= trim(ucwords($item['quote'])) ?></div>
                    <div class = "testimonial-content"><span class = "title"><?= trim(ucwords($item['client'])) ?></span>  <span class = "post"><?= trim(ucwords($item['position'])); ?></span></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>