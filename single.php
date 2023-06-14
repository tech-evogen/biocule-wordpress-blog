<?php
//getting the navbar
get_header(); ?>

<?php
//resuable functions import statements below

require get_template_directory() . "/lib/heroListItem1.php";
require get_template_directory() . "/lib/heroListItem2.php";
?>

<?php
// below code is for scrolled navigation bar
?>
<nav class="scroll-menu hidden">
  <div class="scroll__bar">
    <div class="scroll__bar--content">
      <div class="scroll__bar--content-header">
        <div class="scroll__bar--content-header--icon">
          <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.60156 9.60156L12.0016 15.0016L17.4016 9.60156H6.60156Z"></path>
          </svg>
        </div>
        <p class="scroll__bar--content-header-count">
          <span class="scroll__bar--content-header-count-index">1</span>
          <span>/</span>
          <span class="scroll__bar--content-header-count-listcount"></span>
        </p>
        <p class="scroll__bar--content-header-title">Introduction</p>
      </div>

      <p class="scroll__bar--content-time"></p>

      <ol class="scroll__bar--content-list hidden">
      </ol>
    </div>

    <div class="scroll__bar--shareicons">
      <p>Share</p>
      <div class="hero__card--shareicons-whatsapp">
        <a href="https://api.whatsapp.com/send?text=<?php echo the_permalink(); ?>" target="_blank">
          <svg width="21" height="21" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M15.2411 12.5835C14.9817 12.4533 13.7025 11.8231 13.4641 11.737C13.2257 11.6498 13.0524 11.6068 12.8791 11.8672C12.7058 12.1266 12.207 12.7137 12.0547 12.887C11.9034 13.0603 11.7511 13.0813 11.4917 12.9511C10.7251 12.6459 10.0175 12.2095 9.40071 11.6614C8.83181 11.1355 8.34409 10.5282 7.95348 9.85918C7.80224 9.59872 7.93772 9.45798 8.06795 9.3288C8.18453 9.21223 8.32841 9.02528 8.45759 8.873C8.56458 8.74153 8.65229 8.59548 8.71805 8.43925C8.75266 8.36746 8.76877 8.28815 8.76492 8.20854C8.76106 8.12894 8.73737 8.05156 8.696 7.98344C8.63088 7.85321 8.11101 6.57297 7.89466 6.05205C7.68356 5.54583 7.46932 5.6141 7.30863 5.6057C7.15739 5.59835 6.9841 5.59625 6.81081 5.59625C6.67899 5.59992 6.54936 5.63084 6.43007 5.68705C6.31077 5.74326 6.20441 5.82355 6.11765 5.92287C5.82361 6.20133 5.59079 6.53798 5.43402 6.91137C5.27725 7.28476 5.19997 7.68671 5.2071 8.09162C5.29143 9.07279 5.66046 10.008 6.26889 10.7823C7.38416 12.4544 8.91511 13.8076 10.7114 14.7092C11.196 14.9173 11.6909 15.1003 12.1943 15.2574C12.7251 15.4185 13.2861 15.4534 13.8327 15.3593C14.1947 15.2859 14.5376 15.1383 14.8397 14.9257C15.1418 14.7131 15.3964 14.4402 15.5877 14.1242C15.7583 13.7356 15.8109 13.3053 15.7389 12.887C15.6748 12.7778 15.5016 12.7137 15.2411 12.5835ZM17.8583 3.04836C16.0728 1.26332 13.6995 0.187933 11.1802 0.0224106C8.66094 -0.143112 6.16733 0.612508 4.16366 2.14859C2.15999 3.68468 0.782806 5.89655 0.288495 8.37242C-0.205816 10.8483 0.216436 13.4194 1.47664 15.6071L0 21.0001L5.51797 19.5539C7.04413 20.385 8.75416 20.8204 10.4919 20.8205H10.4961C12.5547 20.8195 14.5668 20.2083 16.2781 19.0642C17.9895 17.9201 19.3234 16.2945 20.1112 14.3926C20.8991 12.4908 21.1055 10.3981 20.7045 8.37895C20.3035 6.35981 19.3131 4.50482 17.8583 3.04835V3.04836ZM15.093 17.7402C13.7152 18.6038 12.1222 19.062 10.4961 19.0624H10.4919C8.9427 19.0623 7.42204 18.6455 6.0893 17.8557L5.77318 17.6688L2.49852 18.5279L3.37232 15.3351L3.16753 15.0074C2.25859 13.5579 1.79988 11.8715 1.84941 10.1613C1.89893 8.45108 2.45447 6.79398 3.44576 5.39951C4.43705 4.00503 5.81958 2.93582 7.41853 2.32707C9.01748 1.71832 10.761 1.59737 12.4287 1.97953C14.0964 2.36168 15.6133 3.22976 16.7877 4.47401C17.962 5.71826 18.741 7.28279 19.0262 8.96976C19.3114 10.6567 19.0899 12.3904 18.3898 13.9515C17.6897 15.5126 16.5424 16.8311 15.093 17.7402Z" />
          </svg>
        </a>
      </div>

      <div class="hero__card--shareicons-facebook">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank">
          <svg width="11" height="20" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M9.11986 3.32003H10.9999V0.14003C10.0896 0.045377 9.17502 -0.00135428 8.25986 2.98641e-05C5.53986 2.98641e-05 3.67986 1.66003 3.67986 4.70003V7.32003H0.609863V10.88H3.67986V20H7.35986V10.88H10.4199L10.8799 7.32003H7.35986V5.05003C7.35986 4.00003 7.63986 3.32003 9.11986 3.32003Z" />
          </svg>
        </a>
      </div>

      <div class="hero__card--shareicons-twitter">
        <a href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>" target="_blank">
          <svg width="20" height="18" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M20 2.79826C19.2483 3.12435 18.4534 3.33992 17.64 3.43826C18.4982 2.92558 19.1413 2.11904 19.45 1.16826C18.6436 1.64832 17.7608 1.98655 16.84 2.16826C16.2245 1.50083 15.405 1.05655 14.5098 0.905108C13.6147 0.753663 12.6945 0.903615 11.8938 1.33145C11.093 1.75928 10.4569 2.44079 10.0852 3.26909C9.71355 4.0974 9.62729 5.02565 9.84 5.90826C8.20943 5.82578 6.61444 5.40121 5.15865 4.66212C3.70287 3.92303 2.41885 2.88595 1.39 1.61826C1.02914 2.24842 0.839519 2.96208 0.84 3.68826C0.83872 4.36264 1.00422 5.02687 1.32176 5.62182C1.63929 6.21677 2.09902 6.72397 2.66 7.09826C2.00798 7.08052 1.36989 6.90556 0.8 6.58826V6.63826C0.804887 7.58315 1.13599 8.49735 1.73731 9.22622C2.33864 9.9551 3.17326 10.4539 4.1 10.6383C3.74326 10.7468 3.37287 10.8041 3 10.8083C2.74189 10.8052 2.48442 10.7818 2.23 10.7383C2.49391 11.5511 3.00462 12.2614 3.69107 12.7704C4.37753 13.2794 5.20558 13.5618 6.06 13.5783C4.6172 14.7135 2.83588 15.3331 1 15.3383C0.665735 15.3394 0.331736 15.3193 0 15.2783C1.87443 16.4885 4.05881 17.131 6.29 17.1283C7.82969 17.1442 9.35714 16.8533 10.7831 16.2723C12.2091 15.6914 13.505 14.8321 14.5952 13.7448C15.6854 12.6574 16.548 11.3636 17.1326 9.93916C17.7172 8.51468 18.012 6.98798 18 5.44826C18 5.27826 18 5.09826 18 4.91826C18.7847 4.33307 19.4615 3.61568 20 2.79826Z" />
          </svg>
        </a>
      </div>

      <div class="hero__card--shareicons-pinterest">
        <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>" target="_blank">
          <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M9.99922 0C4.4767 0 0 4.4767 0 9.99922C0 14.2301 2.6317 17.8389 6.34356 19.2999C6.32717 18.9581 6.32951 17.1888 7.56107 11.9059C7.72575 10.1436 7.49707 9.51846 7.49707 8.78639C7.49707 7.1248 8.36026 6.77437 8.86444 6.77437C9.58324 6.77437 10.576 7.04909 10.576 8.20729C10.576 9.53407 9.49426 9.88293 9.49426 9.88293C9.49426 9.88293 9.41622 10.2224 9.32647 11.1652C9.23671 12.1096 9.61446 13.132 11.1551 13.132C13.6252 13.132 14.0061 9.70343 14.0061 8.75985C14.0061 7.45649 13.0508 4.81074 10.0851 4.81074C6.12971 4.81074 5.44915 8.35402 5.44915 9.29915C5.44915 9.70343 5.56076 10.4168 5.63724 10.7219C6.38414 10.8429 6.30688 11.8653 5.98767 12.1556C5.63256 12.4748 3.80785 12.8549 3.80785 8.84961C3.80785 5.03551 7.20752 3.07032 10.1912 3.07032C13.0313 3.07032 16.125 5.03005 16.125 8.80512C16.125 12.1751 13.7025 14.8287 11.1582 14.8287C9.63006 14.8287 8.81995 13.5698 8.81995 13.5698C8.81995 14.7483 6.65574 18.7981 6.37868 19.3124C7.50254 19.7503 8.72083 19.9992 10 19.9992C15.5225 19.9992 20 15.5225 20 9.99922C20 4.47592 15.5217 0 9.99922 0Z" />
          </svg>
        </a>
      </div>
    </div>
  </div>
  <div class="scroll__withoutprogress"></div>
  <div class="scroll__progress"></div>
