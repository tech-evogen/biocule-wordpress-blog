<?php
//getting the navbar
get_header(); ?>

<?php
// hero section blog homepage
?>
<section class="homepagehero">

  <?php
  //custom query for featured post (most recent post in whole database)

  $featuredPost = new WP_Query([
    "posts_per_page" => 1,
  ]);

  //looping the post received from custom query above
  while ($featuredPost->have_posts()) {

    $featuredPost->the_post();

    //get category and subcategory of the blog post in a array
    $theCategories = get_the_category();
    $featuredPostId = get_post()->ID;

    //array contains/will contain the list blog ids to be filtered in the subsequent sections
    $filterBlogIdsArray = [$featuredPostId];

    //getting the product related to the blog
    $relatedProducts = get_field("related_products");
    if ($relatedProducts) {
      $relatedProductId = $relatedProducts[0]->ID;
    }
    ?>

  <a href="<?php the_permalink(); ?>">
    <div class="featured">
      <div class="featured__img">

        <?php //pulling image url & alt attribute of a blog

    $pageBannerImage = get_field("blog_banner_image"); ?>

        <img src="<?php echo getImageUrlAlt(
          $pageBannerImage
        )[0]; ?>" alt="<?php echo getImageUrlAlt($pageBannerImage)[1]; ?>" />

      </div>

      <div class="featured__text">
        <span>featured</span>
      </div>

      <?php
    //card that will appear above the image in the featured section
    ?>
      <div class="featured__card">
        <div class="featured__card--detail">
          <div class="featured__card--detail-breadcrumbs">
            <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
            <span></span>
            <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
          </div>

          <div class="featured__card--detail-title">
            <p><?php the_title(); ?></p>
          </div>

          <div class="featured__card--detail-extra">
            <p><?php
            $postDate = get_the_date("j M Y");
            echo $postDate;
            ?></p>
            <span></span>
            <p><?php
            $timeToRead = get_field("blog_time_to_read");
            echo $timeToRead;
            ?></p>
          </div>
        </div>
      </div>
    </div>
  </a>

  <?php
  }
  ?>


  <?php
