<?php
header('content-type:text/css');

$est = parse_ini_file("../site-estilos.ini");

$colorPrincipal = $est["color.principal"];
$colorSecundario = $est["color.secundario"];
$fechaNavbar = $est["imagen.navbar.flecha"];
$logo = $est["imagen.logo"];



echo <<<FINCSS

body {
    margin: 0px;
    height: 100%;
    overflow-x: hidden;
    font-family: "fira", Helvetica, Arial, Sans-Serif;
}

.teaser-circle {
    color: #ffffff;
    font-family: "Arial";
    text-align: center;
    display: block;
    height: 325px;
    width: 325px;
    position: absolute;
    bottom: 10%;
    left: 10%;
    padding: 53px 15px 68px 15px;
    background: url(../img/web/background-teaser-circle-grey.png) no-repeat center center;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    filter: progid: DXImageTransform.Microsoft.AlphaImageLoader(src='../img/web/background-teaser-circle-grey.png', sizingMethod='scale');
    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../img/web/background-teaser-circle-grey.png', sizingMethod='scale')";
    transition: transform 1s ease-out;
}

.teaser-circle.teaser-circle-font {
    color: #ffffff;
    font-family: "Arial";
}

.teaser-circle.teaser-circle-blue {
    bottom: 50px;
    left: auto;
    left: 2%;
    cursor: pointer;
    transform: scale(1);
    transition-duration: 0.3s;
    background-image: url(../img/web/background-teaser-circle-blue.png);
    filter: progid: DXImageTransform.Microsoft.AlphaImageLoader(src='../img/web/background-teaser-circle-blue.png', sizingMethod='scale');
    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../img/web/background-teaser-circle-blue.png', sizingMethod='scale')";
}

.teaser-circle.teaser-circle-blue:hover {
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    -ms-transform: scale(1.05);
    -o-transform: scale(1.05);
    transform: scale(1.05);
    -webkit-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    -o-transition: all 0.2s ease;
    -ms-transition: all 0.2s ease;
    transition-duration: 0.3s;
}

.teaser-circle.teaser-circle-green {
    bottom: 50px;
    left: auto;
    right: 2%;
    cursor: pointer;
    transform: scale(1);
    transition-duration: 0.3s;
    background-image: url(../img/web/background-teaser-circle-green.png);
    filter: progid: DXImageTransform.Microsoft.AlphaImageLoader(src='../img/web/background-teaser-circle-green.png', sizingMethod='scale');
    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../img/web/background-teaser-circle-green.png', sizingMethod='scale')";
}

.teaser-circle.teaser-circle-green:hover {
    -webkit-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    -o-transition: all 0.2s ease;
    -ms-transition: all 0.2s ease;
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    -ms-transform: scale(1.05);
    -o-transform: scale(1.05);
    transform: scale(1.05);
    transition-duration: 0.3s;
}

.hr {
    line-height: 1px;
    font-size: 1px;
    height: 1px;
    display: block;
    margin: 20px;
    border: 0;
    border-top: 1px solid #eeeeee;
}

.sep-15 {
    display: block;
    height: 15px;
    line-height: 15px;
    font-size: 15px;
}

.sep-20 {
    display: block;
    height: 20px;
    line-height: 20px;
    font-size: 20px;
}

.clear {
    clear: both;
    line-height: 1px;
    font-size: 1px;
    height: 1px;
    display: block;
}

.background-white {
    background-color: #ffffff;
}


/* MOBILE */

@media only screen and (max-width: 767px) {
    .remove-mobile {
        display: none;
    }
}

@media only screen and (min-width: 767px) {
    .remove-pantalla {
        display: none;
    }
}

footer {
    color: #fff
}

footer h3 {
    margin-bottom: 30px
}

footer .footer-above {
    padding-top: 50px;
    background-color: $colorPrincipal;
}

footer .footer-col {
    margin-bottom: 50px
}

footer .footer-col>p>a {
    color: #fff;
    text-decoration: none;
}

footer .footer-below {
    padding: 25px 0;
    background-color: $colorSecundario;
}

