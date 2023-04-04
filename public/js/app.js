// public/js/app.js
import "alpinejs";
import "bootstrap";
import "swiper";

// Laravel-mix specific code is removed
mix.js("resources/js/app.js", "public/js").sass(
  "resources/sass/app.scss",
  "public/css"
);

console.log();