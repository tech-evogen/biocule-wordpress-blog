"use strict";

/* 
================================================================
changing the order of popular reads (random on every page load)
================================================================
*/
const popularReadsContainer = document.querySelector(".popular__reads");
const popularReadsElements = document.querySelectorAll("#popularreads");

let cardsArray = Array.from(popularReadsElements);

const reshufflePopularReadsCards = function () {
  for (let i = cardsArray.length - 1; i > 0; i--) {
    let j = Math.floor(Math.random() * (i + 1));
    [cardsArray[i], cardsArray[j]] = [cardsArray[j], cardsArray[i]];
  }

  cardsArray.forEach((item) => popularReadsContainer.appendChild(item));
};

reshufflePopularReadsCards();

/* 
============================================
mobile menu drawer 
============================================ 
*/

const mobileMenuDrawer = document.querySelector(".mobile-menu-drawer");
const mobileMenuDrawerOverlay = document.querySelector(".overlay");
const mobileMenuDrawerHamburger = document.querySelector(
  ".menu__items--hamburger"
);
const mobileMenuDrawerClose = document.querySelector(".drawer__closeicon");

const openDrawer = function () {
  mobileMenuDrawer.classList.remove("hidden");
  mobileMenuDrawerOverlay.classList.remove("hidden");
  mobileMenuDrawerClose.classList.remove("hidden");
  document.body.style.overflowY = "hidden";
};

const closeDrawer = function () {
  mobileMenuDrawer.classList.add("hidden");
  mobileMenuDrawerOverlay.classList.add("hidden");
  mobileMenuDrawerClose.classList.add("hidden");
  document.body.style.overflow = "scroll";
};

mobileMenuDrawerHamburger.addEventListener("click", openDrawer);
mobileMenuDrawerClose.addEventListener("click", closeDrawer);
mobileMenuDrawerOverlay.addEventListener("click", closeDrawer);

document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && !mobileMenuDrawer.classList.contains("hidden")) {
    closeDrawer();
  }
});

/* 
============================================
accordion in mobile menu drawer
============================================ 
*/
// const drawerSubcategoryListItems = document.querySelectorAll(
//   ".drawer__list--category-list"
// );
// const drawerCategoryListItems = document.querySelectorAll(
//   ".drawer__list--category"
// );

// drawerCategoryListItems.forEach((drawerCategoryListItem, index) => {
//   drawerCategoryListItem.addEventListener("click", (event) => {
//     const listItem = drawerCategoryListItem.querySelector(
//       ".drawer__list--category-list"
//     );

//     if (listItem.classList.value.includes("active")) {
//       listItem.classList.remove("active");
//     } else {
//       listItem.classList.add("active");
//     }
//   });
// });

/* 
===============================================================
controlling the megamenu based on hover on main menu list item
===============================================================
*/

// const mainMenuListItem = document.querySelector(".menu__list--left-item");
// const megaMenu = document.querySelector(".megamenu");

// mainMenuListItem.addEventListener("mouseover", () => {
//   megaMenu.classList.add("megamenu-active");
// });

// mainMenuListItem.addEventListener("mouseout", () => {
//   megaMenu.classList.remove("megamenu-active");
// });

/* 
=====================================================
carousel for the homepage/category/subcategory pages
=====================================================
*/

const slides = document.querySelectorAll(".carousel__card");
const dotContainer = document.querySelector(".carousel__dots");

const btnLeft = document.querySelector(".left-arrow");
const btnRight = document.querySelector(".right-arrow");

let currentSlide = 0;
let maxSlide;
if (window.innerWidth < 768) {
  maxSlide = slides.length;
} else {
  maxSlide = slides.length - 2;
}

const createDots = function () {
  const slidesArray = Array.from(slides);
  const newslides = slidesArray.splice(0, maxSlide);

  newslides.forEach((_, i) => {
    dotContainer.insertAdjacentHTML(
      "beforeend",
      `
        <button class="carousel__dots--dot" data-slide="${i}"></button>
        `
    );
  });
};