.btn-outline {
    color: #fff;
    font-size: 20px;
    border: 2px solid #fff;
    background: 0 0;
    transition: all .3s ease-in-out;
    margin-top: 15px
}

.btn-outline.active,
.btn-outline:active,
.btn-outline:focus,
.btn-outline:hover {
    color: #18BC9C;
    background: #fff;
    border: 2px solid #fff
}

.btn-primary {
    color: #fff;
    background-color: #2C3E50;
    border-color: #2C3E50;
    font-weight: 700
}

.btn-primary.active,
.btn-primary:active,
.btn-primary:focus,
.btn-primary:hover,
.open .dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #1a242f;
    border-color: #161f29
}

.btn-social {
    display: inline-block;
    height: 50px;
    width: 50px;
    border: 2px solid #fff;
    border-radius: 100%;
    text-align: center;
    font-size: 20px;
    line-height: 45px
}


/* Icons  - Sprite */

.icon-sprite {
    background-image: url("../img/web/icon-sprite_x2.png");
    background-size: auto 186px;
    background-repeat: no-repeat;
    display: inline-block;
}

.icon-sprite-30,
.icon-sprite-30:hover,
.icon-sprite-30:active,
.icon-sprite-30:visited {
    text-decoration: none;
    line-height: 30px;
    width: 30px;
    height: 30px;
}

.icon-sprite-35,
.icon-sprite-35:hover,
.icon-sprite-35:active,
.icon-sprite-35:visited {
    text-decoration: none;
    line-height: 35px;
    width: 35px;
    height: 35px;
}

.icon-sprite-48,
.icon-sprite-48:hover,
.icon-sprite-48:active,
.icon-sprite-48:visited {
    text-decoration: none;
    line-height: 48px;
    width: 48px;
    height: 48px;
}

.icon-sprite-65,
.icon-sprite-65:hover,
.icon-sprite-65:active,
.icon-sprite-65:visited {
    text-decoration: none;
    line-height: 65px;
    width: 65px;
    height: 65px;
}

.icon-sprite-85,
.icon-sprite-85:hover,
.icon-sprite-85:active,
.icon-sprite-85:visited {
    text-decoration: none;
    line-height: 85px;
    width: 85px;
    height: 85px;
}


/* gender icons - 30 pixel height */

.icon-sex-woman-30 {
    background-position: -1120px 0px;
    margin-right: 2px;
}

.icon-sex-woman-30.active {
    background-position: -1120px -66px;
}

.icon-sex-man-30 {
    background-position: -1049px 0px;
    margin-right: 2px;
}

.icon-sex-man-30.active {
    background-position: -1049px -66px;
}

.icon-sex-child-30 {
    background-position: -3675px 0px;
    margin-right: 2px;
}

.icon-sex-child-30.active {
    background-position: -3675px -66px;
}


/* Social Icons - 48 pixel height */

.icon-facebook-48 {
    background-position: 0px 0px;
}

.icon-facebook-48:hover {
    background-position: 0px -66px;
}

.icon-twitter-48 {
    background-position: -70px 0px;
}

.icon-twitter-48:hover {
    background-position: -70px -66px;
}

.icon-instagram-48 {
    background-position: -140px 0px;
}

.icon-instagram-48:hover {
    background-position: -140px -66px;
}

.icon-youtube-48 {
    background-position: -210px 0px;
}

.icon-youtube-48:hover {
    background-position: -210px -66px;
}

.icon-pinterest-48 {
    background-position: -3815px 0px;
}

.icon-pinterest-48:hover {
    background-position: -3815px -66px;
}


/* Menu  - 48 pixel height */

.icon-menu-48 {
    background-position: -420px 0px;
}

.icon-menu-48:hover,
.icon-menu-48.active {
    background-position: -420px -66px;
}

.icon-menu-top-48 {
    background-position: -420px 0px;
    margin-top: 10px;
}

.icon-menu-search-48 {
    background-position: -490px 0px;
}

.icon-menu-search-48:hover,
.icon-menu-search-48.active {
    background-position: -490px -66px;
}

.icon-menu-favorite-48 {
    background-position: -560px 0px;
    position: relative;
}

