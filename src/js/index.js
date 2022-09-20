const slidersInit = () => {
  const sections = document.querySelectorAll(".slider");

  sections.forEach((section) => {
    const sliderContainer = section.querySelector(".my-slider");
    const controlsContainer = section.querySelector(".slider__control");

    const slider = tns({
      container: sliderContainer,
      items: 1,
      slideBy: "page",
      autoplay: false,
      nav: false,
      gutter: 20,
      edgePadding: -20,
      responsive: {
        767: {
          items: 2,
          gutter: 20,
          edgePadding: 0,
        },
        992: {
          items: 3,
          gutter: 20,
          edgePadding: 0,
        },
      },
      controlsContainer: controlsContainer,
    });
  });
};

if (document.querySelectorAll(".my-slider")) {
  slidersInit();
}
