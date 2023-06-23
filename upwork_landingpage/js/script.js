const carousal = document.querySelector(".section_7_reviews_carousel");
const leftBtn = document.querySelector(".section_7_reviews_list_controls_left");
const rightBtn = document.querySelector(
  ".section_7_reviews_list_controls_right"
);
const list = document.querySelector(".section_7_reviews_list");

const onClickRight = () => {
  carousal.scrollTo(list.scrollWidth, 0);
  rightBtn.style.opacity = 0;
  leftBtn.style.opacity = 1;
};

const onClickLeft = () => {
  carousal.scrollTo(-list.scrollWidth, 0);
  rightBtn.style.opacity = 1;
  leftBtn.style.opacity = 0;
};