.icon-menu-favorite-48:hover,
.icon-menu-favorite-48.active {
    background-position: -560px -66px;
}

.icon-menu-favorite-48 span.digit,
.icon-menu-favorite-48.active span.digit {
    position: absolute;
    top: 0;
    left: 15px;
    font-size: 1.6em;
    color: #fff;
}

.icon-menu-faq-48 {
    background-position: -630px 0px;
}

.icon-menu-faq-48:hover {
    background-position: -630px -66px;
}

.icon-menu-storelocator-48 {
    background-position: -700px 0px;
}

.icon-menu-storelocator-48:hover {
    background-position: -700px -66px;
}

.icon-arrow-left-48 {
    background-position: -1532px 0;
}


/* Side Menu - */

.icon-location-30 {
    background-position: -1995px 2px;
}

.icon-favorite-close-30 {
    background-position: -2695px 0px;
}

.icon-favorite-close-30:hover {
    background-position: -2695px -66px;
}

.icon-sidenav-arrow-left-30 {
    background-position: -2764px 0px;
}

.icon-sidenav-arrow-left-30:hover {
    background-position: -2764px -66px;
}

.icon-sidenav-arrow-right-30 {
    background-position: -2813px 0px;
}

.icon-sidenav-arrow-right-30:hover {
    background-position: -2813px -66px;
}

.icon-sidenav-arrow-down-30 {
    background-position: -2960px 10px;
}

.icon-sidenav-arrow-down-30:hover,
.icon-sidenav-arrow-down-30.active {
    background-position: -2960px -56px;
}

.icon-sidenav-arrow-up-30 {
    background-position: -2891px 10px;
}

.icon-sidenav-arrow-up-30:hover,
.icon-sidenav-arrow-up-30.active {
    background-position: -2891px -56px;
}


/* Social Icons - 30 pixel height */

.icon-facebook-30 {
    background-position: -280px 0px;
}

.icon-facebook-30:hover {
    background-position: -280px -66px;
}

.icon-twitter-30 {
    background-position: -350px 0px;
}

.icon-twitter-30:hover {
    background-position: -350px -66px;
}

.icon-menu-info-48 {
    background-position: -3115px 0px;
}

.icon-menu-info-48:hover,
.icon-menu-info-48.active {
    background-position: -3115px -66px;
}

.icon-menu-faq-letters-48 {
    background-position: -4025px 0px;
}

.icon-menu-faq-letters-48:hover,
.icon-menu-faq-letters-48.active {
    background-position: -4025px -66px;
}

.h1f {
    font-size: 3.5em;
    margin-bottom: 0.35em;
    text-align: center;
}

.link-product {
    display: block;
    float: left;
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
}

.image-results {
    display: block;
    float: left;
    width: 100%;
    height: auto;
}

.link-product img:last-child {
    display: none;
}

.link-product:hover img:first-child {
    display: none;
}

.link-product:hover img:last-child {
    display: inline-block
}

.product-item {
    display: block;
    float: center;
    height: 100%;
    padding: 20px 20px 20px 20px;
    margin: 0px 0px 30px 15px;
    border: 0.5px solid #d7d7d7;
    background-color: #f8faff;
}

.product-item:hover {
    border: 0.5px solid #d7d7d7;
    box-shadow: 1px 3px $colorPrincipal;
    /*border: 2px solid red;*/
}

.product-name-results {
    display: block;
    float: left;
    width: 100%;
    height: auto;
    font-size: 1.5em;
    text-align: center;
    line-height: 1em;
    margin: 0px 0px;
    padding: 0px 0px 0px 0px;
    color: $colorPrincipal;
    font-weight: bold;
    margin-top: 5px;
}

.product-code-results {
    display: block;
    float: left;
    width: 100%;
    height: auto;
    font-size: 0.9em;
    text-align: center;
    line-height: 1.3em;
    margin: 0px 0px;
    padding: 0px 0px;
}

.product-model-results {
    display: block;
    float: left;
    width: 100%;
    height: auto;
    font-size: 1.2em;
    text-align: center;
    line-height: 1.3em;
    margin: 0px 0px;
    padding: 0px 0px;
}