//secondary featured & social icons card
?>
  <div class="secondaryfeatured">
    <?php
    //custom query to fetch the 2nd most recent post among all the categories
    $secondaryFeatured = new WP_Query([
      "posts_per_page" => 1,
      "offset" => 1,
    ]);

    //looping the post received from custom query above
    while ($secondaryFeatured->have_posts()) {

      //getting the postId and pushing into array
      $secondaryFeatured->the_post();
      $secondaryFeaturedBlogId = get_post()->ID;

      array_push($filterBlogIdsArray, $secondaryFeaturedBlogId);

      //get category and subcategory of the blog post in a array
      $theCategories = get_the_category();

      $secondaryRelatedProducts = get_field("related_products");

      if ($secondaryRelatedProducts) {
        $secondaryRelatedProductId = $secondaryRelatedProducts[0]->ID;
      }
      ?>

    <a href="<?php the_permalink(); ?>" class="secondaryfeatured__link">

      <?php
      //card that will appear in the secondary featured
      ?>
      <div class="secondaryfeatured__card">
        <div class="secondaryfeatured__card--img">

          <?php //pulling image url & alt attribute of a blog

      $pageBannerImage = get_field("blog_banner_image"); ?>

          <img src="<?php echo getImageUrlAlt(
            $pageBannerImage
          )[0]; ?>" alt="<?php echo getImageUrlAlt($pageBannerImage)[1]; ?>" />

        </div>

        <div class="secondaryfeatured__card--detail">
          <div class="secondaryfeatured__card--detail-breadcrumbs">
            <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
            <span></span>
            <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
          </div>

          <div class="secondaryfeatured__card--detail-title">
            <p><?php the_title(); ?></p>
          </div>

          <div class="secondaryfeatured__card--detail-extra">
            <p><?php
            $postDate = get_the_date("j M Y");
            echo $postDate;
            ?></p>
            <span></span>
            <p><?php
            $timeToRead = get_field("blog_time_to_read");
            echo $timeToRead;
            ?></p>
          </div>
        </div>
      </div>
    </a>

    <?php
    }
    ?>


    <div class="secondaryfeatured__share">
      <div class="secondaryfeatured__share--header">
        <p>Keep In Touch</p>
      </div>

      <div class="secondaryfeatured__share--icons">

        <?php
        global $wp;
        $current_url = home_url(add_query_arg([], $wp->request));
        ?>

        <div class="secondaryfeatured__share--icons-instagram">
          <a href="https://www.instagram.com/create/batch/?post=<?php echo $current_url; ?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24">
              <path
                d="M17.34,5.46h0a1.2,1.2,0,1,0,1.2,1.2A1.2,1.2,0,0,0,17.34,5.46Zm4.6,2.42a7.59,7.59,0,0,0-.46-2.43,4.94,4.94,0,0,0-1.16-1.77,4.7,4.7,0,0,0-1.77-1.15,7.3,7.3,0,0,0-2.43-.47C15.06,2,14.72,2,12,2s-3.06,0-4.12.06a7.3,7.3,0,0,0-2.43.47A4.78,4.78,0,0,0,3.68,3.68,4.7,4.7,0,0,0,2.53,5.45a7.3,7.3,0,0,0-.47,2.43C2,8.94,2,9.28,2,12s0,3.06.06,4.12a7.3,7.3,0,0,0,.47,2.43,4.7,4.7,0,0,0,1.15,1.77,4.78,4.78,0,0,0,1.77,1.15,7.3,7.3,0,0,0,2.43.47C8.94,22,9.28,22,12,22s3.06,0,4.12-.06a7.3,7.3,0,0,0,2.43-.47,4.7,4.7,0,0,0,1.77-1.15,4.85,4.85,0,0,0,1.16-1.77,7.59,7.59,0,0,0,.46-2.43c0-1.06.06-1.4.06-4.12S22,8.94,21.94,7.88ZM20.14,16a5.61,5.61,0,0,1-.34,1.86,3.06,3.06,0,0,1-.75,1.15,3.19,3.19,0,0,1-1.15.75,5.61,5.61,0,0,1-1.86.34c-1,.05-1.37.06-4,.06s-3,0-4-.06A5.73,5.73,0,0,1,6.1,19.8,3.27,3.27,0,0,1,5,19.05a3,3,0,0,1-.74-1.15A5.54,5.54,0,0,1,3.86,16c0-1-.06-1.37-.06-4s0-3,.06-4A5.54,5.54,0,0,1,4.21,6.1,3,3,0,0,1,5,5,3.14,3.14,0,0,1,6.1,4.2,5.73,5.73,0,0,1,8,3.86c1,0,1.37-.06,4-.06s3,0,4,.06a5.61,5.61,0,0,1,1.86.34A3.06,3.06,0,0,1,19.05,5,3.06,3.06,0,0,1,19.8,6.1,5.61,5.61,0,0,1,20.14,8c.05,1,.06,1.37.06,4S20.19,15,20.14,16ZM12,6.87A5.13,5.13,0,1,0,17.14,12,5.12,5.12,0,0,0,12,6.87Zm0,8.46A3.33,3.33,0,1,1,15.33,12,3.33,3.33,0,0,1,12,15.33Z">
              </path>
            </svg>
          </a>
        </div>

        <div class="secondaryfeatured__share--icons-facebook">
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24">
              <path
                d="M15.12,5.32H17V2.14A26.11,26.11,0,0,0,14.26,2C11.54,2,9.68,3.66,9.68,6.7V9.32H6.61v3.56H9.68V22h3.68V12.88h3.06l.46-3.56H13.36V7.05C13.36,6,13.64,5.32,15.12,5.32Z">
              </path>
            </svg>
          </a>
        </div>

        <div class="secondaryfeatured__share--icons-youtube">
          <a href="https://api.whatsapp.com/send?text=<?php echo $current_url; ?>" target="_blank">
            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M15.2411 12.5835C14.9817 12.4533 13.7025 11.8231 13.4641 11.737C13.2257 11.6498 13.0524 11.6068 12.8791 11.8672C12.7058 12.1266 12.207 12.7137 12.0547 12.887C11.9034 13.0603 11.7511 13.0813 11.4917 12.9511C10.7251 12.6459 10.0175 12.2095 9.40071 11.6614C8.83181 11.1355 8.34409 10.5282 7.95348 9.85918C7.80224 9.59872 7.93772 9.45798 8.06795 9.3288C8.18453 9.21223 8.32841 9.02528 8.45759 8.873C8.56458 8.74153 8.65229 8.59548 8.71805 8.43925C8.75266 8.36746 8.76877 8.28815 8.76492 8.20854C8.76106 8.12894 8.73737 8.05156 8.696 7.98344C8.63088 7.85321 8.11101 6.57297 7.89466 6.05205C7.68356 5.54583 7.46932 5.6141 7.30863 5.6057C7.15739 5.59835 6.9841 5.59625 6.81081 5.59625C6.67899 5.59992 6.54936 5.63084 6.43007 5.68705C6.31077 5.74326 6.20441 5.82355 6.11765 5.92287C5.82361 6.20133 5.59079 6.53798 5.43402 6.91137C5.27725 7.28476 5.19997 7.68671 5.2071 8.09162C5.29143 9.07279 5.66046 10.008 6.26889 10.7823C7.38416 12.4544 8.91511 13.8076 10.7114 14.7092C11.196 14.9173 11.6909 15.1003 12.1943 15.2574C12.7251 15.4185 13.2861 15.4534 13.8327 15.3593C14.1947 15.2859 14.5376 15.1383 14.8397 14.9257C15.1418 14.7131 15.3964 14.4402 15.5877 14.1242C15.7583 13.7356 15.8109 13.3053 15.7389 12.887C15.6748 12.7778 15.5016 12.7137 15.2411 12.5835ZM17.8583 3.04836C16.0728 1.26332 13.6995 0.187933 11.1802 0.0224106C8.66094 -0.143112 6.16733 0.612508 4.16366 2.14859C2.15999 3.68468 0.782806 5.89655 0.288495 8.37242C-0.205816 10.8483 0.216436 13.4194 1.47664 15.6071L0 21.0001L5.51797 19.5539C7.04413 20.385 8.75416 20.8204 10.4919 20.8205H10.4961C12.5547 20.8195 14.5668 20.2083 16.2781 19.0642C17.9895 17.9201 19.3234 16.2945 20.1112 14.3926C20.8991 12.4908 21.1055 10.3981 20.7045 8.37895C20.3035 6.35981 19.3131 4.50482 17.8583 3.04835V3.04836ZM15.093 17.7402C13.7152 18.6038 12.1222 19.062 10.4961 19.0624H10.4919C8.9427 19.0623 7.42204 18.6455 6.0893 17.8557L5.77318 17.6688L2.49852 18.5279L3.37232 15.3351L3.16753 15.0074C2.25859 13.5579 1.79988 11.8715 1.84941 10.1613C1.89893 8.45108 2.45447 6.79398 3.44576 5.39951C4.43705 4.00503 5.81958 2.93582 7.41853 2.32707C9.01748 1.71832 10.761 1.59737 12.4287 1.97953C14.0964 2.36168 15.6133 3.22976 16.7877 4.47401C17.962 5.71826 18.741 7.28279 19.0262 8.96976C19.3114 10.6567 19.0899 12.3904 18.3898 13.9515C17.6897 15.5126 16.5424 16.8311 15.093 17.7402Z" />
            </svg>
          </a>
        </div>

        <div class="secondaryfeatured__share--icons-pinterest">
          <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>" target="_blank">
            <svg width="32px" height="32px" viewBox="0 0 20 25" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M10.326 0.296875C3.74816 0.296875 0.25 4.51206 0.25 9.10827C0.25 11.2399 1.44105 13.898 3.34764 14.741C3.63715 14.8715 3.79466 14.816 3.85916 14.5475C3.91617 14.3435 4.16668 13.361 4.28818 12.8974C4.32568 12.7489 4.30618 12.6199 4.18618 12.4804C3.55315 11.7484 3.05063 10.4148 3.05063 9.16377C3.05063 5.95813 5.59924 2.84549 9.93594 2.84549C13.6861 2.84549 16.3097 5.2816 16.3097 8.76626C16.3097 12.7039 14.2261 15.4281 11.5185 15.4281C10.0199 15.4281 8.90389 14.252 9.25791 12.7969C9.68542 11.0644 10.524 9.20128 10.524 7.95172C10.524 6.83117 9.89093 5.90413 8.59788 5.90413C7.07231 5.90413 5.83475 7.4147 5.83475 9.44279C5.83475 10.7313 6.29077 11.6014 6.2907711.6014C6.29077 11.6014 4.7817 17.6977 4.50119 18.8362C4.02717 20.7638 4.56569 23.8854 4.6122 24.1539C4.6407 24.3025 4.8072 24.349 4.90021 24.2275C5.04872 24.0324 6.8728 21.4298 7.38432 19.5487C7.57033 18.8632 8.33386 16.0836 8.33386 16.0836C8.83639 16.9911 10.287 17.7517 11.832 17.7517C16.4282 17.7517 19.7494 13.712 19.7494 8.69875C19.7329 3.89254 15.6197 0.296875 10.326 0.296875Z">
              </path>
            </svg>
          </a>
        </div>

        <div class="secondaryfeatured__share--icons-twitter">
          <a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24">
              <path
                d="M22,5.8a8.49,8.49,0,0,1-2.36.64,4.13,4.13,0,0,0,1.81-2.27,8.21,8.21,0,0,1-2.61,1,4.1,4.1,0,0,0-7,3.74A11.64,11.64,0,0,1,3.39,4.62a4.16,4.16,0,0,0-.55,2.07A4.09,4.09,0,0,0,4.66,10.1,4.05,4.05,0,0,1,2.8,9.59v.05a4.1,4.1,0,0,0,3.3,4A3.93,3.93,0,0,1,5,13.81a4.9,4.9,0,0,1-.77-.07,4.11,4.11,0,0,0,3.83,2.84A8.22,8.22,0,0,1,3,18.34a7.93,7.93,0,0,1-1-.06,11.57,11.57,0,0,0,6.29,1.85A11.59,11.59,0,0,0,20,8.45c0-.17,0-.35,0-.53A8.43,8.43,0,0,0,22,5.8Z">
              </path>
            </svg>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>



