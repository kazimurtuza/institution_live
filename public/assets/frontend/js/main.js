$(document).ready(function () {
  // ********** Off-canvas Open/Close **********
  $("body").on("click", function (e) {
    if ($(".mbl-offcanvas").hasClass("offcanvas-active")) {
      // Mobile Offcanvas Close
      if ($(e.target).is($(".mbl-offcanvas__close"))) {
        $(".mbl-offcanvas").removeClass("offcanvas-active");
      }

      // Close if clicked outside of the offcanvas
      if (!$(e.target).closest(".mbl-offcanvas").length) {
        $(".mbl-offcanvas").removeClass("offcanvas-active");
        console.log("Raihan");
      } else {
        console.log("error");
      }
    }

    // Mobile Offcanvas Open
    if ($(e.target).is($(".offcanvas-trigger"))) {
      $(".mbl-offcanvas").addClass("offcanvas-active");
    }
  });

  // ********** Cards Carousel **********
  $(".design01 .carousel").slick({
    autoplay: true,
    dots: false,
    cssEase: "linear",
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 300,
    touchThreshold: 40,
    swipeToSlide: true,
    prevArrow: $(".design01 .prev-trigger"),
    nextArrow: $(".design01 .next-trigger"),

    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });

  $(".st-testimonials__carousel").slick({
    autoplay: true,
    dots: true,
    arrows: false,
    cssEase: "linear",
    slidesToShow: 2,
    slidesToScroll: 1,
    speed: 300,
    touchThreshold: 40,
    swipeToSlide: true,
  });

  // ******************** FAQ ******************
  $(".collapse__trigger").on("click", function () {
    $(this).parents(".faq__item").toggleClass("active-collpse");
    $(this).next(".faq__item__body").slideToggle();
  });

  // ********** Tab **********
  let defaultTab = $(".tab-trigger.active-tab").data("target");
  $(defaultTab).show();
  $(".tab-trigger").on("click", function (e) {
    e.preventDefault();
    let tabTarget = $(this).data("target");

    $(this).siblings().removeClass("active-tab");
    $(this).addClass("active-tab");

    $(".tab-content").hide();
    $(tabTarget).show();
  });

  // Upload Profile Photo
  $("#profile-photo").on("change", function (e) {
    let file = e.target.files[0];
    let reader = new FileReader();

    reader.onloadend = () => {
      $(".tab-content__upload-preview img").attr("src", reader.result);
      $(".dashboard__profile-pic img").attr("src", reader.result);
    };
    reader.readAsDataURL(file);
  });

  // Show/Hide Password
  $(".password-toggler").on("click", function (e) {
    e.preventDefault();
    $(this).find(".password-eye__close").toggle();
    $(this)
      .next(".password-input")
      .attr("type", (_, attr) => (attr === "password" ? "text" : "password"));
  });

  // Verification Fields
  $(".verification-fields .form__input").on("keyup", function () {
    if (this.value.length > this.maxLength)
      this.value = this.value.slice(0, this.maxLength);

    if ($(this).val()) {
      $(this).next(".form__input").trigger("focus");
    }
  });

  $('.modal-close').on('click', function(){
    $(this).parents('.rate-now-modal').hide();
  })
  $('.btn-rate-now').on('click', function(e){
    e.preventDefault();
    let target = $(this).attr('href');
    $(target).show();
  })
});