.product-price-results {
    display: block;
    float: left;
    width: 100%;
    height: auto;
    margin: 0px 0px;
    padding: 0px 0px;
    font-size: 1.3em;
    text-align: center;
    font-weight: bold;
}

.texto-cabezera-der {
    position: absolute;
    right: 65px;
    color: white;
    top: 50%;
    text-transform: uppercase;
    margin-top: -20px;
    font-size: 40px;
    cursor: default;
    text-shadow: black 0.1em 0.1em 0.2em
}

.texto-cabezera-izq {
    position: absolute;
    left: 80px;
    color: white;
    top: 50%;
    text-transform: uppercase;
    margin-top: -20px;
    font-size: 40px;
    cursor: default;
    text-shadow: black 0.1em 0.1em 0.2em
}

.tit-inicio {
    text-transform: uppercase;
    width: 100%;
    text-align: center;
    position: relative;
    font-weight: bolder;
    font-size: 16px;
}

.tit-inicio div:not(:last-child) {
    background: white;
    width: 200px;
    margin: 0 auto;
    z-index: 800;
    position: inherit;
}

.tit-inicio h3 {
    color: #ccc;
    cursor: default;
    font-weight: bolder;
    font-size: 16px;
    z-index: 900;
}

.linea {
    top: 7px;
    left: 0px;
    border-top: 2px solid $colorPrincipal
}

.seccionProductos,
.seccionCuidados {
    position: relative;
    text-align: left;
}

.seccionProductos div {
    max-width: 100%;
    padding: 0;
}

.seccionProductos h1 {
    position: absolute;
    bottom: 15px;
    text-shadow: 2px 0px 2px grey;
    color: white;
    text-transform: uppercase;
    font-size: 42px;
    font-style: normal;
    left: 0px;
    width: 100%;
    font-weight: bold;
}

.seccionProductos a {
    text-decoration: none;
}


/* Slider */

.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider {
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
    touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list {
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}

.slick-list:focus {
    outline: none;
}

.slick-list.dragging {
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}

.slick-track {
    position: relative;
    top: 0;
    left: 0;
    display: block;
}

.slick-track:before,
.slick-track:after {
    display: table;
    content: '';
}

.slick-track:after {
    clear: both;
}

.slick-loading .slick-track {
    visibility: hidden;
}

.slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}

[dir='rtl'] .slick-slide {
    float: right;
}

.slick-slide img {
    display: block;
}

.slick-slide.slick-loading img {
    display: none;
}

.slick-slide.dragging img {
    pointer-events: none;
}

.slick-initialized .slick-slide {
    display: block;
}

.slick-loading .slick-slide {
    visibility: hidden;
}

.slick-vertical .slick-slide {
    display: block;
    height: auto;
    border: 1px solid transparent;
}

.slick-arrow.slick-hidden {
    display: none;
}


/*nuestro equipo*/

.team-block {
    position: relative;
    float: left;
    width: 100%;
    padding-right: 30px;
    overflow: hidden;
}

.team-img {
    position: relative;
    float: left;
}

.team-text {
    position: relative;
    float: left;
    padding: 10px 0px 84px 30px;
    width: 50%;
}

.team-text i {
    position: relative;
    float: left;
    width: 100%;
    padding-bottom: 5px;
    font-family: 'Libre Baskerville', serif;
    font-size: 18px;
}

.line {
    position: relative;
    float: left;
    width: 25px;
    height: 1px;
    background: #584a46;
}

.team-text h5 {
    position: relative;
    float: left;
    width: 100%;
    padding-top: 5px;
    font-size: 14px;
    line-height: 22px;
    font-weight: 400;
    text-transform: uppercase;
}

.team-text p {
    position: relative;
    float: left;
    width: 100%;
    padding-top: 40px;
    font-weight: 500;
    font-size: 14px;
    line-height: 25px;
    color: #6b6b6b;
}

.team-text a {
    position: absolute;
    bottom: 0px;
    font-size: 13px;
    color: #42413e;
    left: 30px;
    width: 100%;
    padding-bottom: 25px;
    border-bottom: 1px solid #000;
}