</nav>



<?php
// above code is for scrolled navigation bar
?>

<?php //default query loop by wordpress start here

while (have_posts()) {

  the_post();

  $theCategories = get_the_category();
  $currentBlogId = get_post()->ID;
  $pageBannerImage = get_field("blog_banner_image");

  $filterPostIdsArray = [$currentBlogId];

  foreach ($theCategories as $theCategory) {
    if ($theCategory->category_parent !== 0) {
      $subCategoryId = $theCategory->cat_ID;
    } else {
      $categoryId = $theCategory->cat_ID;
    }
  }

  //calling below function to calculate post view count and update in DB
  setPostViews($currentBlogId);
  ?>

<section class="reading--hero" style="background-image: url(<?php echo getImageUrlAlt(
  $pageBannerImage
)[0]; ?>)">
  <div class="hero__card">
    <div class="hero__card--breadcrumbs">
      <div class="hero__card--breadcrumbs-elements">
        <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
        <span></span>
        <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
      </div>

      <!-- the share icon is commented as the icons are already present in the card (i.e can be used later)
        
      <div class="hero__card--breadcrumbs-shareicon">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24">
          <path
            d="M18,14a4,4,0,0,0-3.08,1.48l-5.1-2.35a3.64,3.64,0,0,0,0-2.26l5.1-2.35A4,4,0,1,0,14,6a4.17,4.17,0,0,0,.07.71L8.79,9.14a4,4,0,1,0,0,5.72l5.28,2.43A4.17,4.17,0,0,0,14,18a4,4,0,1,0,4-4ZM18,4a2,2,0,1,1-2,2A2,2,0,0,1,18,4ZM6,14a2,2,0,1,1,2-2A2,2,0,0,1,6,14Zm12,6a2,2,0,1,1,2-2A2,2,0,0,1,18,20Z">
          </path>
        </svg>
      </div> -->
    </div>

    <div class="hero__card--header">
      <p><?php the_title(); ?></p>
    </div>

    <div class="hero__card--para">
      <p><?php echo blogShortDescription(); ?></p>
    </div>

    <div class="hero__card--lists">
      <ul class="hero__card--list">
        <li class="hero__card--list-item">
          <span><?php echo heroListItem1(); ?></span>
        </li>
        <li class="hero__card--list-item">
          <span><?php echo heroListItem2(); ?></span>
        </li>
      </ul>
    </div>

    <div class="hero__card--dates">
      <p><?php
      $postDate = get_the_date("j M Y");
      echo $postDate;
      ?></p>
      <span></span>
      <p><?php echo timeToRead(); ?></p>
    </div>

    <div class="hero__card--shareicons">
      <p>Share this article</p>

      <div class="hero__card--shareicons-whatsapp">
        <a href="https://api.whatsapp.com/send?text=<?php echo the_permalink(); ?>" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path
              d="M16.6,14c-0.2-0.1-1.5-0.7-1.7-0.8c-0.2-0.1-0.4-0.1-0.6,0.1c-0.2,0.2-0.6,0.8-0.8,1c-0.1,0.2-0.3,0.2-0.5,0.1c-0.7-0.3-1.4-0.7-2-1.2c-0.5-0.5-1-1.1-1.4-1.7c-0.1-0.2,0-0.4,0.1-0.5c0.1-0.1,0.2-0.3,0.4-0.4c0.1-0.1,0.2-0.3,0.2-0.4c0.1-0.1,0.1-0.3,0-0.4c-0.1-0.1-0.6-1.3-0.8-1.8C9.4,7.3,9.2,7.3,9,7.3c-0.1,0-0.3,0-0.5,0C8.3,7.3,8,7.5,7.9,7.6C7.3,8.2,7,8.9,7,9.7c0.1,0.9,0.4,1.8,1,2.6c1.1,1.6,2.5,2.9,4.2,3.7c0.5,0.2,0.9,0.4,1.4,0.5c0.5,0.2,1,0.2,1.6,0.1c0.7-0.1,1.3-0.6,1.7-1.2c0.2-0.4,0.2-0.8,0.1-1.2C17,14.2,16.8,14.1,16.6,14 M19.1,4.9C15.2,1,8.9,1,5,4.9c-3.2,3.2-3.8,8.1-1.6,12L2,22l5.3-1.4c1.5,0.8,3.1,1.2,4.7,1.2h0c5.5,0,9.9-4.4,9.9-9.9C22,9.3,20.9,6.8,19.1,4.9 M16.4,18.9c-1.3,0.8-2.8,1.3-4.4,1.3h0c-1.5,0-2.9-0.4-4.2-1.1l-0.3-0.2l-3.1,0.8l0.8-3l-0.2-0.3C2.6,12.4,3.8,7.4,7.7,4.9S16.6,3.7,19,7.5C21.4,11.4,20.3,16.5,16.4,18.9">
            </path>
          </svg>
        </a>
      </div>

      <div class="hero__card--shareicons-facebook">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path
              d="M15.12,5.32H17V2.14A26.11,26.11,0,0,0,14.26,2C11.54,2,9.68,3.66,9.68,6.7V9.32H6.61v3.56H9.68V22h3.68V12.88h3.06l.46-3.56H13.36V7.05C13.36,6,13.64,5.32,15.12,5.32Z">
            </path>
          </svg>
        </a>
      </div>

      <div class="hero__card--shareicons-twitter">
        <a href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path
              d="M22,5.8a8.49,8.49,0,0,1-2.36.64,4.13,4.13,0,0,0,1.81-2.27,8.21,8.21,0,0,1-2.61,1,4.1,4.1,0,0,0-7,3.74A11.64,11.64,0,0,1,3.39,4.62a4.16,4.16,0,0,0-.55,2.07A4.09,4.09,0,0,0,4.66,10.1,4.05,4.05,0,0,1,2.8,9.59v.05a4.1,4.1,0,0,0,3.3,4A3.93,3.93,0,0,1,5,13.81a4.9,4.9,0,0,1-.77-.07,4.11,4.11,0,0,0,3.83,2.84A8.22,8.22,0,0,1,3,18.34a7.93,7.93,0,0,1-1-.06,11.57,11.57,0,0,0,6.29,1.85A11.59,11.59,0,0,0,20,8.45c0-.17,0-.35,0-.53A8.43,8.43,0,0,0,22,5.8Z">
            </path>
          </svg>
        </a>
      </div>

      <div class="hero__card--shareicons-pinterest">
        <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>" target="_blank">
          <svg width="20" height="25" viewBox="0 0 20 25" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10.326 0.296875C3.74816 0.296875 0.25 4.51206 0.25 9.10827C0.25 11.2399 1.44105 13.898 3.34764 14.741C3.63715 14.8715 3.79466 14.816 3.85916 14.5475C3.91617 14.3435 4.16668 13.361 4.28818 12.8974C4.32568 12.7489 4.30618 12.6199 4.18618 12.4804C3.55315 11.7484 3.05063 10.4148 3.05063 9.16377C3.05063 5.95813 5.59924 2.84549 9.93594 2.84549C13.6861 2.84549 16.3097 5.2816 16.3097 8.76626C16.3097 12.7039 14.2261 15.4281 11.5185 15.4281C10.0199 15.4281 8.90389 14.252 9.25791 12.7969C9.68542 11.0644 10.524 9.20128 10.524 7.95172C10.524 6.83117 9.89093 5.90413 8.59788 5.90413C7.07231 5.90413 5.83475 7.4147 5.83475 9.44279C5.83475 10.7313 6.29077 11.6014 6.29077 11.6014C6.29077 11.6014 4.7817 17.6977 4.50119 18.8362C4.02717 20.7638 4.56569 23.8854 4.6122 24.1539C4.6407 24.3025 4.8072 24.349 4.90021 24.2275C5.04872 24.0324 6.8728 21.4298 7.38432 19.5487C7.57033 18.8632 8.33386 16.0836 8.33386 16.0836C8.83639 16.9911 10.287 17.7517 11.832 17.7517C16.4282 17.7517 19.7494 13.712 19.7494 8.69875C19.7329 3.89254 15.6197 0.296875 10.326 0.296875Z">
            </path>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