const activateDot = function (slide) {
  document
    .querySelectorAll(".carousel__dots--dot")
    .forEach((dot) => dot.classList.remove("carousel__dots--dot--active"));

  document
    .querySelector(`.carousel__dots--dot[data-slide="${slide}"]`)
    ?.classList.add("carousel__dots--dot--active");
};

const goToSlide = function (slide) {
  slides.forEach(
    (s, i) => (s.style.transform = `translateX(-${106 * slide}%)`)
  );
};

const nextSlide = function () {
  if (currentSlide === maxSlide - 1) {
    currentSlide = 0;
  } else {
    currentSlide++;
  }
  goToSlide(currentSlide);
  activateDot(currentSlide);
};

const prevSlide = function () {
  if (currentSlide === 0) {
    currentSlide = maxSlide - 1;
  } else {
    currentSlide--;
  }
  goToSlide(currentSlide);
  activateDot(currentSlide);
};

const init = function () {
  goToSlide(0);
  createDots();
  activateDot(0);
};

init();

btnRight?.addEventListener("click", nextSlide);
btnLeft?.addEventListener("click", prevSlide);

document.addEventListener("keydown", (e) => {
  if (e.key === "ArrowLeft") prevSlide();
  if (e.key === "ArrowRight") nextSlide();
});

dotContainer?.addEventListener("click", function (e) {
  if (e.target.classList.contains("carousel__dots--dot")) {
    const { slide } = e.target.dataset;

    currentSlide = slide;
    goToSlide(slide);
    activateDot(slide);
  }
});

let activeIndex = 0;
let startX = null;
slides.forEach((slider, index) => {
  // slide.addEventListener("touchstart", (event) => {
  //   console.log("touchstart");
  //   console.log(event);
  //   console.log(event.touches);
  //   console.log(event.touches[0].clientX);
  //   startX = event.touches[0].clientX;
  // });
  // slide.addEventListener("touchmove", (event) => {
  //   console.log("touchmove");
  //   console.log(event);
  //   console.table(event.touches);
  //   const distanceX = event.touches[0].clientX - startX;
  //   console.log("distanceX", distanceX);
  //   const direction = distanceX > 0 ? -1 : 1;
  //   const nextIndex = activeIndex + direction;
  //   console.log("activeIndex", activeIndex);
  //   console.log("direction", direction);
  //   console.log("nextIndex", nextIndex);
  //   if (nextIndex >= 0 && nextIndex < maxSlide) {
  //     activateDot(nextIndex);
  //     activeIndex = nextIndex;
  //   }
  // });
  // slide.addEventListener("touchend", () => {
  //   startX = null;
  // });
  // let currentX = null;
  // slider.addEventListener("touchstart", (event) => {
  //   startX = event.touches[0].clientX;
  //   currentX = startX;
  // });
  // slider.addEventListener("touchmove", (event) => {
  //   currentX = event.touches[0].clientX;
  // });
  // slider.addEventListener("touchend", () => {
  //   const distanceX = currentX - startX;
  //   console.log(distanceX);
  // });
});

/* 
=====================================================
showing and hiding of the search overlay
=====================================================
*/
const searchOverlayContainer = document.querySelector(".search-overlay");
const mobileSearchIconContainer = document.querySelector(
  ".menu__items--icons-search"
);
const desktopSearchIconContainer = document.querySelector(
  ".desktop-menu-search"
);
const overlayBackIcon = document.querySelector(".search-overlay__backicon");

desktopSearchIconContainer.addEventListener("click", () => {
  searchOverlayContainer.classList.remove("search-overlay-hidden");
  document.body.style.overflowY = "hidden";
});

mobileSearchIconContainer.addEventListener("click", () => {
  searchOverlayContainer.classList.remove("search-overlay-hidden");
  document.body.style.overflowY = "hidden";
});

overlayBackIcon.addEventListener("click", () => {
  searchOverlayContainer.classList.add("search-overlay-hidden");
  document.body.style.overflow = "scroll";
});

/* 
=====================================================
search functionality (live search)
=====================================================
*/
const inputElement = document.querySelector("#search-term");
const searchResultsContainer = document.querySelector(
  ".search-overlay__results"
);

