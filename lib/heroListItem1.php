<?php

function heroListItem1()
{
  $heroListItem1 = get_field("hero_card_list_item_1");
  $showHeroListItem1 =
    $heroListItem1 === null
      ? "This is the default text present for list"
      : $heroListItem1;
  return $showHeroListItem1;
}

?>