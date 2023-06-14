<?php
//getting the navbar
get_header(); ?>

<?php //query to check the category and generate the header of the page

if (is_category()) {
  //get the current category or subcategory object
  $thisCategory = get_category($cat);

  //logic to create page header based on category/subcategory
  if ($thisCategory->category_parent === 0) {
    $pageHeader = $thisCategory->cat_name;
    $parentCategoryId = $thisCategory->cat_ID;
    $parentCategoryUrl = esc_url(get_category_link($parentCategoryId));
  } else {
    $subCategory = $thisCategory->cat_name;
    $parentCategoryObject = get_category($thisCategory->category_parent);
    $parentCategoryId = $parentCategoryObject->cat_ID;
    $parentCategoryName = $parentCategoryObject->cat_name;
    $parentCategoryUrl = esc_url(get_category_link($parentCategoryId));

    $pageHeader = $subCategory . " " . $parentCategoryName;
  }

  //getting the category/subcategory description
  $categoryDescription = $thisCategory->category_description;
} ?>

<?php
// category/subcategory hero section
?>
<section class="category-hero">
  <div class="hero__headings">
    <h1><?php echo $pageHeader; ?> b:logs</h1>
    <p><?php echo $categoryDescription; ?></p>
  </div>

  <ul class="hero__list">
    <a href="<?php echo $parentCategoryUrl; ?>">
      <li class="hero__list--item">All</li>
    </a>


    <?php
    //generate the subcategory items just beside the all tab in category or subcategory page
    //array of objects containing the list of subcategories having blogs greater than zero

    $categories = get_categories([
      "parent" => $parentCategoryId,
    ]);

    //looping the array to generate links with subcategories
    foreach ($categories as $category) {
      $subCategoryListItem = wp_sprintf(
        '<a href="%1$s">
          <li class="hero__list--item">%2$s</li>
        </a>',
        esc_url(get_category_link($category->cat_ID)),
        esc_html(ucwords($category->cat_name))
      );

      echo $subCategoryListItem;
    }
    ?>
  </ul>



  <div class="hero__cards">

    <?php
    //custom query for featured post (based on category/subcategory)
    $featuredPost = new WP_Query([
      "posts_per_page" => 1,
      "offset" => 2,
      "cat" => $thisCategory->cat_ID,
    ]);

    //looping the post received from custom query above
    while ($featuredPost->have_posts()) {

      $featuredPost->the_post();

      //getting the postId and pushing into array
      $featuredPostId = get_post()->ID;
      $filterPostIdsArray = [$featuredPostId];

      //get category and subcategory of the blog post in a array
      $theCategories = get_the_category();

      //getting the product related to the blog
      $relatedProducts = get_field("related_products");
      if ($relatedProducts) {
        $relatedProductId = $relatedProducts[0]->ID;
      }
      ?>

    <a href="<?php the_permalink(); ?>">
      <div class="hero__cards--featured">
        <div class="hero__cards--featured-img">

          <?php //pulling image url & alt attribute of a blog

      $pageBannerImage = get_field("blog_banner_image"); ?>
          <img src="<?php echo getImageUrlAlt(
          $pageBannerImage
        )[0]; ?>" alt="<?php echo getImageUrlAlt($pageBannerImage)[1]; ?>" />
        </div>

        <div class="hero__cards--featured-text">
          <span>featured</span>
        </div>


        <div class="hero__cards--featured__card">
          <div class="hero__cards--featured__card--detail">
            <div class="hero__cards--featured__card--detail-breadcrumbs">
              <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
              <span></span>
              <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
            </div>

            <div class="hero__cards--featured__card--detail-title">
              <p><?php the_title(); ?></p>
            </div>

            <div class="hero__cards--featured__card--detail-extra">
              <p><?php
            $postDate = get_the_date("j M Y");
            echo $postDate;
            ?></p>
              <span></span>
              <p><?php echo timeToRead(); ?></p>
            </div>
          </div>
        </div>




        <?php
    }
    ?>
      </div>
    </a>

    <?php
    //custom query for secondary featured post (based on category/subcategory)
    $secondaryFeatured = new WP_Query([
      "posts_per_page" => 1,
      "cat" => $thisCategory->cat_ID,
      "offset" => 3,
    ]);

    //looping the post received from custom query above
    while ($secondaryFeatured->have_posts()) {

      $secondaryFeatured->the_post();

      //getting the postId and pushing into array
      $secondaryFeaturedPostId = get_post()->ID;
      array_push($filterPostIdsArray, $secondaryFeaturedPostId);

      //get category and subcategory of the blog post in a array
      $theCategories = get_the_category();

      $secondaryRelatedProducts = get_field("related_products");

      if ($secondaryRelatedProducts) {
        $secondaryRelatedProductId = $secondaryRelatedProducts[0]->ID;
      }
      ?>

    <a href="<?php the_permalink(); ?>">
      <div class="hero__cards--secondary">
        <div class="hero__cards--secondary__card">
          <div class="hero__cards--secondary__card--img">

            <?php //pulling image url & alt attribute of a blog

      $pageBannerImage = get_field("blog_banner_image"); ?>

            <img src="<?php echo getImageUrlAlt(
              $pageBannerImage
            )[0]; ?>" alt="<?php echo getImageUrlAlt(
  $pageBannerImage
)[1]; ?>" />

          </div>

          <div class="hero__cards--secondary__card--detail">
            <div class="hero__cards--secondary__card--detail-breadcrumbs">
              <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
              <span></span>
              <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
            </div>

            <div class="hero__cards--secondary__card--detail-title">
              <p><?php the_title(); ?></p>
            </div>

            <div class="hero__cards--secondary__card--detail-extra">
              <p><?php
              $postDate = get_the_date("j M Y");
              echo $postDate;
              ?></p>
              <span></span>
              <p><?php echo timeToRead(); ?></p>
            </div>
          </div>
        </div>
      </div>
    </a>

    <?php
    }
    ?>
  </div>