.team-text a:hover {
    color: #b1b1b1;
}

.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #000 \9;
    background-color: rgba(0, 0, 0, 0);
    border: 2px solid $colorPrincipal;
    border-radius: 10px;
}

.navbar-inverse {
    background-color: $colorPrincipal;
}

.navbar-inverse:hover {
    background-color: $colorPrincipal;
    border-bottom: 5px solid $colorSecundario;
}

.navbar-inverse .navbar-toggle:focus {
    background-color: $colorSecundario;
}

.navbar-inverse .navbar-brand {
    color: #5e5959;
}

.navbar-inverse .navbar-brand:hover,
.navbar-inverse .navbar-brand:focus {
    color: #ffffff;
    background-color: rgba(255, 255, 255, 0.4);
}

.navbar-inverse .navbar-text {
    color: #ffffff;
}

.navbar-inverse .navbar-nav>li>a {
    color: #ffffff;
}

.navbar-inverse .navbar-nav>li>a:hover,
.navbar-inverse .navbar-nav>li>a:focus {
    background: url($fechaNavbar) bottom center no-repeat;
}

.navbar-inverse .navbar-nav>.active>a,
.navbar-inverse .navbar-nav>.active>a:hover,
.navbar-inverse .navbar-nav>.active>a:focus {
    color: #ffffff;
    background-color: none;
    content: "\25B2";
}

.navbar-inverse .navbar-brand:hover,
.navbar-inverse .navbar-brand:focus {
    color: #ffffff;
    background-color: $colorPrincipal;
}

.modal-danger .modal-header,
.modal-danger .modal-footer {
    border-color: $colorPrincipal;
    background-color: $colorPrincipal;
    color: white;
}

.modal-success .modal-header,
.modal-success .modal-footer {
    border-color: #00733e;
    background-color: #00733e;
    color: white;
}


/*loading*/

#loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9998;
}

#loader {
     display: block;
		position: relative;
		left: 50%;
		top: 50%;
		width: 150px;
		height: 150px;
		margin: -75px 0 0 -75px;
		border-radius: 50%;
		border: 3px solid transparent;
		border-top-color: #fff;

		-webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
		animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
		z-index: 9998;
}


/* MOBILE */

@media only screen and (max-width: 767px) {
    #loader {
        display: block;
		position: relative;
		left: 50%;
		top: 50%;
		width: 150px;
		height: 150px;
		margin: -75px 0 0 -75px;
		border-radius: 50%;
		border: 3px solid transparent;
		border-top-color: #fff;

		-webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
		animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
		z-index: 9998;
    }
}

#loader:before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #fff;
    -webkit-animation: spin 3s linear infinite;
    /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 3s linear infinite;
    /* Chrome, Firefox 16+, IE 10+, Opera */
}

#loader:after {
    content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #fff;
    -webkit-animation: spin 1.5s linear infinite;
    /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 1.5s linear infinite;
    /* Chrome, Firefox 16+, IE 10+, Opera */
}

@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(0deg);
        /* IE 9 */
        transform: rotate(0deg);
        /* Firefox 16+, IE 10+, Opera */
    }
    100% {
        -webkit-transform: rotate(360deg);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(360deg);
        /* IE 9 */
        transform: rotate(360deg);
        /* Firefox 16+, IE 10+, Opera */
    }
}

@keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(0deg);
        /* IE 9 */
        transform: rotate(0deg);
        /* Firefox 16+, IE 10+, Opera */
    }
    100% {
        -webkit-transform: rotate(360deg);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(360deg);
        /* IE 9 */
        transform: rotate(360deg);
        /* Firefox 16+, IE 10+, Opera */
    }
}

#loader-wrapper .loader-section {
    position: fixed;
    top: 0;
    width: 51%;
    height: 100%;
    background: $colorPrincipal;
    z-index: 1000;
    -webkit-transform: translateX(0);
    /* Chrome, Opera 15+, Safari 3.1+ */
    -ms-transform: translateX(0);
    /* IE 9 */
    transform: translateX(0);
    /* Firefox 16+, IE 10+, Opera */
}

