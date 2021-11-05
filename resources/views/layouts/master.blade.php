<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="user-token" content="{{ auth()->check() ? auth()->user()->api_token: '' }}">
    <meta name="user-id" content="{{ auth()->check() ? auth()->user()->id: '' }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/metalogo.png" type="image/png" sizes="16x16">

    <title>Yi Jing</title>
</head>
<style>
.parallax {
  /* The image used */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.nav-Font{
  font-family: 'Balsamiq Sans', cursive;
}

@media only screen and (max-width: 991px) {
  .navbar{
    background-color: white;
  }
  #mobileLogo{
    content: url('/img/Home_logo.png');
    width: 100px !important;
  }

  .navbar-toggler{
    color: black;
  }

  .nav-link{
    color: black !important;
  }
}

/* @media only screen and (max-width: 500px) {
  #app{
    padding-bottom: 100px;
  }
} */



#loader-wrapper {
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  z-index:1000;
}
#loader {
  display:block;
  position: relative;
  top:50%;
  left:50%;
  width:150px;
  height:150px;
  margin:-75px 0 0 -75px;
  border:3px solid transparent;
  border-top-color:white;
  border-radius:100%;
  -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
  z-index:1001;
}
#loader:before {
  content:"";
  position: absolute;
  top:5px;
  left:5px;
  right:5px;
  bottom:5px;
  border:3px solid transparent;
  border-top-color: yellow;
  border-radius:100%;
  -webkit-animation: spin 3s linear infinite;
          animation: spin 3s linear infinite;
}
#loader:after {
  content:"";
  position: absolute;
  top:12px;
  left:12px;
  right:12px;
  bottom:12px;
  border:3px solid transparent;
  border-top-color:orange;
  border-radius:100%;
  -webkit-animation: spin 1.5s linear infinite;
          animation: spin 1.5s linear infinite;
}
@-webkit-keyframes spin {
  0%   { 
    -webkit-transform: rotate(0deg); 
      -ms-transform: rotate(0deg); 
          transform: rotate(0deg);
  }
  100% { 
    -webkit-transform: rotate(360deg); 
      -ms-transform: rotate(360deg); 
          transform: rotate(360deg);
  }
}
@keyframes spin {
  0%   { 
    -webkit-transform: rotate(0deg); 
      -ms-transform: rotate(0deg); 
          transform: rotate(0deg);
  }
  100% { 
    -webkit-transform: rotate(360deg); 
      -ms-transform: rotate(360deg); 
          transform: rotate(360deg);
  }
}

#loader-wrapper .loader-section {
  position:fixed;
  top:0;
  background:#333;
  width:51%;
  height:100%;
  z-index:1000;
}

#loader-wrapper .loader-section.section-left {
  left:0
}
#loader-wrapper .loader-section.section-right {
  right:0;
}

/* Loaded Styles */
.loaded #loader-wrapper .loader-section.section-left {
  transform: translateX(-100%);
  transition: all 1s 0.3s cubic-bezier(0.645,0.045,0.355,1.000);
}
.loaded #loader-wrapper .loader-section.section-right {
  transform: translateX(100%);
  transition: all 1s 0.3s cubic-bezier(0.645,0.045,0.355,1.000);
}
.loaded #loader {
  opacity: 0;
  transition: all 1s ease-out;
}
.loaded #loader-wrapper {
  visibility: hidden;
  transform:translateY(-100%);
  transition: all 1s 1s ease-out;
} 
html {
            scroll-behavior: smooth;
        }
#footerList{
  list-style-type: none;
  padding: 0;
}
</style>
<body>
  
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <div class="">
      @include('partial.navigation')
    </div>  
   
<div id="app">
    <div  class="" >
        <digital-clock></digital-clock>
        @yield('content')
    </div>
    <div style="position:relative;" class="p-3 bg-white {{request()->is('privacy')?'d-none':''}} {{request()->is('copyright')?'d-none':''}}">
        <img src="{{ asset('img/shape-min.png') }}" alt="" style="position: absolute;top:-120px;right:0px;">
          <about-component></about-component>
    </div>
  
  <footer class="p-2 text-center bg-dark">
    <div class="row pt-3">
      <div class="col-md-6">
          <img src="{{ asset('img/logo.png') }}" style="width:25%" alt="">
      </div>
      <div class="col-md-6">
        <ul id="footerList">
          <a href="{{ url('/') }}">
              <li>Home</li>
          </a>
          <a href="{{ url('/login') }}">
              <li>Login</li>
          </a>
          <a href="{{ url('/') }}">
              <li>About Us</li>
          </a>
          <a href="{{ url('/privacy') }}">
              <li>Data Privacy</li>
          </a>
          <a href="{{ url('/copyright') }}">
              <li>Copyright Notice</li>
          </a>
          <a href="{{ url('/register') }}">
              <li>Sign Up</li>
          </a>
        </ul>
      </div>
    </div>

    <footer-component></footer-component>
    
        
  </footer>
</div>
    <script>
      window.addEventListener('load',function(){
        document.querySelector('body').classList.add("loaded")  
      });
    </script>
</body>
</html>