<?php
} ?>

<section class="article reveal-article-section">
  <div class="article-details">
    <?php while (have_posts()) {
      the_post();

      //function to display the blog content
      the_content();
    } ?>
  </div>

  <div class="popular-reads-details-blogreading">

    <div class="popular-reads-subscriber">
      <div class="popular__reads">
        <div class="popular__reads--header">
          <p>popular reads</p>
        </div>

        <?php
        $mostRecentProduct = new WP_Query([
          "post_type" => "products",
          "posts_per_page" => 1,
        ]);

        while ($mostRecentProduct->have_posts()) {
          $mostRecentProduct->the_post();

          $mostRecentProductKeyIngredients = get_field("key_ingredients");
          $mostRecentProductNaturalSource = get_field("natural_source");
          $mostRecentProductConcern = get_field("product_concern");
          $mostRecentProductImage = get_field("product_image");
          $mostRecentProductTitle = get_field("product_title");
          $mostRecentProductSubTitle = get_field("product_subtitle");
          $mostRecentProductUrl = get_field("product_url");
        }
        ?>

        <a href="<?php echo $productUrl; ?>" id="popularreads">
          <div class="popular__reads--product">
            <div class="popular__reads--product-img">
              <img src="<?php echo $mostRecentProductImage["url"]; ?>" />
            </div>

            <div class="popular__reads--product-info">
              <p class="popular__reads--product-ingredients">
                <?php echo $mostRecentProductKeyIngredients; ?>
              </p>
              <p class="popular__reads--product-source">
                <?php echo $mostRecentProductNaturalSource; ?>
              </p>
              <p class="popular__reads--product-title"><?php echo $mostRecentProductTitle; ?></p>
              <p class="popular__reads--product-subtitle">
                <?php echo $mostRecentProductSubTitle; ?>
              </p>
              <p class="popular__reads--product-concerns">
                <?php echo $mostRecentProductConcern; ?>
              </p>
            </div>
          </div>
        </a>

        <?php
        //custom query for popular blogs
        $popularReads = new WP_Query([
          "posts_per_page" => 7,
          "post__not_in" => $filterPostIdsArray,
          "cat" => $subCategoryId,
        ]);

        //looping the post received from custom query above
        while ($popularReads->have_posts()) {

          $popularReads->the_post();

          //getting the postId and pushing into array
          $popularReadsPostId = get_post()->ID;
          array_push($filterPostIdsArray, $popularReadsPostId);
          $theCategories = get_the_category();
          ?>


        <a href="<?php echo the_permalink(); ?>" id="popularreads">
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
      </div>

      <?php
      $secondMostRecentProduct = new WP_Query([
        "post_type" => "products",
        "posts_per_page" => 1,
        "offset" => 1,
      ]);

      while ($secondMostRecentProduct->have_posts()) {
        $secondMostRecentProduct->the_post();

        $secondMostRecentProductKeyIngredients = get_field("key_ingredients");
        $secondMostRecentProductNaturalSource = get_field("natural_source");
        $secondMostRecentProductConcern = get_field("product_concern");
        $secondMostRecentProductImage = get_field("product_image");
        $secondMostRecentProductTitle = get_field("product_title");
        $secondMostRecentProductSubTitle = get_field("product_subtitle");
        $secondMostRecentProductUrl = get_field("product_url");
      }
      ?>

      <a href="<?php echo $secondMostRecentProductUrl; ?>" id="popularreads">
        <div class="popular__reads--bigproduct">
          <div class="popular__reads--bigproduct-img">
            <img src="<?php echo $secondMostRecentProductImage["url"]; ?>" />
          </div>

          <div class="popular__reads--bigproduct-info">
            <p class="popular__reads--bigproduct-ingredients">
              <?php echo $secondMostRecentProductKeyIngredients; ?>
            </p>
            <p class="popular__reads--bigproduct-source">
              <?php echo $secondMostRecentProductNaturalSource; ?>
            </p>
            <p class="popular__reads--bigproduct-title"><?php echo $secondMostRecentProductTitle; ?></p>
            <p class="popular__reads--bigproduct-subtitle">
              <?php echo $secondMostRecentProductSubTitle; ?>
            </p>
            <p class="popular__reads--bigproduct-concerns">
              <?php echo $secondMostRecentProductConcern; ?>
            </p>
          </div>
        </div>
      </a>

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
          </div> -->

          <!-- <button class="subscriber__box--button">subscribe</button> -->
          <?php echo do_shortcode('[wpforms id="443"]'); ?>

          <div class="subscriber__box--envelope-bottom">
            <svg width="166" height="143" viewBox="0 0 166 143" fill="none" xmlns="http://www.w3.org/2000/svg"
              class="absolute -bottom-6 -left-1">
              <path d="M16.8355 1.46183L73.2132 73.5336L-17.3916 86.3222L16.8355 1.46183Z" fill="#EDA91F"
                stroke="#003B1B"></path>
              <path d="M165.097 61.2609L74.4918 74.0495L130.87 146.121L165.097 61.2609Z" fill="#EDA91F"
                stroke="#003B1B">
              </path>
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

</section>


<?php
//section related blogs (based on subcategory)
?>
<section class="related">
  <div class="related__header">
    <p>Related Blogs</p>
  </div>

  <div class="related__content">
    <div class="related-left-arrow">
      <svg width="6" height="10" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.25 0.25L0.75 4.75L5.25 9.25L5.25 0.25Z"></path>
      </svg>
    </div>

    <div class="related-carousel">

      <?php
      //custom query for related blogs
      $relatedBlogs = new WP_Query([
        "posts_per_page" => 6,
        "post__not_in" => $filterPostIdsArray,
        "cat" => $subCategoryId,
      ]);

      //looping the post received from custom query above
      while ($relatedBlogs->have_posts()) {

        $relatedBlogs->the_post();

        //getting the postId and pushing into array
        $relatedBlogsPostId = get_post()->ID;
        array_push($filterPostIdsArray, $relatedBlogsPostId);
        $theCategories = get_the_category();
        ?>

      <div class="related-carousel__card">
        <a href="<?php the_permalink(); ?>">
          <div class="related-carousel__card--img">

            <?php //pulling image url & alt attribute of the blog

        $pageBannerImage = get_field("blog_banner_image"); ?>

            <img src="<?php echo getImageUrlAlt(
              $pageBannerImage
            )[0]; ?>" alt="<?php echo getImageUrlAlt(
  $pageBannerImage
)[1]; ?>" />

          </div>
          <div class="related-carousel__card--info">
            <div class="related-carousel__card--info-breadcrumbs">
              <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
              <span></span>
              <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
            </div>

            <div class="related-carousel__card--info-header">
              <p><?php the_title(); ?></p>
            </div>

            <div class="related-carousel__card--info-extra">
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

      <div class="related-carousel__card">
        <div class="related-carousel__card-text">
          <div class="related-carousel__card-text-wrapper">
            <p class="related-carousel__card-text-wrapper-readmore">Read more from</p>
            <p class="related-carousel__card-text-wrapper-subcategory">
              <?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
          </div>
        </div>
        <div class="related-carousel__card-icon">
          <a href="<?php echo esc_url(get_category_link($subCategoryId)); ?>">
            <div class="related-carousel__card-icon-svg">
              <svg width="11" height="11" viewBox="0 0 11 11" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10.4333 4.68674C10.3937 4.58445 10.3342 4.491 10.2583 4.41174L6.09167 0.245076C6.01397 0.167378 5.92173 0.105744 5.82021 0.0636935C5.71869 0.0216433 5.60988 0 5.5 0C5.27808 0 5.06525 0.0881567 4.90833 0.245076C4.83063 0.322775 4.769 0.415017 4.72695 0.516535C4.6849 0.618054 4.66326 0.72686 4.66326 0.836743C4.66326 1.05866 4.75141 1.27149 4.90833 1.42841L7.65833 4.17008L1.33333 4.17008C1.11232 4.17008 0.900358 4.25787 0.744078 4.41415C0.587798 4.57044 0.5 4.7824 0.5 5.00341C0.5 5.22442 0.587798 5.43639 0.744078 5.59267C0.900358 5.74895 1.11232 5.83674 1.33333 5.83674L7.65833 5.83674L4.90833 8.57841C4.83023 8.65588 4.76823 8.74805 4.72592 8.8496C4.68362 8.95115 4.66183 9.06007 4.66183 9.17008C4.66183 9.28009 4.68362 9.38901 4.72592 9.49056C4.76823 9.59211 4.83023 9.68427 4.90833 9.76174C4.9858 9.83985 5.07797 9.90185 5.17952 9.94415C5.28107 9.98646 5.38999 10.0082 5.5 10.0082C5.61001 10.0082 5.71893 9.98646 5.82048 9.94415C5.92203 9.90185 6.0142 9.83985 6.09167 9.76174L10.2583 5.59508C10.3342 5.51582 10.3937 5.42237 10.4333 5.32008C10.5167 5.11719 10.5167 4.88963 10.4333 4.68674Z" />
              </svg>
            </div>
          </a>
        </div>
      </div>

      <div class="related-carousel__dots"></div>
    </div>

    <div class="related-right-arrow">
      <svg width="6" height="10" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.75 0.25L5.25 4.75L0.75 9.25L0.75 0.25Z"></path>
      </svg>
    </div>
  </div>
</section>



<?php
//section trending blogs (based on category)
?>
<section class="trendingblogs">
  <div class="trendingblogs__header">
    <p>Trending Blogs</p>
  </div>

  <div class="trendingblogs__content">
    <div class="trending-left-arrow">
      <svg width="6" height="10" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.25 0.25L0.75 4.75L5.25 9.25L5.25 0.25Z"></path>
      </svg>
    </div>

    <div class="trending-carousel">

      <?php
      //custom query for trending blogs
      $trendingBlogs = new WP_Query([
        "posts_per_page" => 6,
        "post__not_in" => $filterPostIdsArray,
        "cat" => $categoryId,
      ]);

      //looping the post received from custom query above
      while ($trendingBlogs->have_posts()) {

        $trendingBlogs->the_post();

        //getting the postId and pushing into array
        $trendingBlogsPostId = get_post()->ID;
        array_push($filterPostIdsArray, $trendingBlogsPostId);
        $theCategories = get_the_category();
        ?>

      <div class="trending-carousel__card">
        <a href="<?php the_permalink(); ?>">
          <div class="trending-carousel__card--img">
            <?php //pulling image url & alt attribute of the blog

        $pageBannerImage = get_field("blog_banner_image"); ?>
            <img src="<?php echo getImageUrlAlt(
              $pageBannerImage
            )[0]; ?>" alt="<?php echo getImageUrlAlt(
  $pageBannerImage
)[1]; ?>" />

          </div>
          <div class="trending-carousel__card--info">
            <div class="trending-carousel__card--info-breadcrumbs">
              <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
              <span></span>
              <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
            </div>

            <div class="trending-carousel__card--info-header">
              <p><?php the_title(); ?></p>
            </div>

            <div class="trending-carousel__card--info-extra">
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

      <div class="trending-carousel__card">
        <div class="trending-carousel__card-text">
          <div class="trending-carousel__card-text-wrapper">
            <p class="trending-carousel__card-text-wrapper-readmore">Read more from</p>
            <p class="trending-carousel__card-text-wrapper-subcategory">
              <?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
          </div>
        </div>
        <div class="trending-carousel__card-icon">
          <a href="<?php echo esc_url(get_category_link($categoryId)); ?>">
            <div class="trending-carousel__card-icon-svg">
              <svg width="11" height="11" viewBox="0 0 11 11" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10.4333 4.68674C10.3937 4.58445 10.3342 4.491 10.2583 4.41174L6.09167 0.245076C6.01397 0.167378 5.92173 0.105744 5.82021 0.0636935C5.71869 0.0216433 5.60988 0 5.5 0C5.27808 0 5.06525 0.0881567 4.90833 0.245076C4.83063 0.322775 4.769 0.415017 4.72695 0.516535C4.6849 0.618054 4.66326 0.72686 4.66326 0.836743C4.66326 1.05866 4.75141 1.27149 4.90833 1.42841L7.65833 4.17008L1.33333 4.17008C1.11232 4.17008 0.900358 4.25787 0.744078 4.41415C0.587798 4.57044 0.5 4.7824 0.5 5.00341C0.5 5.22442 0.587798 5.43639 0.744078 5.59267C0.900358 5.74895 1.11232 5.83674 1.33333 5.83674L7.65833 5.83674L4.90833 8.57841C4.83023 8.65588 4.76823 8.74805 4.72592 8.8496C4.68362 8.95115 4.66183 9.06007 4.66183 9.17008C4.66183 9.28009 4.68362 9.38901 4.72592 9.49056C4.76823 9.59211 4.83023 9.68427 4.90833 9.76174C4.9858 9.83985 5.07797 9.90185 5.17952 9.94415C5.28107 9.98646 5.38999 10.0082 5.5 10.0082C5.61001 10.0082 5.71893 9.98646 5.82048 9.94415C5.92203 9.90185 6.0142 9.83985 6.09167 9.76174L10.2583 5.59508C10.3342 5.51582 10.3937 5.42237 10.4333 5.32008C10.5167 5.11719 10.5167 4.88963 10.4333 4.68674Z" />
              </svg>
            </div>
          </a>
        </div>
      </div>

      <div class="trending-carousel__dots"></div>
    </div>

    <div class="trending-right-arrow">
      <svg width="6" height="10" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.75 0.25L5.25 4.75L0.75 9.25L0.75 0.25Z"></path>
      </svg>
    </div>
  </div>
</section>


<?php
//section you may also read blogs (excluding current category & subcategory)
?>
<section class="crossposts">
  <div class="crossposts__header">
    <p>You may also read</p>
  </div>

  <div class="crossposts__content">
    <div class="crossposts-left-arrow">
      <svg width="6" height="10" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.25 0.25L0.75 4.75L5.25 9.25L5.25 0.25Z"></path>
      </svg>
    </div>

    <div class="crossposts-carousel">

      <?php
      $crossPosts = new WP_Query([
        "posts_per_page" => 6,
        "post__not_in" => $filterPostIdsArray,
        //"category__not_in" => [$categoryId], //this category filter to be used when there are more than one category
      ]);

      //looping the post received from custom query above
      while ($crossPosts->have_posts()) {

        $crossPosts->the_post();

        //getting the postId and pushing into array
        $crossPostsPostId = get_post()->ID;
        array_push($filterPostIdsArray, $crossPostsPostId);
        $theCategories = get_the_category();
        ?>


      <div class="crossposts-carousel__card">
        <a href="<?php the_permalink(); ?>">
          <div class="crossposts-carousel__card--img">

            <?php //pulling image url & alt attribute of the blog

        $pageBannerImage = get_field("blog_banner_image"); ?>
            <img src="<?php echo getImageUrlAlt(
              $pageBannerImage
            )[0]; ?>" alt="<?php echo getImageUrlAlt(
  $pageBannerImage
)[1]; ?>" />

          </div>
          <div class="crossposts-carousel__card--info">
            <div class="crossposts-carousel__card--info-breadcrumbs">
              <p><?php echo getCategoryAndSubcategory($theCategories)[0]; ?></p>
              <span></span>
              <p><?php echo getCategoryAndSubcategory($theCategories)[1]; ?></p>
            </div>

            <div class="crossposts-carousel__card--info-header">
              <p><?php the_title(); ?></p>
            </div>

            <div class="crossposts-carousel__card--info-extra">
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

      <div class="crossposts-carousel__card">
        <div class="crossposts-carousel__card-text">
          <div class="crossposts-carousel__card-text-wrapper">
            <p class="crossposts-carousel__card-text-wrapper-readmore">Explore all Articles</p>
          </div>
        </div>
        <div class="crossposts-carousel__card-icon">
          <a href="<?php echo esc_url(get_category_link($categoryId)); ?>">
            <div class="crossposts-carousel__card-icon-svg">
              <svg width="11" height="11" viewBox="0 0 11 11" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10.4333 4.68674C10.3937 4.58445 10.3342 4.491 10.2583 4.41174L6.09167 0.245076C6.01397 0.167378 5.92173 0.105744 5.82021 0.0636935C5.71869 0.0216433 5.60988 0 5.5 0C5.27808 0 5.06525 0.0881567 4.90833 0.245076C4.83063 0.322775 4.769 0.415017 4.72695 0.516535C4.6849 0.618054 4.66326 0.72686 4.66326 0.836743C4.66326 1.05866 4.75141 1.27149 4.90833 1.42841L7.65833 4.17008L1.33333 4.17008C1.11232 4.17008 0.900358 4.25787 0.744078 4.41415C0.587798 4.57044 0.5 4.7824 0.5 5.00341C0.5 5.22442 0.587798 5.43639 0.744078 5.59267C0.900358 5.74895 1.11232 5.83674 1.33333 5.83674L7.65833 5.83674L4.90833 8.57841C4.83023 8.65588 4.76823 8.74805 4.72592 8.8496C4.68362 8.95115 4.66183 9.06007 4.66183 9.17008C4.66183 9.28009 4.68362 9.38901 4.72592 9.49056C4.76823 9.59211 4.83023 9.68427 4.90833 9.76174C4.9858 9.83985 5.07797 9.90185 5.17952 9.94415C5.28107 9.98646 5.38999 10.0082 5.5 10.0082C5.61001 10.0082 5.71893 9.98646 5.82048 9.94415C5.92203 9.90185 6.0142 9.83985 6.09167 9.76174L10.2583 5.59508C10.3342 5.51582 10.3937 5.42237 10.4333 5.32008C10.5167 5.11719 10.5167 4.88963 10.4333 4.68674Z" />
              </svg>
            </div>
          </a>
        </div>
      </div>

      <div class="crossposts-carousel__dots"></div>
    </div>

    <div class="crossposts-right-arrow">
      <svg width="6" height="10" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.75 0.25L5.25 4.75L0.75 9.25L0.75 0.25Z"></path>
      </svg>
    </div>
  </div>
</section>

<?php //function call for footer section

get_footer();
?>