#loader-wrapper .loader-section.section-left {
    left: 0;
}

#loader-wrapper .loader-section.section-right {
    right: 0;
}


/* Loaded */

.loaded #loader-wrapper .loader-section.section-left {
    -webkit-transform: translateX(-100%);
    /* Chrome, Opera 15+, Safari 3.1+ */
    -ms-transform: translateX(-100%);
    /* IE 9 */
    transform: translateX(-100%);
    /* Firefox 16+, IE 10+, Opera */
    -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
}

.loaded #loader-wrapper .loader-section.section-right {
    -webkit-transform: translateX(100%);
    /* Chrome, Opera 15+, Safari 3.1+ */
    -ms-transform: translateX(100%);
    /* IE 9 */
    transform: translateX(100%);
    /* Firefox 16+, IE 10+, Opera */
    -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
}

.loaded #loader {
    opacity: 0;
    -webkit-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
}

.loaded #loader-wrapper {
    visibility: hidden;
    -webkit-transform: translateY(-100%);
    /* Chrome, Opera 15+, Safari 3.1+ */
    -ms-transform: translateY(-100%);
    /* IE 9 */
    transform: translateY(-100%);
    /* Firefox 16+, IE 10+, Opera */
    -webkit-transition: all 0.3s 1s ease-out;
    transition: all 0.3s 1s ease-out;
}


/* JavaScript Turned Off */

.no-js #loader-wrapper {
    display: none;
}

.no-js h1 {
    color: $colorPrincipal;
}

#content {
    margin: 0 auto;
    padding-bottom: 50px;
    width: 80%;
    max-width: 978px;
}

.btn-sistema {
    color: #fff;
    background-color: $colorPrincipal;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-sistema:hover {
    color: #fff;
}


/* Actualizacion 2020 */

.pb-5,
.py-5 {
    padding-bottom: 3rem !important;
}

.mb-5,
.my-5 {
    margin-bottom: 3rem !important;
}

.justify-content-center {
    -webkit-box-pack: center !important;
    -ms-flex-pack: center !important;
    justify-content: center !important;
}

.no-gutters {
    margin-right: 0;
    margin-left: 0;
}

.no-gutters>.col,
.no-gutters>[class*="col-"] {
    padding-right: 0;
    padding-left: 0;
}

.fila {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.heading-section .subheading {
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 400;
    letter-spacing: 1px;
    color: $colorPrincipal;
}

.heading-section h2 {
    font-size: 34px;
    font-weight: 400;
}

@media (max-width: 767.98px) {
    .heading-section h2 {
        font-size: 28px;
    }
}

.d-none {
    display: none !important;
}

.d-inline {
    display: inline !important;
}

.d-inline-block {
    display: inline-block !important;
}

.d-block {
    display: block !important;
}

.block-6 {
    margin-bottom: 40px;
}

.d-table {
    display: table !important;
}

.d-table-row {
    display: table-row !important;
}

.d-table-cell {
    display: table-cell !important;
}

.d-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
}

.d-inline-flex {
    display: -webkit-inline-box !important;
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
}

@media (min-width: 576px) {
    .d-sm-none {
        display: none !important;
    }
    .d-sm-inline {
        display: inline !important;
    }
    .d-sm-inline-block {
        display: inline-block !important;
    }
    .d-sm-block {
        display: block !important;
    }
    .d-sm-table {
        display: table !important;
    }
    .d-sm-table-row {
        display: table-row !important;
    }
    .d-sm-table-cell {
        display: table-cell !important;
    }
    .d-sm-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }
    .d-sm-inline-flex {
        display: -webkit-inline-box !important;
        display: -ms-inline-flexbox !important;
        display: inline-flex !important;
    }
}

@media (min-width: 768px) {
    .d-md-none {
        display: none !important;
    }
    .d-md-inline {
        display: inline !important;
    }
    .d-md-inline-block {
        display: inline-block !important;
    }
    .d-md-block {
        display: block !important;
    }
    .d-md-table {
        display: table !important;
    }
    .d-md-table-row {
        display: table-row !important;
    }
    .d-md-table-cell {
        display: table-cell !important;
    }
    .d-md-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }
    .d-md-inline-flex {
        display: -webkit-inline-box !important;
        display: -ms-inline-flexbox !important;
        display: inline-flex !important;
    }
}

