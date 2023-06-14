<?php

function heroListItem2()
{
  $heroListItem2 = get_field("hero_card_list_item_2");
  $showHeroListItem2 =
    $heroListItem2 === null
      ? "Skin care can be quite tricky and it is not an issue that comes up once and goes away."
      : $heroListItem2;
  return $showHeroListItem2;
}

?>