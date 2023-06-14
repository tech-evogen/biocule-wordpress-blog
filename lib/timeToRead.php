<?php

function timeToRead()
{
  $timeToRead = get_field("blog_time_to_read");
  $showTimeToRead = $timeToRead === null ? "5 min read" : $timeToRead;
  return $showTimeToRead;
}

?>