@media (min-width: 992px) {
    .d-lg-none {
        display: none !important;
    }
    .d-lg-inline {
        display: inline !important;
    }
    .d-lg-inline-block {
        display: inline-block !important;
    }
    .d-lg-block {
        display: block !important;
    }
    .d-lg-table {
        display: table !important;
    }
    .d-lg-table-row {
        display: table-row !important;
    }
    .d-lg-table-cell {
        display: table-cell !important;
    }
    .d-lg-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }
    .d-lg-inline-flex {
        display: -webkit-inline-box !important;
        display: -ms-inline-flexbox !important;
        display: inline-flex !important;
    }
}

@media (min-width: 1200px) {
    .d-xl-none {
        display: none !important;
    }
    .d-xl-inline {
        display: inline !important;
    }
    .d-xl-inline-block {
        display: inline-block !important;
    }
    .d-xl-block {
        display: block !important;
    }
    .d-xl-table {
        display: table !important;
    }
    .d-xl-table-row {
        display: table-row !important;
    }
    .d-xl-table-cell {
        display: table-cell !important;
    }
    .d-xl-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }
    .d-xl-inline-flex {
        display: -webkit-inline-box !important;
        display: -ms-inline-flexbox !important;
        display: inline-flex !important;
    }
}

@media print {
    .d-print-none {
        display: none !important;
    }
    .d-print-inline {
        display: inline !important;
    }
    .d-print-inline-block {
        display: inline-block !important;
    }
    .d-print-block {
        display: block !important;
    }
    .d-print-table {
        display: table !important;
    }
    .d-print-table-row {
        display: table-row !important;
    }
    .d-print-table-cell {
        display: table-cell !important;
    }
    .d-print-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }
    .d-print-inline-flex {
        display: -webkit-inline-box !important;
        display: -ms-inline-flexbox !important;
        display: inline-flex !important;
    }
}

.block-3 .text,
.block-3 .image {
    width: 100%;
    padding: 10% 7%;
    display: block;
}

@media (min-width: 768px) {
    .block-3 .text,
    .block-3 .image {
        width: 50%;
        padding: 10% 7%;
    }
}

.block-3 .text {
    background: #f8faff;
}

.block-3 .text .subheading {
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .1em;
    color: #a3c2d1;
}

.block-3 .text .heading {
    font-size: 30px;
    margin-bottom: 30px;
}

.block-3 .text .heading a {
    color: #404044;
}

.block-3 .text p:last-child {
    margin-bottom: 0;
}

.block-3 .image {
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
}

@media (max-width: 767.98px) {
    .block-3 .image {
        height: 300px;
    }
}

.order-0 {
    -webkit-box-ordinal-group: 1;
    -ms-flex-order: 0;
    order: 0;
}

.order-1 {
    -webkit-box-ordinal-group: 2;
    -ms-flex-order: 1;
    order: 1;
}

.order-2 {
    -webkit-box-ordinal-group: 3;
    -ms-flex-order: 2;
    order: 2;
}

.zoom {
    padding: 5px 5px;
    margin: 5px 5px;
    width: 400px;
    height: 300px;
}

.zoom a {
    display: block;
    overflow: hidden;
}

.zoom a img {
    width: 400px;
    height: 300px;
    transition: all 300ms ease;
}

.zoom a:hover img {
    transform: scale(1.1);
}

.to-top.fixed {
    opacity: 1;
    bottom: 30px;
}

.to-top {
    background: #fff none repeat scroll 0 0;
    bottom: -150px;
    color: $colorSecundario;
    display: block;
    font-size: 15px;
    height: 50px;
    line-height: 48px;
    opacity: 0;
    position: fixed;
    right: 30px;
    text-align: center;
    width: 50px;
    z-index: 333;
    overflow: hidden;
    -webkit-transition-duration: 0.5s;
    transition-duration: 0.5s;
    border-radius: 100px;
    border: 2px solid $colorSecundario;
}