</section>


<?php
// trending blogs section (based on category/subcategory)
?>
<section class="trending">
  <div class="trending__header">
    <p>trending <span>in</span> <?php echo $pageHeader; ?></p>
  </div>

  <div class="trending__content">
    <div class="left-arrow">
      <svg width="6" height="10" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.25 0.25L0.75 4.75L5.25 9.25L5.25 0.25Z"></path>
      </svg>
    </div>

    <div class="carousel">

      <?php
      //custom query to get  blogs for trending section
      $trendingBlogs = new WP_Query([
        "posts_per_page" => 7,
        "post__not_in" => $filterPostIdsArray,
        "meta_key" => "total_trending_score",
        "orderby" => "meta_value_num",
        "order" => "DESC",
        "cat" => $thisCategory->cat_ID,
      ]);

      //looping the post received from custom query above
      while ($trendingBlogs->have_posts()) {

        $trendingBlogs->the_post();

        //getting the postId and pushing into array
        $trendingBlogsIdValue = get_post()->ID;
        array_push($filterPostIdsArray, $trendingBlogsIdValue);

        //get category and subcategory of the blog post in a array
        $theCategories = get_the_category();
        ?>

      <?php
        //carousel cards below
        ?>
      <div class="carousel__card">
        <a href="<?php the_permalink(); ?>">
          <div class="carousel__card--img">

            <?php //pulling image url & alt attribute of a blog

        $pageBannerImage = get_field("blog_banner_image"); ?>

            <img src="<?php echo getImageUrlAlt(
            $pageBannerImage
          )[0]; ?>" alt="<?php echo getImageUrlAlt($pageBannerImage)[1]; ?>" />


          </div>
          <div class="carousel__card--info">
            <div class="carousel__card--info-breadcrumbs">
              <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
              <span></span>
              <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
            </div>

            <div class="carousel__card--info-header">
              <p><?php the_title(); ?></p>
            </div>

            <div class="carousel__card--info-extra">
              <p><?php
            $postDate = get_the_date("j M Y");
            echo $postDate;
            ?></p>
              <span></span>
              <p><?php echo timeToRead(); ?></p>
            </div>
          </div>
        </a>
      </div>

      <?php
      }
      ?>

      <div class="carousel__dots"></div>
    </div>

    <div class="right-arrow">
      <svg width="6" height="10" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.75 0.25L5.25 4.75L0.75 9.25L0.75 0.25Z"></path>
      </svg>
    </div>
  </div>
</section>



<?php
//more blogs section
?>
<section class="moreblogs">
  <div class="moreblogs__container">


    <?php