<?php
// trending blogs section
?>
<section class="trending">
  <div class="trending__header">
    <p>trending <span>in</span> b:logs</p>
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
        "post__not_in" => $filterBlogIdsArray,
        "meta_key" => "total_trending_score",
        "orderby" => "meta_value_num",
        "order" => "DESC",
      ]);

      //looping the post received from custom query above
      while ($trendingBlogs->have_posts()) {

        $trendingBlogs->the_post();

        //getting the postId and pushing into array
        $trendingBlogsIdValue = get_post()->ID;
        array_push($filterBlogIdsArray, $trendingBlogsIdValue);

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
            )[0]; ?>" alt="<?php echo getImageUrlAlt(
  $pageBannerImage
)[1]; ?>" />


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
            "post__not_in" => $filterBlogIdsArray,
            "meta_key" => "total_popular_score",
            "orderby" => "meta_value_num",
            "order" => "DESC",
          ]);

          //looping the post received from custom query above
          while ($popularBlogs->have_posts()) {

            $popularBlogs->the_post();

            //getting the postId and pushing into array
            $popularBlogsIdValue = get_post()->ID;
            array_push($filterBlogIdsArray, $popularBlogsIdValue);

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
      <p>more <span>from</span> b:logs</p>
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
        "post__not_in" => $filterBlogIdsArray,
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


<!-- <section class="gotquestions">
  <div class="gotquestions__items">
    <div class="gotquestions__items--text">
      <h2>got questions?</h2>
      <p>
        If you want any more advice, we are here to help. Chat with us and
        we will help you uncover the best solution to your beauty goals.
      </p>
    </div>

    <button class="gotquestions__items--button">chat with us</button>
  </div>
</section> -->


<?php //function call for footer section

get_footer();
?>