let searchTimer;
let isSpinnerVisible = false;
let previousSearchValue;

const getJSON = function (
  url,
  errorMessage = "Something went wrong please try again!"
) {
  return fetch(url).then((response) => {
    if (!response.ok) {
      throw new Error(`${errorMessage}`);
    }
    return response.json();
  });
};

const searchLogic = function () {
  if (inputElement.value !== previousSearchValue) {
    clearTimeout(searchTimer);

    if (inputElement.value) {
      if (!isSpinnerVisible) {
        searchResultsContainer.innerHTML = '<div class="loader"></div>';
        isSpinnerVisible = true;
      }
      searchTimer = setTimeout(getResults, 750);
    } else {
      searchResultsContainer.innerHTML = "";
      isSpinnerVisible = false;
    }
  }

  previousSearchValue = inputElement.value;
};

const getResults = function () {
  getJSON(
    `${blogData.root_url}/wp-json/wp/v2/posts?search=${inputElement.value}`,
    "Something went wrong please try again!"
  )
    .then((data) => {
      if (data.length > 0) {
        searchResultsContainer.innerHTML = "";
        data.forEach((blog) => {
          searchResultsContainer.insertAdjacentHTML(
            "beforeend",
            `
          <p>
            <a href=${blog.link}>${blog.title.rendered}</a>
          </p>
          `
          );
        });
      } else {
        searchResultsContainer.innerHTML = "";
        searchResultsContainer.insertAdjacentHTML(
          "beforeend",
          `
          <p>No blogs with the search term. Please try some another search term</p>
        `
        );
      }
    })
    .catch(() => {
      console.log(err);
      searchResultsContainer.innerHTML = `<p>Something went wrong Please try again!</p>`;
    })
    .finally(() => {
      isSpinnerVisible = false;
    });
};

inputElement.addEventListener("keyup", searchLogic);

/* 
=====================================================
revealing trending blogs with scroll (smoothly)
=====================================================
*/
const trendingContainer = document.querySelector(".trending");

const revealTrendingSection = function (entries, observer) {
  const [entry] = entries;

  if (!entry.isIntersecting) return;

  entry.target.classList.add("reveal-trending-section");
  observer.unobserve(entry.target);
};

const trendingSectionObserver = new IntersectionObserver(
  revealTrendingSection,
  {
    root: null,
    threshold: 0.15,
  }
);
if (trendingContainer !== null) {
  trendingSectionObserver.observe(trendingContainer);
}

/* 
=====================================================
revealing more blogs with scroll (smoothly)
=====================================================
*/

const moreblogsContainer = document.querySelector(".moreblogs");

const moreblogsRevealSection = function (entries, observer) {
  const [entry] = entries;

  if (!entry.isIntersecting) return;

  entry.target.classList.add("reveal-moreblogs-section");
  observer.unobserve(entry.target);
};

const moreblogsSectionObserver = new IntersectionObserver(
  moreblogsRevealSection,
  {
    root: null,
    threshold: 0.02,
  }
);
if (moreblogsContainer !== null) {
  moreblogsSectionObserver.observe(moreblogsContainer);
}

/* 
===============================================
pagination styling fix for mobile
===============================================
*/
window.addEventListener("DOMContentLoaded", () => {
  const pageNumbersItems = document.querySelectorAll(".page-numbers");

  if (window.innerWidth < 768 && pageNumbersItems.length === 11) {
    pageNumbersItems[3].remove();
    pageNumbersItems[7].remove();
  } else if (window.innerWidth < 768 && pageNumbersItems.length === 10) {
    let activePageNumberIndex;
    let dotsIndex;
    pageNumbersItems.forEach((item, index) => {
      if (item.classList.contains("current")) {
        activePageNumberIndex = index;
      }
      if (item.classList.contains("dots")) {
        dotsIndex = index;
      }
    });
    if (activePageNumberIndex > dotsIndex) {
      pageNumbersItems[dotsIndex + 1].remove();
    } else {
      pageNumbersItems[dotsIndex - 1].remove();
    }
  } else {
    return;
  }
});

console.log(screen.width);