// popular reads section (inside more blogs)
?>
    <div class="popular-reads-details">
      <div class="popular-reads-subscriber">
        <div class="popular__reads">
          <div class="popular__reads--header">
            <p>popular reads</p>
          </div>


          <?php
          //query to retrieve the product related to the featured post of the particular page
          $featuredPostRelatedProduct = new WP_Query([
            "post_type" => "products",
            "post__in" => [$relatedProductId],
          ]);

          while ($featuredPostRelatedProduct->have_posts()) {
            $featuredPostRelatedProduct->the_post();

            $productKeyIngredients = get_field("key_ingredients");
            $productNaturalSource = get_field("natural_source");
            $productConcern = get_field("product_concern");
            $productImage = get_field("product_image");
            $productTitle = get_field("product_title");
            $productSubTitle = get_field("product_subtitle");
            $productUrl = get_field("product_url");
          }
          ?>

          <a href="<?php echo $productUrl; ?>" id="popularreads">
            <div class="popular__reads--product">
              <div class="popular__reads--product-img">
                <img src="<?php echo $productImage["url"]; ?>" />
              </div>

              <div class="popular__reads--product-info">
                <p class="popular__reads--product-ingredients">
                  <?php echo $productKeyIngredients; ?>
                </p>
                <p class="popular__reads--product-source">
                  <?php echo $productNaturalSource; ?>
                </p>
                <p class="popular__reads--product-title"><?php echo $productTitle; ?></p>
                <p class="popular__reads--product-subtitle">
                  <?php echo $productSubTitle; ?>
                </p>
                <p class="popular__reads--product-concerns">
                  <?php echo $productConcern; ?>
                </p>
              </div>
            </div>
          </a>

          <?php
          //custom query to get  blogs for popular blogs section
          $popularBlogs = new WP_Query([
            "posts_per_page" => 6,
            "post__not_in" => $filterPostIdsArray,
            "meta_key" => "total_popular_score",
            "orderby" => "meta_value_num",
            "order" => "DESC",
            "cat" => $thisCategory->cat_ID,
          ]);

          //looping the post received from custom query above
          while ($popularBlogs->have_posts()) {

            $popularBlogs->the_post();

            //getting the postId and pushing into array
            $popularBlogsIdValue = get_post()->ID;
            array_push($filterPostIdsArray, $popularBlogsIdValue);

            //get category and subcategory of the blog post in a array
            $theCategories = get_the_category();
            ?>

          <?php
            //popular reads sections card
            ?>
          <a href="<?php the_permalink(); ?>" id="popularreads">
            <div class="popular__reads--article">
              <div class="popular__reads--article-info">
                <div class="popular__reads--article-breadcrumbs">
                  <p><?php echo getCategoryAndSubcategory(
                    $theCategories
                  )[0]; ?></p>
                  <span></span>
                  <p><?php echo getCategoryAndSubcategory(
                    $theCategories
                  )[1]; ?></p>
                </div>

                <div class="popular__reads--article-header">
                  <p>
                    <?php the_title(); ?>
                  </p>
                </div>

                <div class="popular__reads--article-extra">
                  <p><?php
                  $postDate = get_the_date("j M Y");
                  echo $postDate;
                  ?></p>
                  <span></span>
                  <p><?php echo timeToRead(); ?></p>
                </div>
              </div>
            </div>
          </a>


          <?php
          }
          ?>

          <?php
          //query to retrieve the product related to the secondary featured post of the particular page
          $secondaryFeaturedPostRelatedProduct = new WP_Query([
            "post_type" => "products",
            "post__in" => [$secondaryRelatedProductId],
          ]);

          while ($secondaryFeaturedPostRelatedProduct->have_posts()) {
            $secondaryFeaturedPostRelatedProduct->the_post();

            $secondaryProductKeyIngredients = get_field("key_ingredients");
            $secondaryProductNaturalSource = get_field("natural_source");
            $secondaryProductConcern = get_field("product_concern");
            $secondaryProductImage = get_field("product_image");
            $secondaryProductTitle = get_field("product_title");
            $secondaryProductSubTitle = get_field("product_subtitle");
            $secondaryProductUrl = get_field("product_url");
          }
          ?>

          <a href="<?php echo $secondaryProductUrl; ?>" id="popularreads">
            <div class="popular__reads--bigproduct">
              <div class="popular__reads--bigproduct-img">
                <img src="<?php echo $secondaryProductImage["url"]; ?>" />
              </div>

              <div class="popular__reads--bigproduct-info">
                <p class="popular__reads--bigproduct-ingredients">
                  <?php echo $secondaryProductKeyIngredients; ?>
                </p>
                <p class="popular__reads--bigproduct-source">
                  <?php echo $secondaryProductNaturalSource; ?>
                </p>
                <p class="popular__reads--bigproduct-title"><?php echo $secondaryProductTitle; ?></p>
                <p class="popular__reads--bigproduct-subtitle">
                  <?php echo $secondaryProductSubTitle; ?>
                </p>
                <p class="popular__reads--bigproduct-concerns">
                  <?php echo $secondaryProductConcern; ?>
                </p>
              </div>
            </div>
          </a>

        </div>

        <?php
