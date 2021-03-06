!(function (o) {
  "use strict";
  o("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
    o("body").toggleClass("sidebar-toggled"),
      o(".sidebar").toggleClass("toggled"),
      o(".sidebar").hasClass("toggled") &&
        o(".sidebar .collapse").collapse("hide");
  }),
    o(window).resize(function () {
      o(window).width() < 768 && o(".sidebar .collapse").collapse("hide");
    }),
    o("body.fixed-nav .sidebar").on(
      "mousewheel DOMMouseScroll wheel",
      function (e) {
        if (o(window).width() > 768) {
          var l = e.originalEvent,
            t = l.wheelDelta || -l.detail;
          (this.scrollTop += 30 * (t < 0 ? 1 : -1)), e.preventDefault();
        }
      }
    ),
    o(document).on("scroll", function () {
      o(this).scrollTop() > 100
        ? o(".scroll-to-top").fadeIn()
        : o(".scroll-to-top").fadeOut();
    }),
    o(document).on("click", "a.scroll-to-top", function (e) {
      var l = o(this);
      o("html, body")
        .stop()
        .animate(
          { scrollTop: o(l.attr("href")).offset().top },
          1e3,
          "easeInOutExpo"
        ),
        e.preventDefault();
    });
})(jQuery);