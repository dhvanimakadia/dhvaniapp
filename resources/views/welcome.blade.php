<style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  font-family: 'Open Sans', sans-serif;
  font-size: 14px;
  font-weight: 400;
  line-height: 20px;
}
.container {
  width: 100%;
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 15px;
}
.header-area {
  background: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.5)),
  url(https://images.unsplash.com/photo-1528353518104-dbd48bee7bc4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2089&q=80);
  background-position: center center;
  background-size: cover;
}
/* default css end */


/* navbar regular css start */
.navbar-area {
  background: rgba(0,0,0,.6);
  border-bottom: 1px solid #000;
}
.site-navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
a.site-logo {
  font-size: 26px;
  font-weight: 800;
  text-transform: uppercase;
  color: #fff;
  text-decoration: none;
}
.site-navbar ul {
  margin: 0;
  padding: 0;
  list-style: none;
  display: flex;
}
.site-navbar ul li a {
  color: #fff;
  padding: 20px;
  display: block;
  text-decoration: none;
  text-transform: uppercase;
}
.site-navbar ul li a:hover {
  background: rgba(255,255,255,.1);
}
/* navbar regular css end */


/* nav-toggler css start */
.nav-toggler {
  border: 3px solid #fff;
  padding: 5px;
  background-color: transparent;
  cursor: pointer;
  height: 39px;
  display: none;
}
.nav-toggler span, 
.nav-toggler span:before, 
.nav-toggler span:after {
  width: 28px;
  height: 3px;
  background-color: #fff;
  display: block;
  transition: .3s;
}
.nav-toggler span:before {
  content: '';
  transform: translateY(-9px);
}
.nav-toggler span:after {
  content: '';
  transform: translateY(6px);
}
.nav-toggler.toggler-open span {
  background-color: transparent;
}
.nav-toggler.toggler-open span:before {
  transform: translateY(0px) rotate(45deg);
}
.nav-toggler.toggler-open span:after {
  transform: translateY(-3px) rotate(-45deg);
}
/* nav-toggler css start */


/* intro-area css start */
.intro-area {
  height: calc(100vh - 61px);
  display: flex;
  align-items: center;
  text-align: center;
  color: #fff;
}
.intro-area h2 {
  font-size: 50px;
  font-weight: 300;
  line-height: 50px;
  margin-bottom: 25px;
}
.intro-area p {
  font-size: 18px;
}
/* intro-area css end */


/* mobile breakpoint start */
@media screen and (max-width: 767px) {
  .container {
    max-width: 720px;
  }
  /* navbar css for mobile start */
  .nav-toggler{
    display: block;
  }
  .site-navbar {
    min-height: 60px;
  }
  .site-navbar ul {
    position: absolute;
    width: 100%;
    height: calc(100vh - 60px);
    left: 0;
    top: 60px;
    flex-direction: column;
    align-items: center;
    border-top: 1px solid #444;
    background-color: rgba(0,0,0,.75);
    max-height: 0;
    overflow: hidden;
    transition: .3s;
  }
  .site-navbar ul li {
    width: 100%;
    text-align: center;
  }
  .site-navbar ul li a {
    padding: 25px;
  }
  .site-navbar ul li a:hover {
    background-color: rgba(255,255,255,.1);
  }
  .site-navbar ul.open {
    max-height: 100vh;
    overflow: visible;
  }
  .intro-area h2 {
    font-size: 36px;
    margin-bottom: 15px;
  }  
  /* navbar css for mobile end */
}
/* mobile breakpoint end */
</style>
<header class="header-area">
    <!-- site-navbar start -->
    <div class="navbar-area">
      <div class="container">
        <nav class="site-navbar">
          <!-- site logo -->
          <a href="{{route('home.index')}}" class="site-logo">Dhvani shopps'y</a>
  
          <!-- site menu/nav -->
          <ul>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">Product </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jwellerys.index2') }}">Jewelry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('owner.owner') }}">Owner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.show') }}">Contact Us</a>
            </li>
          </ul>
  
          <!-- nav-toggler for mobile version only -->
          <button class="nav-toggler">
            <span></span>
          </button>
        </nav>
      </div>
    </div><!-- navbar-area end -->
  
    <div class="intro-area">
      <div class="container">
      </div>
    </div>
  </header>