//subscriber box below
?>
        <div class="subscriber">
          <div class="subscriber__box">
            <div class="subscriber__box--envelope-top">
              <svg width="140" height="122" viewBox="0 0 140 122" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="absolute -top-5 -right-3">
                <path d="M0.701749 32.1131L88.896 56.4966L23.6822 120.683L0.701749 32.1131Z" fill="#EDA91F"
                  stroke="#003B1B"></path>
                <path d="M155.444 -8.03644L90.2304 56.1503L178.425 80.5338L155.444 -8.03644Z" fill="#EDA91F"
                  stroke="#003B1B"></path>
                <mask id="path-3-inside-1_5750_52300" fill="white">
                  <path
                    d="M62.7797 70.5252C76.1362 53.4395 99.2901 47.432 119.269 55.8686L178.369 80.8253L23.2685 121.068L62.7797 70.5252Z">
                  </path>
                </mask>
                <path
                  d="M62.7797 70.5252C76.1362 53.4395 99.2901 47.432 119.269 55.8686L178.369 80.8253L23.2685 121.068L62.7797 70.5252Z"
                  fill="#E48F4D"></path>
                <path
                  d="M178.369 80.8253L178.62 81.7933L181.476 81.0521L178.758 79.9041L178.369 80.8253ZM23.2685 121.068L22.4807 120.452L20.6632 122.777L23.5197 122.036L23.2685 121.068ZM62.7797 70.5252L63.5675 71.1411L62.7797 70.5252ZM118.88 56.7898L177.98 81.7466L178.758 79.9041L119.658 54.9473L118.88 56.7898ZM178.118 79.8574L23.0174 120.1L23.5197 122.036L178.62 81.7933L178.118 79.8574ZM24.0564 121.684L63.5675 71.1411L61.9918 69.9093L22.4807 120.452L24.0564 121.684ZM119.658 54.9473C99.2629 46.335 75.6267 52.4677 61.9918 69.9093L63.5675 71.1411C76.6458 54.4113 99.3173 48.529 118.88 56.7898L119.658 54.9473Z"
                  fill="#003B1B" mask="url(#path-3-inside-1_5750_52300)"></path>
                <path
                  d="M106.861 67.9251L154.018 -8.04387L1.33653 31.5709L79.4803 75.0294C89.0408 80.3463 101.092 77.2196 106.861 67.9251Z"
                  fill="#F9CF7C" stroke="#003B1B"></path>
              </svg>
            </div>

            <div class="subscriber__box--header">
              <p>we make your mailbox beautiful too</p>
            </div>

            <!-- <div class="subscriber__box--input">
              <input type="email" class="subscriber-input-1" placeholder="Email Address" />
            </div>

            <button class="subscriber__box--button">subscribe</button> -->

            <?php echo do_shortcode('[wpforms id="443"]'); ?>

            <div class="subscriber__box--envelope-bottom">
              <svg width="166" height="143" viewBox="0 0 166 143" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="absolute -bottom-6 -left-1">
                <path d="M16.8355 1.46183L73.2132 73.5336L-17.3916 86.3222L16.8355 1.46183Z" fill="#EDA91F"
                  stroke="#003B1B"></path>
                <path d="M165.097 61.2609L74.4918 74.0495L130.87 146.121L165.097 61.2609Z" fill="#EDA91F"
                  stroke="#003B1B"></path>
                <mask id="path-3-inside-1_5750_52306" fill="white">
                  <path
                    d="M43.876 69.2702C64.7768 63.4846 86.9608 72.4322 97.9989 91.0998L130.651 146.322L-17.9525 86.3849L43.876 69.2702Z">
                  </path>
                </mask>
                <path
                  d="M43.876 69.2702C64.7768 63.4846 86.9608 72.4322 97.9989 91.0998L130.651 146.322L-17.9525 86.3849L43.876 69.2702Z"
                  fill="#E48F4D"></path>
                <path
                  d="M130.651 146.322L130.277 147.249L133.014 148.353L131.512 145.813L130.651 146.322ZM-17.9525 86.3849L-18.2192 85.4212L-21.0634 86.2085L-18.3265 87.3123L-17.9525 86.3849ZM43.876 69.2702L44.1428 70.2339L43.876 69.2702ZM97.1381 91.6088L129.79 146.831L131.512 145.813L98.8596 90.5909L97.1381 91.6088ZM131.025 145.395L-17.5784 85.4575L-18.3265 87.3123L130.277 147.249L131.025 145.395ZM-17.6857 87.3487L44.1428 70.2339L43.6092 68.3064L-18.2192 85.4212L-17.6857 87.3487ZM98.8596 90.5909C87.5917 71.5343 64.9455 62.4003 43.6092 68.3064L44.1428 70.2339C64.6082 64.5689 86.33 73.3301 97.1381 91.6088L98.8596 90.5909Z"
                  fill="#003B1B" mask="url(#path-3-inside-1_5750_52306)"></path>
                <path
                  d="M80.8526 93.4084L163.955 60.4065L17.6682 1.40403L54.6186 82.8273C59.1393 92.789 70.6854 97.446 80.8526 93.4084Z"
                  fill="#F9CF7C" stroke="#003B1B"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="moreblogs__container--header">
      <p>more <span>from</span> <?php echo $pageHeader; ?></p>
    </div>

    <?php
