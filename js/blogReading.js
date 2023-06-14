/*
=====================================================
revealing article section with scroll (smoothly)
=====================================================
*/

const articleContainer = document.querySelector(".article");

const articleRevealSection = function (entries, observer) {
  const [entry] = entries;

  if (!entry.isIntersecting) return;

  entry.target.classList.add("reveal-article-section");
  observer.unobserve(entry.target);
};

const articleSectionObserver = new IntersectionObserver(articleRevealSection, {
  root: null,
  threshold: 0.01,
});

articleSectionObserver.observe(articleContainer);

/*
============================================
blog reading scrolled menu bar
============================================
*/
//below function will run after DOM content is loaded
window.addEventListener("DOMContentLoaded", () => {
  const scrolledPopupListContainer = document.querySelector(
    ".scroll__bar--content-list"
  );
  const scrolledBarContentHeaderListcount = document.querySelector(
    ".scroll__bar--content-header-count-listcount"
  );
  const articleIndexListContainer = document.querySelector(
    ".article__index--list"
  );
  const timeLeftElement = document.querySelector(".scroll__bar--content-time");
  const heroCardDetailsContainer = document.querySelector(".hero__card--dates");

  const scrolledBarContentHeaderTitle = document.querySelector(
    ".scroll__bar--content-header-title"
  );
  const scrolledBarContentHeaderIndex = document.querySelector(
    ".scroll__bar--content-header-count-index"
  );

  const articleIndexListLength = articleIndexListContainer.childNodes.length;
  scrolledBarContentHeaderListcount.textContent = articleIndexListLength;

  const heroCardTimeToRead =
    heroCardDetailsContainer.lastElementChild.textContent;
  timeLeftElement.textContent = heroCardTimeToRead;

  //creating the dynamic popup for the reading scrolled bar
  articleIndexListContainer.childNodes.forEach((element, index) => {
    let anchorElementHref = element
      .getElementsByTagName("a")[0]
      .getAttribute("href");
    let anchorElementTextcontent = element.textContent;

    const newListElement = `
    <li class="scroll__bar--content-list-item">
      <div class="scroll__bar--content-list-item-container">
          <a href="${anchorElementHref}">${anchorElementTextcontent}</a>
      </div>
    </li>
    `;

    scrolledPopupListContainer.insertAdjacentHTML("beforeend", newListElement);
  });

  //showing and hiding of the reading navigation popup
  const scrolledNavigationPopupIconContainer = document.querySelector(
    ".scroll__bar--content-header--icon"
  );
  const scrolledNavigationPopupContainer = document.querySelector(
    ".scroll__bar--content-list"
  );

  scrolledNavigationPopupIconContainer.addEventListener("click", () => {
    scrolledNavigationPopupIconContainer.firstElementChild.classList.toggle(
      "scroll__bar--content-header--icon-rotate"
    );
    scrolledNavigationPopupContainer.classList.toggle("hidden");
  });

  //----------------------------------------------------------------------------------------------------------------------------------------------------------------------
  let scrolledBarContentHeaderIndexNumber = 0;
  const articleScrolledNavigationIndexListHref = [];
  const articleReadingListContainers =
    document.querySelectorAll(".article__reading");
  const articleScrolledNavigationIndexList = document.querySelectorAll(
    ".scroll__bar--content-list-item-container"
  );
  articleScrolledNavigationIndexList.forEach((listItem, index) => {
    let listItemWithoutHash = listItem.firstElementChild.hash.replace("#", "");
    articleScrolledNavigationIndexListHref.push(listItemWithoutHash);
  });
  //----------------------------------------------------------------------------------------------------------------------------------------------------------------------

  // reading progress bar with changing timer in the blog reading scrolled progress bar
  const progressBar = document.querySelector(".scroll__progress");
  const blogReadingSection = document.querySelector(".article");
  const heroCardTimeToReadArray = heroCardTimeToRead.split(" ");
  let timeToReadNumber = Number(heroCardTimeToReadArray[0]);

  const initialBlogReadingTopDistance =
    blogReadingSection.getBoundingClientRect().top;

  document.addEventListener("scroll", () => {
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------
    let blogDistance = -blogReadingSection.getBoundingClientRect().top;
    let overallBlogDistance = blogDistance + initialBlogReadingTopDistance;
    let progressWidth =
      (overallBlogDistance /
        blogReadingSection.getBoundingClientRect().height) *
      100;
    let value = Math.floor(progressWidth);

    progressBar.style.width = `${value}%`;

    let timeLeft = Math.round(
      timeToReadNumber - (progressWidth / 100) * timeToReadNumber
    );

    timeLeftElement.innerHTML =
      timeLeft < 0 ? `0 min left` : `${timeLeft} min left`;
    //--------------------------------------------------------------------------------------------------------------------------------------------------------------
  });

  //logic to change the index number, title & classes in the blog reading navigation bar
  const articleReadingListReveal = function (entries, observer) {
    const [entry] = entries;

    if (entry.isIntersecting) {
      articleScrolledNavigationIndexListHref.forEach((listItem, index) => {
        if (entry.target.id === listItem) {
          scrolledBarContentHeaderIndexNumber =
            articleScrolledNavigationIndexListHref.indexOf(listItem);

          scrolledBarContentHeaderTitle.textContent =
            convertSlugToTitle(listItem);
          scrolledBarContentHeaderIndex.textContent =
            articleScrolledNavigationIndexListHref.indexOf(listItem) + 1;
          changeClassInTheIndexList(scrolledBarContentHeaderIndexNumber);
        }
      });
    }
  };

  const articleReadingListContainersObserver = new IntersectionObserver(
    articleReadingListReveal,
    {
      root: null,
      threshold: 0.2,
    }
  );

  articleReadingListContainers.forEach((readingSection, index) => {
    articleReadingListContainersObserver.observe(readingSection);
  });

  //changing the class in index list of blog reading menu bar
  const changeClassInTheIndexList = (indexNumber) => {
    articleScrolledNavigationIndexList.forEach((item) =>
      item.parentElement.classList.remove(
        "scroll__bar--content-list-item--showing"
      )
    );
    articleScrolledNavigationIndexList[indexNumber].parentElement.classList.add(
      "scroll__bar--content-list-item--showing"
    );
  };
});

