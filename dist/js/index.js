const slidersInit=()=>{const e=document.querySelectorAll(".slider");e.forEach(e=>{var t=e.querySelector(".my-slider"),e=e.querySelector(".slider__control");tns({container:t,items:1,slideBy:"page",autoplay:!1,nav:!1,gutter:20,edgePadding:-20,responsive:{767:{items:2,gutter:20,edgePadding:0},992:{items:3,gutter:20,edgePadding:0}},controlsContainer:e})})};document.querySelectorAll(".my-slider")&&slidersInit();