//more blogs cards
?>

    <div class="moreblogs__container--cards">

      <?php
      //custom query to fetch blogs for more blogs section
      $moreBlogs = new WP_Query([
        "paged" => get_query_var("paged", 1),
        "posts_per_page" => 10,
        "post__not_in" => $filterPostIdsArray,
        "cat" => $thisCategory->cat_ID,
      ]);

      while ($moreBlogs->have_posts()) {

        $moreBlogs->the_post();

        //get category and subcategory of the blog post in a array
        $theCategories = get_the_category();

        //pulling image url & alt attribute of a blog
        $pageBannerImage = get_field("blog_banner_image");
        ?>

      <a href="<?php the_permalink(); ?>">
        <div class="moreblogs__container--card">
          <div class="moreblogs__container--card-img">
            <img src="<?php echo getImageUrlAlt(
              $pageBannerImage
            )[0]; ?>" alt="<?php echo getImageUrlAlt(
  $pageBannerImage
)[1]; ?>" />
          </div>

          <div class="moreblogs__container--card-details">
            <div class="moreblogs__container--card-details--breadcrumbs">
              <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
              <span></span>
              <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
            </div>

            <div class="moreblogs__container--card-details--title">
              <p><?php the_title(); ?></p>
            </div>

            <div class="moreblogs__container--card-details--para">
              <p>
                <?php echo blogShortDescription(); ?>
              </p>
            </div>

            <div class="moreblogs__container--card-details--extra">
              <p><?php
              $postDate = get_the_date("j M Y");
              echo $postDate;
              ?></p>
              <span></span>
              <p><?php echo timeToRead(); ?></p>
            </div>
          </div>
        </div>
      </a>

      <?php
      }
      $paginatedArrayItems = paginate_links([
        "total" => $moreBlogs->max_num_pages,
        "prev_text" =>
          '<svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.30019 0.101563L0.700195 3.70156L4.30019 7.30156L4.30019 0.101563Z" fill="#ffffff"/></svg>',
        "next_text" =>
          '<svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.700195 0.101562L4.30019 3.70156L0.700195 7.30156L0.700195 0.101562Z" fill="#ffffff"/></svg>',
        "type" => "array",
      ]);
      ?>

      <div class="moreblogs__container--cards-pagination">

        <?php foreach ($paginatedArrayItems as $paginatedArrayItem) {
          //rendering the previous button
          if (str_contains($paginatedArrayItem, "prev")) {
            echo $paginatedArrayItem;
          }

          //rendering only the numbers
          if (
            !str_contains($paginatedArrayItem, "prev") &&
            !str_contains($paginatedArrayItem, "next")
          ) {
            echo $paginatedArrayItem;
          }

          //rendering only the next button
          if (str_contains($paginatedArrayItem, "next")) {
            echo $paginatedArrayItem;
          }
        } ?>

      </div>

    </div>
  </div>
</section>





<?php //function call for footer section

get_footer();
?>