.to-top:hover {
    background: $colorSecundario none repeat scroll 0 0;
    color: #fff;
}

.to-top:visited {
    background: #fff none repeat scroll 0 0;
    color: $colorSecundario;
}

.contact_info .info_item {
    position: relative;
    padding-left: 45px;
}

.contact_info .info_item i {
    position: absolute;
    left: 0;
    top: 0;
    font-size: 20px;
    line-height: 24px;
    color: $colorPrincipal;
    font-weight: 600;
}

.contact_info .info_item h6 {
    font-size: 16px;
    line-height: 24px;
    color: "Roboto", sans-serif;
    font-weight: bold;
    margin-bottom: 0px;
    color: #222222;
}

.contact_info .info_item h6 a {
    color: #222222;
}

.contact_info .info_item p {
    font-size: 14px;
    line-height: 24px;
    padding: 2px 0px;
}

.contact_form .form-group {
    margin-bottom: 10px;
}

.contact_form .form-group .form-control {
    font-size: 13px;
    line-height: 26px;
    color: #999;
    border: 1px solid #eeeeee;
    font-family: "Roboto", sans-serif;
    border-radius: 0px;
    padding-left: 20px;
}

.contact_form .form-group .form-control:focus {
    box-shadow: none;
    outline: none;
}

.contact_form .form-group .form-control.placeholder {
    color: #999;
}

.contact_form .form-group .form-control:-moz-placeholder {
    color: #999;
}

.contact_form .form-group .form-control::-moz-placeholder {
    color: #999;
}

.contact_form .form-group .form-control::-webkit-input-placeholder {
    color: #999;
}

.contact_form .form-group textarea {
    resize: none;
}

.contact_form .form-group textarea.form-control {
    height: 140px;
}

.contact_form .submit_btn {
    margin-top: 20px;
    cursor: pointer;
}

.responsiveContent {
    position: relative;
    height: 0;
    overflow: hidden;
    padding-bottom: 25%;
    margin-bottom: 20px;
    margin-left: 10px;
    margin-right: 10px;
}

.responsiveContent iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.p-2 {
    padding: 0.5rem !important;
}

.align-self-stretch {
    -ms-flex-item-align: stretch !important;
    align-self: stretch !important;
}

.media {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
}

.justify-content-center {
    -webkit-box-pack: center !important;
    -ms-flex-pack: center !important;
    justify-content: center !important;
}

.media-body {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
}

.block-6 {
    margin-bottom: 40px;
}

.services .media-body h3 {
    font-size: 17px;
    color: #000;
}

.block-6 .media-body p {
    font-size: 16px;
}

.pagination>li>a,
.pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: $colorPrincipal;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid $colorPrincipal;
}

.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: $colorPrincipal;
    border-color: $colorPrincipal;
}

.pagination>li>a:hover,
.pagination>li>span:hover,
.pagination>li>a:focus,
.pagination>li>span:focus {
    z-index: 2;
    color: $colorPrincipal;
    background-color: #eee;
    border-color: $colorPrincipal;
}

.panel-default {
    border-color: $colorPrincipal;
}

.panel-default>.panel-heading {
    color: #FFF;
    background-color: $colorPrincipal;
    border-color: #ddd;
}

.modal {
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, .3);
    position: fixed;
    top: 0;
    left: 0;
    display: none;
}

.ventana {
    width: 400px;
    height: 400px;
    background: #fff;
    text-align: center;
    position: absolute;
    top: 20%;
    left: -200px;
    margin-left: 50%;
}

.boton-abrir,
.boton-cerrar {
    margin: 15px;
    padding: 15px;
    font-size: 1.5em;
}

.modal {
    text-align: center;
    padding: 0!important;
}

.modal:before {
    content: '';
    display: inline-block;
    height: 100%;
    vertical-align: middle;
    margin-right: -4px;
}

.modal-dialog {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
}

.link-detalle {
    color: $colorPrincipal;
    text-decoration: none;
    background-color: #fff;
}

.link-detalle:hover {
    color: $colorPrincipal;
    text-decoration: none;
    background-color: #fff;
}

FINCSS;
?>