//independent function converting the string ids into a proper string heading
const convertSlugToTitle = (string) => {
  let actualHeader = string.replace(/-/g, " ").toLowerCase();
  actualHeader = actualHeader.charAt(0).toUpperCase() + actualHeader.slice(1);
  actualHeader = actualHeader.replace(/\b\w/g, function (letter) {
    return letter.toUpperCase();
  });

  return actualHeader;
};

//showing and hiding the reading navigation bar
const mainNavigation = document.querySelector(".header");
const readingScrolledNavigation = document.querySelector(".scroll-menu");
const heroSectionImage = document.querySelector(".reading--hero");

const toggleNavbarMenu = function (entries, observer) {
  const [entry] = entries;

  if (!entry.isIntersecting) {
    mainNavigation.classList.add("header-hide");
    readingScrolledNavigation.classList.remove("hidden");
  } else {
    mainNavigation.classList.remove("header-hide");
    readingScrolledNavigation.classList.add("hidden");
  }
};

const toggleNavbarMenuObserver = new IntersectionObserver(toggleNavbarMenu, {
  root: null,
  threshold: 0.15,
});

toggleNavbarMenuObserver.observe(heroSectionImage);

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
// below code is repeated for 3 sections should be refactored in resuable functions
/*
=====================================================
carousel for the related section
=====================================================
*/
const relatedSlides = document.querySelectorAll(".related-carousel__card");
const relatedDotContainer = document.querySelector(".related-carousel__dots");

const relatedBtnLeft = document.querySelector(".related-left-arrow");
const relatedBtnRight = document.querySelector(".related-right-arrow");
let relatedTranslateXValue;

let relatedCurrentSlide = 0;
let relatedMaxSlide;
if (window.innerWidth < 768) {
  relatedMaxSlide = relatedSlides.length;
  relatedTranslateXValue = 105.8;
} else {
  relatedMaxSlide = relatedSlides.length - 2;
  relatedTranslateXValue = 105;
}

const relatedCreateDots = function () {
  const relatedSlidesArray = Array.from(relatedSlides);
  const relatedNewslides = relatedSlidesArray.splice(0, relatedMaxSlide);

  relatedNewslides.forEach((_, i) => {
    relatedDotContainer.insertAdjacentHTML(
      "beforeend",
      `
        <button class="related-carousel__dots--dot" data-slide="${i}"></button>
        `
    );
  });
};

