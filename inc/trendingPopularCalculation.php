<?php

//below function full logic of the calculation of trending score & popular score
function calculateTrendingPopularScore()
{
  //getting the maximum views among all the posts present in the worpress
  global $wpdb;

  $allPostViewCounts = $wpdb->get_results(
    "SELECT meta_value FROM wp_postmeta WHERE meta_key = 'post_views_count'"
  );

  $maxClickValueString = max($allPostViewCounts)->meta_value;
  $maxClickValueInteger = (int) $maxClickValueString;

  //---------------------------------------------------------------------------------------------------

  $recencyIndex = 100;
  $clickIndex = 100;

  //getting 100 days old date array
  $hundredDaysOldDateArray = explode(".", date("Y.m.d", strtotime("-100 day")));

  //query to get the 100 days old posts
  $lastHundredDaysBlogs = new WP_Query([
    "posts_per_page" => 1000,
    "date_query" => [
      "after" => [
        "year" => $hundredDaysOldDateArray[0],
        "month" => $hundredDaysOldDateArray[1],
        "day" => $hundredDaysOldDateArray[2],
      ],
    ],
  ]);

  //start looping through the posts retrived from above query
  while ($lastHundredDaysBlogs->have_posts()) {
    $lastHundredDaysBlogs->the_post();

    //getting the post view count of each blog
    $postTitle = the_title();
    $postMetaKeysArray = get_post_meta(get_post()->ID);
    print_r($postTitle);

    $clickScoreString = $postMetaKeysArray["post_views_count"][0];
    $clickScoreInteger = (int) $clickScoreString;
    print_r($clickScoreInteger);

    //getting the dates in seconds and then calculting the difference in days
    $postPublishDateInSeconds = strtotime(get_post()->post_date);
    $currentTimeInSseconds = strtotime("now");

    $differenceInDays =
      (int) (($currentTimeInSseconds - $postPublishDateInSeconds) /
        (3600 * 24));

    print_r($differenceInDays);

    //calculating recency value & click value and based on that final trending score & popular score
    $actualRecenyValue = $recencyIndex - $differenceInDays;
    $actualClickValue =
      ($clickIndex / $maxClickValueInteger) * $clickScoreInteger;

    $totalTrendingScore =
      (int) ($actualRecenyValue * 0.7 + $actualClickValue * 0.3);
    $totalPopularScore =
      (int) ($actualRecenyValue * 0.3 + $actualClickValue * 0.7);

    // defining the field values to be entered in DB
    $total_trending_score = "total_trending_score";
    $total_popular_score = "total_popular_score";

    //getting the old values of trending & popular score for each blogs
    $old_total_trending_score = get_post_meta(
      get_post()->ID,
      $total_trending_score,
      true
    );
    $old_total_popular_score = get_post_meta(
      get_post()->ID,
      $total_popular_score,
      true
    );

    //conditional statement to check if no record present then insert new value else update the old one with new calculated value
    if ($old_total_trending_score == "" && $old_total_popular_score == "") {
      add_post_meta(get_post()->ID, $total_trending_score, $totalTrendingScore);
      add_post_meta(get_post()->ID, $total_popular_score, $totalPopularScore);
    } else {
      update_post_meta(
        get_post()->ID,
        $total_trending_score,
        $totalTrendingScore
      );
      update_post_meta(
        get_post()->ID,
        $total_popular_score,
        $totalPopularScore
      );
    }

    print_r($totalTrendingScore);
    print_r($totalPopularScore);

    print_r($old_total_trending_score);
    print_r($old_total_popular_score);
  }

  return;
}
?>
