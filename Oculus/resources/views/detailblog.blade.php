@php
    if(session()->has('patcing')){
        session(['patcing' => $_GET['tag']]);
    }else{
        session(['patcing' => 0]);
        $patcing = 0;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
    <link rel="apple-touch-startup-image" href="images/apple-touch-startup-image-640x920.png">
    <title>blix - mobile template</title>
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,900" rel="stylesheet">
  </head>
  <body id="mobile_wrap">
    <div class="panel-overlay"></div>
    <div class="panel panel-left panel-reveal">
      <!-- Slider -->
      <div class="swiper-container-subnav multinav">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <nav class="main_nav_underline">
              <ul>
                <li>
                  <a href="/">
                    <img src="images/icons/white/home.png" alt="" title="" />
                    <span>Home</span>
                  </a>
                </li>
                <li>
                  <a href="/">
                    <img src="images/icons/white/mobile.png" alt="" title="" />
                    <span>About</span>
                  </a>
                </li>
                <li>
                  <a href="/">
                    <img src="images/icons/white/features.png" alt="" title="" />
                    <span>Features</span>
                  </a>
                </li>
                <li>
                  <a href="#" data-popup=".popup-login" class="open-popup">
                    <img src="images/icons/white/lock.png" alt="" title="" />
                    <span>Login</span>
                  </a>
                </li>
                <li>
                  <a href="team.html">
                    <img src="images/icons/white/users.png" alt="" title="" />
                    <span>Team</span>
                  </a>
                </li>
                <li>
                  <a href="/blogd">
                    <img src="images/icons/white/blog.png" alt="" title="" />
                    <span>Blog</span>
                  </a>
                </li>
                <li>
                  <a href="photos.html">
                    <img src="images/icons/white/photos.png" alt="" title="" />
                    <span>Photos</span>
                  </a>
                </li>
                <li>
                  <a href="videos.html">
                    <img src="images/icons/white/video.png" alt="" title="" />
                    <span>Videos</span>
                  </a>
                </li>
                <li>
                  <a href="music.html">
                    <img src="images/icons/white/music.png" alt="" title="" />
                    <span>Music</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/shop.png" alt="" title="" />
                    <span>Shop</span>
                  </a>
                </li>
                <li class="subnav opensubnav">
                  <img src="images/icons/white/categories.png" alt="" title="" />
                  <span>Sub level menu</span>
                </li>
                <li>
                  <a href="cart.html">
                    <img src="images/icons/white/cart.png" alt="" title="" />
                    <span>Cart</span>
                  </a>
                </li>
                <li>
                  <a href="tables.html">
                    <img src="images/icons/white/tables.png" alt="" title="" />
                    <span>Tables</span>
                  </a>
                </li>
                <li>
                  <a href="form.html">
                    <img src="images/icons/white/form.png" alt="" title="" />
                    <span>Custom Form</span>
                  </a>
                </li>
                <li>
                  <a href="tel:012345678">
                    <img src="images/icons/white/phone.png" alt="" title="" />
                    <span>Call now!</span>
                  </a>
                </li>
                <li>
                  <a href="contact.html">
                    <img src="images/icons/white/contact.png" alt="" title="" />
                    <span>Contact</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="swiper-slide">
            <div class="subnav_header backtonav">
              <img src="images/icons/white/back.png" alt="" title="" />
              <span>BACK TO MAIN MENU</span>
            </div>
            <nav class="main_nav_underline">
              <ul>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/car.png" alt="" title="" />
                    <span>Cars</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/bus.png" alt="" title="" />
                    <span>Buses</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/bike.png" alt="" title="" />
                    <span>Bikes</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/drink.png" alt="" title="" />
                    <span>Drinks</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/food.png" alt="" title="" />
                    <span>Food</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/orders.png" alt="" title="" />
                    <span>Clothes</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/rocket.png" alt="" title="" />
                    <span>Rockets</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/briefcase.png" alt="" title="" />
                    <span>Accessories</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/gift.png" alt="" title="" />
                    <span>Gifts</span>
                  </a>
                </li>
                <li class="subnav opensubsubnav">
                  <img src="images/icons/white/categories.png" alt="" title="" />
                  <span>Third sublevel menu</span>
                </li>
              </ul>
            </nav>
          </div>
          <div class="swiper-slide">
            <div class="subnav_header backtosubnav">
              <img src="images/icons/white/back.png" alt="" title="" />
              <span>BACK TO 2 SUBLEVEL MENU</span>
            </div>
            <nav class="main_nav_underline">
              <ul>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/car.png" alt="" title="" />
                    <span>Subcategory 01</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/bus.png" alt="" title="" />
                    <span>Subcategory 02</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/bike.png" alt="" title="" />
                    <span>Subcategory 03</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/drink.png" alt="" title="" />
                    <span>Subcategory 04</span>
                  </a>
                </li>
                <li>
                  <a href="shop.html">
                    <img src="images/icons/white/food.png" alt="" title="" />
                    <span>Subcategory 05</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-right panel-reveal">
      <div class="user_login_info">
        <div class="user_thumb">
          <img src="images/page_photo.jpg" alt="" title="" />
          <div class="user_details">
            <p>Welcome, <span>Nathalie</span>
            </p>
          </div>
          <div class="user_avatar">
            <img src="images/avatar.jpg" alt="" title="" />
          </div>
        </div>
        <nav class="user-nav">
          <ul>
            <li>
              <a href="/">
                <img src="images/icons/white/settings.png" alt="" title="" />
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <a href="/">
                <img src="images/icons/white/briefcase.png" alt="" title="" />
                <span>My Account</span>
              </a>
            </li>
            <li>
              <a href="/">
                <img src="images/icons/white/message.png" alt="" title="" />
                <span>Messages</span>
                <strong>12</strong>
              </a>
            </li>
            <li>
              <a href="/">
                <img src="images/icons/white/love.png" alt="" title="" />
                <span>Favorites</span>
                <strong>5</strong>
              </a>
            </li>
            <li>
              <a href="/">
                <img src="images/icons/white/lock.png" alt="" title="" />
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="views">
      <div class="view view-main">
        <div class="pages">
          <div data-page="blogsingle" class="page no-toolbar no-navbar">
            <div class="page-content">
              <div class="navbarpages navbarpagesbg">
                <div class="navbar_left">
                  <div class="logo_text">
                    <a href="/blogd" class="backto">
                        <img src="images/icons/white/back.png" alt="" title="" style="width: 30dvw">
                      </a>
                  </div>
                </div>
              </div>
              <div id="pages_maincontent">
                <h2 class="blog_title">{{$blog->judul}}</h2>
                <!-- Slider -->
                <div class="page_single layout_fullwidth_padding">
                  <div class="post_single">
                    {!!
                        $blog->isi
                    !!}
                  </div>
                  <div>
                    <a href="{{url('/bloge?id='.$nextblog->id.'&tag='.$_GET['tag']+1)}}" class="btn col-12">Yuk Baca Materi Selanjutnya</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/jquery.custom.js"></script>
    <audio id="click-sound" src="https://www.myinstants.com/media/sounds/switch-sound.mp3"></audio>
    <script>
      document.addEventListener('click', function() {
        var audio = document.getElementById('click-sound');
        audio.play();
      });
    </script>
  </body>
</html>