const relatedActivateDot = function (slide) {
  document
    .querySelectorAll(".related-carousel__dots--dot")
    .forEach((dot) =>
      dot.classList.remove("related-carousel__dots--dot--active")
    );

  document
    .querySelector(`.related-carousel__dots--dot[data-slide="${slide}"]`)
    ?.classList.add("related-carousel__dots--dot--active");
};

const relatedGoToSlide = function (slide) {
  relatedSlides.forEach(
    (s, i) =>
      (s.style.transform = `translateX(-${relatedTranslateXValue * slide}%)`)
  );
};

const relatedNextSlide = function () {
  if (relatedCurrentSlide === relatedMaxSlide - 1) {
    relatedCurrentSlide = 0;
  } else {
    relatedCurrentSlide++;
  }
  relatedGoToSlide(relatedCurrentSlide);
  relatedActivateDot(relatedCurrentSlide);
};

const relatedPrevSlide = function () {
  if (relatedCurrentSlide === 0) {
    relatedCurrentSlide = relatedMaxSlide - 1;
  } else {
    relatedCurrentSlide--;
  }
  relatedGoToSlide(relatedCurrentSlide);
  relatedActivateDot(relatedCurrentSlide);
};

const relatedInit = function () {
  relatedGoToSlide(0);
  relatedCreateDots();
  relatedActivateDot(0);
};

relatedInit();

relatedBtnRight?.addEventListener("click", relatedNextSlide);
relatedBtnLeft?.addEventListener("click", relatedPrevSlide);

document.addEventListener("keydown", (e) => {
  if (e.key === "ArrowLeft") relatedPrevSlide();
  if (e.key === "ArrowRight") relatedNextSlide();
});

relatedDotContainer?.addEventListener("click", function (e) {
  if (e.target.classList.contains("related-carousel__dots--dot")) {
    const { slide } = e.target.dataset;

    relatedCurrentSlide = slide;
    relatedGoToSlide(slide);
    relatedActivateDot(slide);
  }
});

/*
=====================================================
carousel for the trending section
=====================================================
*/
const trendingSlides = document.querySelectorAll(".trending-carousel__card");
const trendingDotContainer = document.querySelector(".trending-carousel__dots");

const trendingBtnLeft = document.querySelector(".trending-left-arrow");
const trendingBtnRight = document.querySelector(".trending-right-arrow");
let trendingTranslateXValue;

let trendingCurrentSlide = 0;
let trendingMaxSlide;
if (window.innerWidth < 768) {
  trendingMaxSlide = trendingSlides.length;
  trendingTranslateXValue = 105.8;
} else {
  trendingMaxSlide = trendingSlides.length - 2;
  trendingTranslateXValue = 105;
}

const trendingCreateDots = function () {
  const trendingSlidesArray = Array.from(trendingSlides);
  const trendingNewslides = trendingSlidesArray.splice(0, trendingMaxSlide);

  trendingNewslides.forEach((_, i) => {
    trendingDotContainer.insertAdjacentHTML(
      "beforeend",
      `
        <button class="trending-carousel__dots--dot" data-slide="${i}"></button>
        `
    );
  });
};

const trendingActivateDot = function (slide) {
  document
    .querySelectorAll(".trending-carousel__dots--dot")
    .forEach((dot) =>
      dot.classList.remove("trending-carousel__dots--dot--active")
    );

  document
    .querySelector(`.trending-carousel__dots--dot[data-slide="${slide}"]`)
    ?.classList.add("trending-carousel__dots--dot--active");
};

const trendingGoToSlide = function (slide) {
  trendingSlides.forEach(
    (s, i) =>
      (s.style.transform = `translateX(-${trendingTranslateXValue * slide}%)`)
  );
};

const trendingNextSlide = function () {
  if (trendingCurrentSlide === trendingMaxSlide - 1) {
    trendingCurrentSlide = 0;
  } else {
    trendingCurrentSlide++;
  }
  trendingGoToSlide(trendingCurrentSlide);
  trendingActivateDot(trendingCurrentSlide);
};

const trendingPrevSlide = function () {
  if (trendingCurrentSlide === 0) {
    trendingCurrentSlide = trendingMaxSlide - 1;
  } else {
    trendingCurrentSlide--;
  }
  trendingGoToSlide(trendingCurrentSlide);
  trendingActivateDot(trendingCurrentSlide);
};

