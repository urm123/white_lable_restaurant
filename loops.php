<?php
/* Template Name: Index */
get_header();

?>

    <section class="home-hero">
        <div class="container">
            <!--<img src="<?php echo get_template_directory_uri(); ?>/img/Home-Hero.png" class="img-responsive"
                alt="home background">-->
            <div class="slider first-slider">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0"
                            class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/Home-Hero.png"
                                 class="img-responsive" alt="First slide">
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/home-hero-1.jpg"
                                 class="img-responsive" alt="First slide">
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/home-hero-2.jpg"
                                 class="img-responsive" alt="First slide">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span
                                class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span
                                class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="home-intro">
        <div class="container">
            <div class="row col-md-12">
                <h1 class="text-center">Lifesports is your gateway to adventure</h1>
                <p>Get fitter, meet likeminded people to train with,check out the latest events and register direct with
                    them, use our training programs to acheive your best results and buy all the discounted kit you need
                    for whatever event you want to compete in.</p>
            </div>
        </div>
    </section>

    <!-- Service Section -->
    <section class="home-service-section desktop-only">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 hover03">
                    <a href="<?php echo get_site_url(); ?>/events">
                        <div class="service-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/calendar-with-a-clock-time-tools.png"
                                 class="img-responsive">
                            <h5> Choose your event by going to our events page or click on this button. Choose by date
                                and sport and get it in your diary.</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 hover03">
                    <a href="<?php echo get_site_url(); ?>/training-program">
                        <div class="service-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/weightlifting.png"
                                 class="img-responsive">
                            <h5>Choose your training program for the event. Go to the Training tab or click this button
                                to view and download your training program.</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 hover03">
                    <a href="<?php echo get_site_url(); ?>/training-partners">
                        <div class="service-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/bodypump.png"
                                 class="img-responsive">
                            <h5>Meet a training partner to get ready for your event so you don't have to train alone.
                                Click on this tab or go to Training tab and meet up with likeminded people.</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section -->

    <!-- Service Section -->
    <section class="home-service-section mobile-only" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 hover03">
                    <a href="<?php echo get_site_url(); ?>/events">
                        <div class="service-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/calendar-with-a-clock-time-tools.png"
                                 class="img-responsive">
                            <h5> Events</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 hover03">
                    <a href="<?php echo get_site_url(); ?>/training-program">
                        <div class="service-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/weightlifting.png"
                                 class="img-responsive">
                            <h5>Training programs</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 hover03">
                    <a href="<?php echo get_site_url(); ?>/training-partners">
                        <div class="service-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/bodypump.png"
                                 class="img-responsive">
                            <h5>Training Partners</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section -->

    <section class="home-intro">
        <div class="container">
            <div class="row col-md-12">
                <h1 class="text-center">NOW CHOOSE YOUR KIT FOR THE EVENTS AT A MASSIVE DISCOUNT FROM OUR RANGE OF FLASH
                    SALES.</h1>
            </div>
        </div>
    </section>


    <section class="home-category-list">
        <div class="container">
            <div class="row" id="myDiv">
                <ul id="myTabs" class="nav nav-pills nav-justified category-tab" role="tablist" data-tabs="tabs">
                    <div class="row">
                        <?php

                        $taxonomy = 'product_cat';
                        $orderby = 'name';
                        $show_count = 0;      // 1 for yes, 0 for no
                        $pad_counts = 0;      // 1 for yes, 0 for no
                        $hierarchical = 1;      // 1 for yes, 0 for no
                        $title = '';
                        $empty = 0;

                        $args = array(
                            'taxonomy' => $taxonomy,
                            'orderby' => $orderby,
                            'show_count' => $show_count,
                            'pad_counts' => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li' => $title,
                            'hide_empty' => $empty
                        );

                        $categories = get_categories($args);

                        //create empty array
                        $brands = [];

                        foreach ($categories as $key => $category) {

                            $category_array = [];
                            $brands[] = $category;

                            $thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);

                            // get the image URL
                            $image = wp_get_attachment_url($thumbnail_id);
                            ?>

                            <?php
                            $products = get_posts(array(
                                'post_type' => 'product',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id', // this can be 'term_id', 'slug' & 'name'
                                        'terms' => $category->term_id,
                                    )
                                )
                            ));


                            foreach ($products as $product) {

//        get the product brand
                                $product_brand = get_the_terms($product->ID, 'pwb-brand');


//        create this variable to manage repeats


                                $brand_flag = true;

//        use this as it is

//        use this as it is

//        add selected brands to array
                                if ($brand_flag) {
                                    $category_array[] = $product_brand[0];
                                }

                            }

                            $brands[$key]->brands = $category_array;


                        }

                        ?>
                        <pre>
						<?php print_r($brands); ?>
						</pre>
                        <?php


                        foreach ($brands as $brand) {
                            //your html
                            $brand_logo_id = get_term_meta($brand->term_id, 'pwb_brand_image', true);
                            $brand_logo = wp_get_attachment_image_src($brand_logo_id, 'full')[0];

                            $category1 = get_term_meta($brand->term_id, 'product_cat', true);

                            ?>
                            <div class="col-md-15 col-sm-2 col-xs-4 hover02">
                                <!--   <li>
                                <a href="#<?php echo $category->name ?>" data-toggle="tab"><img
                                            src="<?php echo $image ?>" class="img-responsive" alt=""
                                            style="max-height: 200px;">
                                    <div class="text-block">
                                        <h4><?php echo $category->name ?></h4>
                                    </div>
                                </a>
                            </li> -->
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <li>
                                    <a href="#<?php echo $brand->name ?>" data-toggle="tab"> <img
                                                src="<?php echo $brand_logo ?>"> </a>
                                </li>
                            </div>


                            <?php
                        }
                        ?>

                    </div>

                    <div class="tab-content">
                        <?php

                        $taxonomy = 'product_cat';
                        $orderby = 'name';
                        $show_count = 0;      // 1 for yes, 0 for no
                        $pad_counts = 0;      // 1 for yes, 0 for no
                        $hierarchical = 1;      // 1 for yes, 0 for no
                        $title = '';
                        $empty = 0;

                        $args = array(
                            'taxonomy' => $taxonomy,
                            'orderby' => $orderby,
                            'show_count' => $show_count,
                            'pad_counts' => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li' => $title,
                            'hide_empty' => $empty
                        );
                        $categories = get_categories($args);

                        foreach ($categories as $cat_key => $category) {
                            ?>
                            <div role="tabpanel" class="tab-pane fade in" id="<?php echo $category->name ?>">

                                <?php

                                $sales = get_terms(
                                    [
                                        'taxonomy' => 'sales',
                                    ]
                                );

                                $empty_flag = true;


                                $single_products = get_posts(array(
                                    'post_type' => 'product',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'term_id', // this can be 'term_id', 'slug' & 'name'
                                            'terms' => $category->term_id,
                                        )
                                    )
                                ));

                                if (count($single_products)) {
                                    $empty_flag = false;
                                }


                                foreach ($single_products as $product_key => $single_product) {
                                    $pa_color = get_the_terms($single_product->ID, 'pa_colour');
                                    $pa_size = wp_get_post_terms($single_product->ID, 'pa_size', [
                                        'orderby' => 'meta_value_num',
                                        'order' => 'ASC',
                                        'meta_query' => [[
                                            'key' => 'order_pa_size',
                                            'type' => 'NUMERIC',
                                        ]],
                                    ]);

                                    $brands = get_the_terms($single_product->ID, 'pwb-brand');

                                    if ($brands) {
                                        $brand_logo_id = get_term_meta($brands[0]->term_id, 'pwb_brand_image', true);
                                        $brand_logo = wp_get_attachment_image_src($brand_logo_id, 'full')[0];
                                    }


                                    ?>

                                    <div class="col-md-3 col-sm-6 col-xs-12"
                                         style="margin-bottom: 20px;">
                                        <div class="hovereffect">
                                            <figure>
                                                <a href="<?php echo get_site_url() ?>/product/<?php echo $single_product->post_name; ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url($single_product) ?>"
                                                         alt=""
                                                         class="img-responsive" style="height: auto; width:100%;">
                                                    <?php
                                                    if ($brands) {
                                                        ?>
                                                        <div class="brand-overlay"
                                                             style="background-image: url('<?php echo $brand_logo ?>');"
                                                             alt="">
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="overlay">
                                                        <div class="info">

                                                            <?php


                                                            if ($pa_color) {
                                                                ?>
                                                                <h4 class="colour">Color:
                                                                    <?php
                                                                    foreach ($pa_color as $color_item) {
                                                                        echo $color_item->name . ', ';
                                                                    }
                                                                    ?>
                                                                </h4>

                                                                <?php
                                                            }

                                                            if ($pa_size) {
                                                                foreach ($pa_size as $size_item) {
                                                                    echo '<h4 class="size">' . $size_item->name . '</h4>';
                                                                }
                                                            }
                                                            ?>

                                                            <p>
                                                                <span class="did-you-know">Did you know?&nbsp;</span><?php echo $single_product->post_excerpt; ?>
                                                                &nbsp;
                                                                <span
                                                                        class="learn-more-para">Learn more..</span>
                                                            </p>
                                                            <!--<a href="<?php echo do_shortcode(' [add_to_cart_url id="' . $single_product->ID . '"]') ?>"
                                                                class="btn btn-add-to-cart">Add to Cart</a>-->
                                                            <a href="<?php echo get_site_url() ?>/product/<?php echo $single_product->post_name; ?>"
                                                               class="btn btn-add-to-cart">View Product</a>
                                                        </div>
                                                    </div>
                                                    <div class="skewed">
                                                        <p><?php echo $single_product->post_title; ?></p>
                                                        <?php

                                                        $price = get_post_meta($single_product->ID, '_price', true);
                                                        $sale_price = get_post_meta($single_product->ID, '_sale_price', true);
                                                        $regular_price = get_post_meta($single_product->ID, '_regular_price', true);

                                                        $variations = get_posts([
                                                            'post_type' => 'product_variation',
                                                            'post_status' => array('private', 'publish'),
                                                            'numberposts' => -1,
                                                            'orderby' => 'menu_order',
                                                            'order' => 'asc',
                                                            'post_parent' => $single_product->ID
                                                        ]);

                                                        if ($variations) {
                                                            $sale_price = get_post_meta($variations[0]->ID, '_sale_price', true);
                                                            $regular_price = get_post_meta($variations[0]->ID, '_regular_price', true);
                                                        }

                                                        ?>
                                                        <p class="price"
                                                           id="price_<?php $single_product->ID; ?>"><span
                                                                    class="actual-price"> RRP:
                                                                <?php
                                                                if ($sale_price) {
                                                                    ?>
                                                                    <span class="price">
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <?php echo wc_price($regular_price) ?>
                                                                            </span>
                                                                        </del>
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <?php echo wc_price($sale_price) ?>
                                                                            </span>
                                                                        </ins>
                                                                    </span>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <?php echo wc_price($price) ?>
                                                                            </span>
                                                                        </ins>
                                                                    </span>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <!--                        | Retail: $350.00-->
                                                        </p>
                                                    </div>
                                                    <div class="discount-tag"
                                                         id="discount_<?php echo $cat_key . $product_key . $single_product->ID ?>"></div>
                                                </a>
                                            </figure>
                                        </div>

                                    </div>
                                <?php
                                if ($sale_price){
                                ?>
                                    <script type="text/javascript">
                                        var price = parseFloat('<?php echo $regular_price?>');
                                        var discounted_price = parseFloat('<?php echo $sale_price?>');
                                        var discount = price - discounted_price;
                                        var discount_percentage = parseInt((discount / price) * 100);
                                        document.getElementById('discount_<?php echo $cat_key . $product_key . $single_product->ID ?>').innerHTML = 'DISCOUNT: -' + discount_percentage + '%';

                                    </script>
                                    <?php
                                }
                                }


                                if ($empty_flag) {
                                    ?>
                                    <div class="col-xs-12 empty-products">Proucts Coming Soon</div>
                                    <?php
                                }

                                ?>
                                <script type="text/javascript">

                                    function heightCalc<?php echo $category->name?>() {
                                        var max_height = 0;
                                        var length = 1;
                                        var promise = new Promise(function (resolve, reject) {

                                            jQuery('#<?php echo $category->name?> .col-md-3.col-sm-6.col-xs-12 .hovereffect img').each(function () {
                                                if (max_height < jQuery(this).height()) {
                                                    max_height = jQuery(this).height();
                                                }
                                                if (jQuery('#<?php echo $category->name?> .col-md-3.col-sm-6.col-xs-12 .hovereffect img').length == length) {
                                                    resolve(max_height);
                                                }
                                                length++;
                                            });
                                        });

                                        promise.then(function (full_height) {
                                            jQuery('#<?php echo $category->name?> .col-md-3.col-sm-6.col-xs-12 .hovereffect img').each(function () {
                                                var height = jQuery(this).height();
                                                var padding = full_height - height;
                                                var half_padding_top = parseInt((padding / 2) + 50);
                                                var half_padding_bottom = padding - half_padding_top + 100;
                                                jQuery(this).css('padding-top', half_padding_top + 'px');
                                                jQuery(this).css('padding-bottom', half_padding_bottom - 0.0002 + 'px');
                                            });
                                        });
                                    }

                                    window.addEventListener('load', function () {

                                        heightCalc<?php echo $category->name?>();

                                        jQuery('a[href="#<?php echo $category->name?>"]').click(function () {
                                            setTimeout(function () {
                                                heightCalc<?php echo $category->name?>();
                                            }, 250);
                                        });

                                    });
                                </script>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
            </div>
        </div>
    </section>

    <section class="sponsor">
        <div class="container">
            <div class="row">
                <img src="<?php echo get_template_directory_uri(); ?>/img/sponsor-bar.png" class="img-responsive"
                     alt="">
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false"
         data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        <span>{{heading}}</span>
                    </h4>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="well well-sm"
                             style="border-radius: 0;border: 1px solid #ffff00; color: #000000;background: #FFFF00;">
                            {{subtitle}}
                        </div>
                        <div class="progress" style="border-radius: 0;background:transparent;height: 5px;">
                            <div class="progress-bar progress-bar-warning" role="progressbar" :aria-valuenow="progress"
                                 aria-valuemin="0" aria-valuemax="100"
                                 :style="'width: '+progress+'%;background:#ffff00;border-radius:0'">
                                <span class="sr-only">{{progress}}% Complete</span>
                            </div>
                        </div>
                        <div class="form-group" v-if="step==1">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" v-model="email">
                        </div>
                        <div class="form-group" v-if="step==2">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name"
                                   placeholder="First Name" v-model="first_name">
                        </div>
                        <div class="form-group" v-if="step==3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name"
                                   placeholder="Last Name" v-model="last_name">
                        </div>
                        <div class="form-group" v-if="step==4">
                            <label for="sport">Sport</label>
                            <select class="form-control" id="sport" v-model="sport" style="    border: 1px solid #ffff00;
            background: #000;
            color: #ffffff;
            border-radius: 0;">
                                <option value="">Select Sport</option>
                                <option value="Rowing">Rowing</option>
                                <option value="Cycling">Cycling</option>
                                <option value="Equestrian">Equestrian</option>
                                <option value="Golf">Golf</option>
                                <option value="Motocyclists">Motocyclists</option>
                                <option value="Mountains">Mountains</option>
                                <option value="Rugby">Rugby</option>
                                <option value="Running">Running</option>
                                <option value="Surfing">Surfing</option>
                                <option value="Triathlon">Triathlon</option>
                            </select>
                        </div>
                        <div class="form-group" v-if="step==5">
                            <div class="well well-sm"
                                 style="border-radius: 0;border: 1px solid #ffff00; color: #000000;background: #FFFF00;">
                                Thank you! Happy Shopping!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" @click.prevent="previous" v-if="step!=1&&step!=5"
                                :disabled="disable">
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary" @click.prevent="next" v-if="step!=4&&step!=5">
                            Next
                        </button>
                        <button type="button" class="btn btn-primary" @click.prevent="submit" v-if="step==4&&step!=5"
                                :disabled="disable">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener('load', function () {
            <?php
            if (!is_user_logged_in()) {
            ?>
            if (localStorage.getItem('login') == null || localStorage.getItem('login') != 'true') {
                jQuery('#popup').modal('show');
            }

            <?php
            }
            ?>

            jQuery('#popup').on('hidden.bs.modal', function (e) {
                localStorage.setItem('login', 'true');
            })
        });

        var data = {
            first_name: '',
            last_name: '',
            email: '',
            sport: '',
            heading: 'Be the first to find out about huge discounts!',
            subtitle: "Sign up to get great member discounts on your training gear",
            progress: 25,
            step: 1,
            disable: false
        };

        var popup = new Vue({
            data: data,
            el: '#popup',
            methods: {
                submit: function () {

                    this.disable = true;

                    var $this = this;

                    var password = Math.random().toString(36).slice(-5);

                    jQuery.post("<?php echo esc_url(site_url('sign-up', 'login_post')); ?>", {
                        user_login: $this.first_name,
                        user_email: $this.email,
                        pass1: password,
                        pass2: password,
                        first_name: $this.first_name,
                        last_name: $this.last_name,
                        sport: $this.sport,
                        login_post: true
                    }).done(function (response) {
                        // alert('Successful');
                        $this.step = 5;
                        localStorage.setItem('login', 'true');
                        setTimeout(function () {
                            window.location.reload();
                        }, 5000)
                    });
                },
                next: function () {
                    if (this.step == 4) {
                        this.step = 1;
                    } else {
                        this.step++;
                    }
                    this.progress = this.step * 25;
                    this.subtitle = this.getSubTitle(this.step);
                },
                previous: function () {
                    if (this.step != 1) {
                        this.step--;
                    }
                    this.progress = this.step * 25;
                    this.subtitle = this.getSubTitle(this.step);
                },
                getSubTitle: function (step) {
                    switch (step) {
                        case 1:
                            return "Sign up to get great member discounts on your training gear";
                        case 2:
                            return "Tell us more about you!";
                        case 3:
                            return "Tell us more about yourself!";
                        case 4:
                            return "Almost done!";
                        default:
                            break;
                    }
                }
            }
        });
    </script>

<?php get_footer(); ?>