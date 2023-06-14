<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>

  <title>bio:cule | blogs</title>
</head>

<body <?php body_class(); ?>>

  <?php // resuable functions file imports


  require get_template_directory() . "/lib/getCategoryAndSubcategory.php";
  require get_template_directory() . "/lib/imageSrcAndAlt.php";
  require get_template_directory() . "/lib/timeToRead.php";
  require get_template_directory() . "/lib/blogShortDescription.php";
  ?>

  <header class="header">
    <nav class="desktop-menu">
      <div class="desktop-menu-logo">
        <a href="https://blogs.biocule.com/">
          <img src="<?php echo get_theme_file_uri(
            "/assets/logo.svg"
          ); ?>" alt="bio:cule blog logo" />
        </a>
      </div>

      <ul class="desktop-menu-list">
        <?php
        $navMenuArray = wp_get_nav_menu_items("sticky-menu-options");
        foreach ($navMenuArray as $navMenuItem) { ?>
        <a href="<?php echo $navMenuItem->url; ?>">
          <li class="desktop-menu-list-items">
            <?php echo $navMenuItem->title; ?>
          </li>
        </a>
        <?php }
        ?>
      </ul>

      <div class="desktop-menu-search">
        <input type="text" placeholder="Search for blogs..." autocomplete="off" />
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path
            d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z">
          </path>
        </svg>
      </div>

      <div class="desktop-menu-cart">
        <a href="https://www.biocule.com/">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24"
            height="24" viewBox="0 0 256 256" xml:space="preserve">
            <defs>
            </defs>
            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
              transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
              <path
                d="M 73.903 63.178 H 28.899 c -4.566 0 -8.377 -3.276 -9.063 -7.79 l -5.662 -37.261 c -0.087 -0.576 0.081 -1.162 0.461 -1.604 s 0.934 -0.696 1.517 -0.696 h 67.893 c 1.805 0 3.491 0.805 4.628 2.208 c 1.135 1.403 1.571 3.22 1.195 4.985 l -6.999 32.899 C 81.975 60.125 78.203 63.178 73.903 63.178 z M 18.479 19.827 l 5.313 34.96 c 0.386 2.544 2.534 4.391 5.107 4.391 h 45.004 c 2.424 0 4.549 -1.721 5.054 -4.091 l 6.999 -32.9 c 0.123 -0.58 -0.02 -1.176 -0.393 -1.636 c -0.373 -0.46 -0.926 -0.725 -1.519 -0.725 H 18.479 z"
                style="stroke: #003b1b; stroke-width: 2.5; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,59,27); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
              <path
                d="M 16.15 19.827 c -0.988 0 -1.848 -0.732 -1.98 -1.738 l -0.598 -4.531 c -0.279 -2.116 -2.099 -3.712 -4.233 -3.712 H 2 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 7.339 c 4.133 0 7.658 3.09 8.199 7.188 l 0.598 4.531 c 0.145 1.095 -0.626 2.1 -1.721 2.245 C 16.325 19.821 16.237 19.827 16.15 19.827 z"
                style="stroke: #003b1b; stroke-width: 2.5; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,59,27); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
              <path
                d="M 29.18 84.154 c -4.76 0 -8.632 -3.873 -8.632 -8.633 s 3.873 -8.632 8.632 -8.632 c 4.76 0 8.633 3.872 8.633 8.632 S 33.94 84.154 29.18 84.154 z M 29.18 70.89 c -2.554 0 -4.632 2.078 -4.632 4.632 c 0 2.555 2.078 4.633 4.632 4.633 c 2.555 0 4.633 -2.078 4.633 -4.633 C 33.813 72.968 31.734 70.89 29.18 70.89 z"
                style="stroke: #003b1b; stroke-width: 2.5; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,59,27); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
              <path
                d="M 71.339 84.154 c -4.76 0 -8.633 -3.873 -8.633 -8.633 s 3.873 -8.632 8.633 -8.632 s 8.632 3.872 8.632 8.632 S 76.099 84.154 71.339 84.154 z M 71.339 70.89 c -2.555 0 -4.633 2.078 -4.633 4.632 c 0 2.555 2.078 4.633 4.633 4.633 c 2.554 0 4.632 -2.078 4.632 -4.633 C 75.971 72.968 73.893 70.89 71.339 70.89 z"
                style="stroke: #003b1b; stroke-width: 2.5; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,59,27); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            </g>
          </svg>

        </a>
      </div>

      <div class="desktop-menu-shopbiocule">
        <a href="https://www.biocule.com/collections/all">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M2.99998 10.682V10.3285L2.66664 10.2106C2.27761 10.0731 1.94064 9.81858 1.70194 9.482C1.46336 9.14561 1.33461 8.74368 1.33331 8.33129V4.9987C1.33331 4.91029 1.36843 4.82551 1.43094 4.763L1.07908 4.41113L1.43094 4.763C1.49346 4.70048 1.57824 4.66536 1.66665 4.66536H18.3333C18.4217 4.66536 18.5065 4.70048 18.569 4.763C18.6315 4.82551 18.6666 4.91029 18.6666 4.9987L18.6666 8.33063C18.6666 8.33084 18.6666 8.33105 18.6666 8.33127C18.6654 8.74367 18.5366 9.1456 18.298 9.482C18.0593 9.81858 17.7223 10.0731 17.3333 10.2106L17 10.3285V10.682V18.332C17 18.4204 16.9649 18.5052 16.9023 18.5677C16.8398 18.6302 16.7551 18.6654 16.6666 18.6654H3.33331C3.24491 18.6654 3.16012 18.6302 3.09761 18.5677C3.0351 18.5052 2.99998 18.4204 2.99998 18.332V10.682ZM12.5 5.33203H12V5.83203V8.33203C12 8.68565 12.1405 9.02479 12.3905 9.27484C12.6406 9.52489 12.9797 9.66536 13.3333 9.66536C13.6869 9.66536 14.0261 9.52489 14.2761 9.27484C14.5262 9.02479 14.6666 8.68565 14.6666 8.33203V5.83203V5.33203H14.1666H12.5ZM9.16665 5.33203H8.66665V5.83203V8.33203C8.66665 8.68565 8.80712 9.02479 9.05717 9.27484C9.30722 9.52489 9.64636 9.66536 9.99998 9.66536C10.3536 9.66536 10.6927 9.52489 10.9428 9.27484C11.1928 9.02479 11.3333 8.68565 11.3333 8.33203V5.83203V5.33203H10.8333H9.16665ZM5.83331 5.33203H5.33331V5.83203V8.33203C5.33331 8.68565 5.47379 9.02479 5.72384 9.27484C5.97389 9.52489 6.31302 9.66536 6.66665 9.66536C7.02027 9.66536 7.35941 9.52489 7.60945 9.27484C7.8595 9.02479 7.99998 8.68565 7.99998 8.33203V5.83203V5.33203H7.49998H5.83331ZM1.99998 5.33203V5.83203V8.33203C1.99998 8.68565 2.14046 9.02479 2.3905 9.27484C2.64055 9.52489 2.97969 9.66536 3.33331 9.66536C3.68693 9.66536 4.02607 9.52489 4.27612 9.27484C4.52617 9.02479 4.66665 8.68565 4.66665 8.33203V5.83203V5.33203H4.16665H2.49998H1.99998ZM11.6666 17.9987H12.1666V17.4987V15.832C12.1666 15.2574 11.9384 14.7063 11.532 14.3C11.1257 13.8936 10.5746 13.6654 9.99998 13.6654C9.42534 13.6654 8.87424 13.8936 8.46791 14.3C8.06159 14.7063 7.83331 15.2574 7.83331 15.832V17.4987V17.9987H8.33331H11.6666ZM15.8333 17.9987H16.3333V17.4987V10.682V10.3343L16.0073 10.2133C15.759 10.1211 15.5299 9.98366 15.3317 9.80792L14.9985 9.5125L14.6666 9.80935C14.3 10.1373 13.8253 10.3186 13.3333 10.3186C12.8414 10.3186 12.3667 10.1373 12 9.80935L11.6666 9.51121L11.3333 9.80935C10.9666 10.1373 10.4919 10.3186 9.99998 10.3186C9.50802 10.3186 9.03333 10.1373 8.66665 9.80935L8.33331 9.51121L7.99998 9.80935C7.6333 10.1373 7.1586 10.3186 6.66665 10.3186C6.17469 10.3186 5.69999 10.1373 5.33331 9.80935L5.00142 9.5125L4.66826 9.80792C4.47006 9.98366 4.24098 10.1211 3.99265 10.2133L3.66665 10.3343V10.682V17.4987V17.9987H4.16665H6.66665H7.16665V17.4987V15.832C7.16665 15.0806 7.46516 14.3599 7.99651 13.8286C8.52786 13.2972 9.24853 12.9987 9.99998 12.9987C10.7514 12.9987 11.4721 13.2972 12.0034 13.8286C12.5348 14.3599 12.8333 15.0806 12.8333 15.832V17.4987V17.9987H13.3333H15.8333ZM15.8333 5.33203H15.3333V5.83203V8.33203C15.3333 8.68565 15.4738 9.02479 15.7238 9.27484C15.9739 9.52489 16.313 9.66536 16.6666 9.66536C17.0203 9.66536 17.3594 9.52489 17.6095 9.27484C17.8595 9.02479 18 8.68565 18 8.33203V5.83203V5.33203H17.5H15.8333ZM16.6666 1.9987H3.58331C3.49491 1.9987 3.41012 1.96358 3.34761 1.90107C3.2851 1.83855 3.24998 1.75377 3.24998 1.66536C3.24998 1.57696 3.2851 1.49217 3.34761 1.42966C3.41012 1.36715 3.49491 1.33203 3.58331 1.33203H16.6666C16.7551 1.33203 16.8398 1.36715 16.9023 1.42966C16.9649 1.49217 17 1.57696 17 1.66536C17 1.75377 16.9649 1.83856 16.9023 1.90107C16.8398 1.96358 16.7551 1.9987 16.6666 1.9987Z"
              fill="#8C8C8C" stroke="#003B1B" />
          </svg>
          <span>Shop bio:cule</span>
        </a>
      </div>
    </nav>

    <nav class="mobile-menu">
      <div class="menu__items">
        <div class="menu__items--hamburger">
          <svg width="18" height="12" viewBox="0 0 18 12" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M1 12H17C17.55 12 18 11.55 18 11C18 10.45 17.55 10 17 10H1C0.45 10 0 10.45 0 11C0 11.55 0.45 12 1 12ZM1 7H17C17.55 7 18 6.55 18 6C18 5.45 17.55 5 17 5H1C0.45 5 0 5.45 0 6C0 6.55 0.45 7 1 7ZM0 1C0 1.55 0.45 2 1 2H17C17.55 2 18 1.55 18 1C18 0.45 17.55 0 17 0H1C0.45 0 0 0.45 0 1Z">
            </path>
          </svg>
        </div>

        <div class="menu__items--logo">
          <a href=".">
            <img src="<?php echo get_theme_file_uri(
              "/assets/mobilelogo.svg"
            ); ?>" alt="bio:cule blog logo" alt="bio:cule blog logo" />
          </a>
        </div>

        <div class="menu__items--icons">
          <a href="#" class="menu__items--icons-search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path
                d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z">
              </path>
            </svg>
          </a>

          <a href="https://www.biocule.com/">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24"
              height="24" viewBox="0 0 256 256" xml:space="preserve">
              <defs>
              </defs>
              <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <path
                  d="M 73.903 63.178 H 28.899 c -4.566 0 -8.377 -3.276 -9.063 -7.79 l -5.662 -37.261 c -0.087 -0.576 0.081 -1.162 0.461 -1.604 s 0.934 -0.696 1.517 -0.696 h 67.893 c 1.805 0 3.491 0.805 4.628 2.208 c 1.135 1.403 1.571 3.22 1.195 4.985 l -6.999 32.899 C 81.975 60.125 78.203 63.178 73.903 63.178 z M 18.479 19.827 l 5.313 34.96 c 0.386 2.544 2.534 4.391 5.107 4.391 h 45.004 c 2.424 0 4.549 -1.721 5.054 -4.091 l 6.999 -32.9 c 0.123 -0.58 -0.02 -1.176 -0.393 -1.636 c -0.373 -0.46 -0.926 -0.725 -1.519 -0.725 H 18.479 z"
                  style="stroke: #003b1b; stroke-width: 2.5; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,59,27); fill-rule: nonzero; opacity: 1;"
                  transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path
                  d="M 16.15 19.827 c -0.988 0 -1.848 -0.732 -1.98 -1.738 l -0.598 -4.531 c -0.279 -2.116 -2.099 -3.712 -4.233 -3.712 H 2 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 7.339 c 4.133 0 7.658 3.09 8.199 7.188 l 0.598 4.531 c 0.145 1.095 -0.626 2.1 -1.721 2.245 C 16.325 19.821 16.237 19.827 16.15 19.827 z"
                  style="stroke: #003b1b; stroke-width: 2.5; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,59,27); fill-rule: nonzero; opacity: 1;"
                  transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path
                  d="M 29.18 84.154 c -4.76 0 -8.632 -3.873 -8.632 -8.633 s 3.873 -8.632 8.632 -8.632 c 4.76 0 8.633 3.872 8.633 8.632 S 33.94 84.154 29.18 84.154 z M 29.18 70.89 c -2.554 0 -4.632 2.078 -4.632 4.632 c 0 2.555 2.078 4.633 4.632 4.633 c 2.555 0 4.633 -2.078 4.633 -4.633 C 33.813 72.968 31.734 70.89 29.18 70.89 z"
                  style="stroke: #003b1b; stroke-width: 2.5; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,59,27); fill-rule: nonzero; opacity: 1;"
                  transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path
                  d="M 71.339 84.154 c -4.76 0 -8.633 -3.873 -8.633 -8.633 s 3.873 -8.632 8.633 -8.632 s 8.632 3.872 8.632 8.632 S 76.099 84.154 71.339 84.154 z M 71.339 70.89 c -2.555 0 -4.633 2.078 -4.633 4.632 c 0 2.555 2.078 4.633 4.633 4.633 c 2.554 0 4.632 -2.078 4.632 -4.633 C 75.971 72.968 73.893 70.89 71.339 70.89 z"
                  style="stroke: #003b1b; stroke-width: 2.5; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,59,27); fill-rule: nonzero; opacity: 1;"
                  transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
              </g>
            </svg>
          </a>
        </div>
      </div>
    </nav>

  </header>



  <nav class="mobile-menu-drawer hidden">
    <div class="drawer__list">
      <div class="drawer__list--logo">
        <a href=".">
          <img src="<?php echo get_theme_file_uri(
            "/assets/logo.svg"
          ); ?>" alt="bio:cule blog logo" />
        </a>
      </div>

      <div class="drawer__list--shopbiocule">
        <a href="https://www.biocule.com/collections/all">
          <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M2.99998 10.682V10.3285L2.66664 10.2106C2.27761 10.0731 1.94064 9.81858 1.70194 9.482C1.46336 9.14561 1.33461 8.74368 1.33331 8.33129V4.9987C1.33331 4.91029 1.36843 4.82551 1.43094 4.763L1.07908 4.41113L1.43094 4.763C1.49346 4.70048 1.57824 4.66536 1.66665 4.66536H18.3333C18.4217 4.66536 18.5065 4.70048 18.569 4.763C18.6315 4.82551 18.6666 4.91029 18.6666 4.9987L18.6666 8.33063C18.6666 8.33084 18.6666 8.33105 18.6666 8.33127C18.6654 8.74367 18.5366 9.1456 18.298 9.482C18.0593 9.81858 17.7223 10.0731 17.3333 10.2106L17 10.3285V10.682V18.332C17 18.4204 16.9649 18.5052 16.9023 18.5677C16.8398 18.6302 16.7551 18.6654 16.6666 18.6654H3.33331C3.24491 18.6654 3.16012 18.6302 3.09761 18.5677C3.0351 18.5052 2.99998 18.4204 2.99998 18.332V10.682ZM12.5 5.33203H12V5.83203V8.33203C12 8.68565 12.1405 9.02479 12.3905 9.27484C12.6406 9.52489 12.9797 9.66536 13.3333 9.66536C13.6869 9.66536 14.0261 9.52489 14.2761 9.27484C14.5262 9.02479 14.6666 8.68565 14.6666 8.33203V5.83203V5.33203H14.1666H12.5ZM9.16665 5.33203H8.66665V5.83203V8.33203C8.66665 8.68565 8.80712 9.02479 9.05717 9.27484C9.30722 9.52489 9.64636 9.66536 9.99998 9.66536C10.3536 9.66536 10.6927 9.52489 10.9428 9.27484C11.1928 9.02479 11.3333 8.68565 11.3333 8.33203V5.83203V5.33203H10.8333H9.16665ZM5.83331 5.33203H5.33331V5.83203V8.33203C5.33331 8.68565 5.47379 9.02479 5.72384 9.27484C5.97389 9.52489 6.31302 9.66536 6.66665 9.66536C7.02027 9.66536 7.35941 9.52489 7.60945 9.27484C7.8595 9.02479 7.99998 8.68565 7.99998 8.33203V5.83203V5.33203H7.49998H5.83331ZM1.99998 5.33203V5.83203V8.33203C1.99998 8.68565 2.14046 9.02479 2.3905 9.27484C2.64055 9.52489 2.97969 9.66536 3.33331 9.66536C3.68693 9.66536 4.02607 9.52489 4.27612 9.27484C4.52617 9.02479 4.66665 8.68565 4.66665 8.33203V5.83203V5.33203H4.16665H2.49998H1.99998ZM11.6666 17.9987H12.1666V17.4987V15.832C12.1666 15.2574 11.9384 14.7063 11.532 14.3C11.1257 13.8936 10.5746 13.6654 9.99998 13.6654C9.42534 13.6654 8.87424 13.8936 8.46791 14.3C8.06159 14.7063 7.83331 15.2574 7.83331 15.832V17.4987V17.9987H8.33331H11.6666ZM15.8333 17.9987H16.3333V17.4987V10.682V10.3343L16.0073 10.2133C15.759 10.1211 15.5299 9.98366 15.3317 9.80792L14.9985 9.5125L14.6666 9.80935C14.3 10.1373 13.8253 10.3186 13.3333 10.3186C12.8414 10.3186 12.3667 10.1373 12 9.80935L11.6666 9.51121L11.3333 9.80935C10.9666 10.1373 10.4919 10.3186 9.99998 10.3186C9.50802 10.3186 9.03333 10.1373 8.66665 9.80935L8.33331 9.51121L7.99998 9.80935C7.6333 10.1373 7.1586 10.3186 6.66665 10.3186C6.17469 10.3186 5.69999 10.1373 5.33331 9.80935L5.00142 9.5125L4.66826 9.80792C4.47006 9.98366 4.24098 10.1211 3.99265 10.2133L3.66665 10.3343V10.682V17.4987V17.9987H4.16665H6.66665H7.16665V17.4987V15.832C7.16665 15.0806 7.46516 14.3599 7.99651 13.8286C8.52786 13.2972 9.24853 12.9987 9.99998 12.9987C10.7514 12.9987 11.4721 13.2972 12.0034 13.8286C12.5348 14.3599 12.8333 15.0806 12.8333 15.832V17.4987V17.9987H13.3333H15.8333ZM15.8333 5.33203H15.3333V5.83203V8.33203C15.3333 8.68565 15.4738 9.02479 15.7238 9.27484C15.9739 9.52489 16.313 9.66536 16.6666 9.66536C17.0203 9.66536 17.3594 9.52489 17.6095 9.27484C17.8595 9.02479 18 8.68565 18 8.33203V5.83203V5.33203H17.5H15.8333ZM16.6666 1.9987H3.58331C3.49491 1.9987 3.41012 1.96358 3.34761 1.90107C3.2851 1.83855 3.24998 1.75377 3.24998 1.66536C3.24998 1.57696 3.2851 1.49217 3.34761 1.42966C3.41012 1.36715 3.49491 1.33203 3.58331 1.33203H16.6666C16.7551 1.33203 16.8398 1.36715 16.9023 1.42966C16.9649 1.49217 17 1.57696 17 1.66536C17 1.75377 16.9649 1.83856 16.9023 1.90107C16.8398 1.96358 16.7551 1.9987 16.6666 1.9987Z"
              stroke="#003B1B" />
          </svg>
          <span>Shop bio:cule</span>
        </a>
      </div>

      <div class="drawer__list--categories">
        <div class="drawer__list--categories-header">categories</div>
        <div class="drawer__list--category">

          <?php
          $navMenuArray = wp_get_nav_menu_items("sticky-menu-options");
          foreach ($navMenuArray as $navMenuItem) { ?>
          <div class="drawer__list--category-items">
            <a href="<?php echo $navMenuItem->url; ?>">
              <p><?php echo $navMenuItem->title; ?></p>
            </a>
            <span>
              <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.60156 9.60156L12.0016 15.0016L17.4016 9.60156H6.60156Z"></path>
              </svg>
            </span>
          </div>

          <?php }
          ?>

          <!-- <ul class="drawer__list--category-list active">
            <a href=".">
              <li class="drawer__list--category-list-item">skincare</li>
            </a>

            <li class="drawer__list--category-list-item">
              <a href="<?php echo $categoryPageLink; ?>">
                <p>All from Skin</p>
                <span>
                  <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.60156 9.60156L12.0016 15.0016L17.4016 9.60156H6.60156Z"></path>
                  </svg>
                </span>
              </a>
            </li>
          </ul> -->
        </div>

      </div>
    </div>
  </nav>

  <div class="overlay hidden"></div>
  <div class="drawer__closeicon hidden">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path
        d="M13.4,12l6.3-6.3c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0c-0.4,0.4-0.4,1,0,1.4l6.3,6.3l-6.3,6.3C4.1,18.5,4,18.7,4,19c0,0.6,0.4,1,1,1c0.3,0,0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.4,0.3,0.7,0.3s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L13.4,12z">
      </path>
    </svg>
  </div>







  <div class="search-overlay search-overlay-hidden">
    <div class="search-overlay__elements">
      <div class="search-overlay__backicon">
        <svg width="24" height="24" viewBox="0 0 24 24" class="rotate-90 scale-125 transform cursor-pointer"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M6.60156 9.60156L12.0016 15.0016L17.4016 9.60156H6.60156Z" class="fill-current"></path>
        </svg>
      </div>
      <div class="search-overlay__form">
        <input type="text" placeholder="Search for blogs..." autocomplete="off" id='search-term' />
      </div>
    </div>

    <div class="search-overlay__container">
      <div class="search-overlay__results">

      </div>
    </div>
  </div>