const trendingInit = function () {
  trendingGoToSlide(0);
  trendingCreateDots();
  trendingActivateDot(0);
};

trendingInit();

trendingBtnRight?.addEventListener("click", trendingNextSlide);
trendingBtnLeft?.addEventListener("click", trendingPrevSlide);

document.addEventListener("keydown", (e) => {
  if (e.key === "ArrowLeft") trendingPrevSlide();
  if (e.key === "ArrowRight") trendingNextSlide();
});

trendingDotContainer?.addEventListener("click", function (e) {
  if (e.target.classList.contains("trending-carousel__dots--dot")) {
    const { slide } = e.target.dataset;

    trendingCurrentSlide = slide;
    trendingGoToSlide(slide);
    trendingActivateDot(slide);
  }
});

/*
=====================================================
carousel for the you may also read section
=====================================================
*/
const crosspostsSlides = document.querySelectorAll(
  ".crossposts-carousel__card"
);
const crosspostsDotContainer = document.querySelector(
  ".crossposts-carousel__dots"
);

const crosspostsBtnLeft = document.querySelector(".crossposts-left-arrow");
const crosspostsBtnRight = document.querySelector(".crossposts-right-arrow");
let crosspostsTranslateXValue;

let crosspostsCurrentSlide = 0;
let crosspostsMaxSlide;
if (window.innerWidth < 768) {
  crosspostsMaxSlide = crosspostsSlides.length;
  crosspostsTranslateXValue = 105.8;
} else {
  crosspostsMaxSlide = crosspostsSlides.length - 2;
  crosspostsTranslateXValue = 105;
}

const crosspostsCreateDots = function () {
  const crosspostsSlidesArray = Array.from(crosspostsSlides);
  const crosspostsNewslides = crosspostsSlidesArray.splice(
    0,
    crosspostsMaxSlide
  );

  crosspostsNewslides.forEach((_, i) => {
    crosspostsDotContainer.insertAdjacentHTML(
      "beforeend",
      `
        <button class="crossposts-carousel__dots--dot" data-slide="${i}"></button>
        `
    );
  });
};

const crosspostsActivateDot = function (slide) {
  document
    .querySelectorAll(".crossposts-carousel__dots--dot")
    .forEach((dot) =>
      dot.classList.remove("crossposts-carousel__dots--dot--active")
    );

  document
    .querySelector(`.crossposts-carousel__dots--dot[data-slide="${slide}"]`)
    ?.classList.add("crossposts-carousel__dots--dot--active");
};

const crosspostsGoToSlide = function (slide) {
  crosspostsSlides.forEach(
    (s, i) =>
      (s.style.transform = `translateX(-${crosspostsTranslateXValue * slide}%)`)
  );
};

const crosspostsNextSlide = function () {
  if (crosspostsCurrentSlide === crosspostsMaxSlide - 1) {
    crosspostsCurrentSlide = 0;
  } else {
    crosspostsCurrentSlide++;
  }
  crosspostsGoToSlide(crosspostsCurrentSlide);
  crosspostsActivateDot(crosspostsCurrentSlide);
};

const crosspostsPrevSlide = function () {
  if (crosspostsCurrentSlide === 0) {
    crosspostsCurrentSlide = crosspostsMaxSlide - 1;
  } else {
    crosspostsCurrentSlide--;
  }
  crosspostsGoToSlide(crosspostsCurrentSlide);
  crosspostsActivateDot(crosspostsCurrentSlide);
};

const crosspostsInit = function () {
  crosspostsGoToSlide(0);
  crosspostsCreateDots();
  crosspostsActivateDot(0);
};

crosspostsInit();

crosspostsBtnRight?.addEventListener("click", crosspostsNextSlide);
crosspostsBtnLeft?.addEventListener("click", crosspostsPrevSlide);

document.addEventListener("keydown", (e) => {
  if (e.key === "ArrowLeft") crosspostsPrevSlide();
  if (e.key === "ArrowRight") crosspostsNextSlide();
});

crosspostsDotContainer?.addEventListener("click", function (e) {
  if (e.target.classList.contains("crossposts-carousel__dots--dot")) {
    const { slide } = e.target.dataset;

    crosspostsCurrentSlide = slide;
    crosspostsGoToSlide(slide);
    crosspostsActivateDot(slide);
  }
});
