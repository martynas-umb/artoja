<header class="banner">
  <div class="page-wrapper-light-green">

    <!--====================  Header area ====================-->

    <div class="header-area header-sticky">
      <!--====================  Navigation top ====================-->

      <div class="navigation-top">
        <!--====================  navigation section ====================-->

        <div class="navigation-top-topbar pt-10 pb-10">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-4 col-md-6 text-center text-md-left">
                <!--=======  header top social links  =======-->

                <div class="header-top-social-links">
                  <span class="follow-text mr-15">Follow Us:</span>
                  <!--=======  social link small  =======-->

                  <ul class="social-link-small">
                    <li><a href="{{ get_field('facebook','options') }}"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="{{ get_field('instagram','options') }}"><i class="ion-social-instagram-outline"></i></a></li>
                    <li><a href="{{ get_field('facebook','options') }}"><i class="ion-social-youtube"></i></a></li>
                    <li>{{do_action('wpml_add_language_selector')}}</li>
                  </ul>

                  <!--=======  End of social link small  =======-->
                </div>


                <!--=======  End of header top social links  =======-->
              </div>
              <div class="col-lg-4 offset-lg-4 col-md-6">
                <!--=======  header top dropdown container  =======-->

                <div class="headertop-dropdown-container justify-content-center justify-content-md-end">
                  <div class="head-title">
                    {{__('servisas ir aptarnavimas','artoja')}}
                  </div>
                  <div class="header-top-single-dropdown">
                    <a href="javascript:void(0)" class="active-dropdown-trigger" id="user-options">My Account <i class="ion-ios-arrow-down"></i></a>
                    <!--=======  dropdown menu items  =======-->

                    <div class="header-top-single-dropdown__dropdown-menu-items deactive-dropdown-menu extra-small-mobile-fix">
                      <ul>
                        <li><a href="login-register.html">Register</a></li>
                        <li><a href="login-register.html">Login</a></li>
                      </ul>
                    </div>

                    <!--=======  End of dropdown menu items  =======-->
                  </div>
                </div>

                <!--=======  End of header top dropdown container  =======-->
              </div>
            </div>
          </div>
        </div>

        <!--====================  End of navigation section  ====================-->
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!--====================  navigation top search ====================-->


              <div class="navigation-top-search-area pt-25 pb-25">
                <div class="row align-items-center">
                  <div class="col-6 col-xl-2 col-lg-3 order-1 col-md-6 col-sm-5">
                    <!--=======  logo  =======-->

                    <div class="logo">
                      <a href="{{get_home_url()}}">
                        {!! wp_get_attachment_image(get_field('logo','options'),'full') !!}
                      </a>
                    </div>

                    <!--=======  End of logo  =======-->
                  </div>

                  <div class="col-xl-5 offset-xl-1 col-lg-4 order-4 order-lg-2 mt-md-25 mt-sm-25">
                    <!--=======  search bar  =======-->

                    <div class="search-bar">
                      <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                          <input type="search" class="search-field"
                                 placeholder="<?php echo esc_attr_x( 'Paieška …', 'placeholder' ) ?>"
                                 value="<?php echo get_search_query() ?>" name="s"
                                 title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                        <button type="submit"> <i class="icon-search"></i></button>
                      </form>
                    </div>

                    <!--=======  End of search bar  =======-->
                  </div>

                  <div class="col-xl-3 col-lg-3 order-3 order-sm-2 order-lg-3 order-xs-3 col-md-4 col-sm-5 text-center text-sm-left mt-xs-25">
                    <!--=======  customer support text  =======-->

                    <div class="customer-support-text">
                      <div class="text">
                        <span>{{__('Klientų aptarnavimas','artoja')}}</span>
                        <p><a href="tel:{{get_field('customer_support_number','options')}}">{{get_field('customer_support_number','options')}}</a></p>
                      </div>
                    </div>

                    <!--=======  End of customer support text  =======-->
                  </div>

                  <div class="col-6 col-xl-1 col-lg-2 text-right order-2 order-sm-3 order-lg-4 order-xs-2 col-md-2 col-sm-2">
                    <!--=======  cart icon  =======-->

                    <div class="header-cart-icon">
                      <a href="javascript:void(0)" id="small-cart-trigger" class="small-cart-trigger">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-counter">2</span>
                      </a>

                      <!--=======  small cart  =======-->

                      <div class="small-cart deactive-dropdown-menu">
                        <div class="small-cart-item-wrapper">
                          <div class="single-item">
                            <div class="image">
                              <a href="single-product.html">
                                <img src="assets/img/cart-image/small1-90x90.jpg" class="img-fluid" alt="">
                              </a>
                            </div>
                            <div class="content">
                              <p class="cart-name"><a href="single-product.html">Cillum dolore</a></p>
                              <p class="cart-quantity"><span class="quantity-mes">1 x </span> $78.80</p>
                            </div>
                            <a href="#" class="remove-icon"><i class="ion-close-round"></i></a>
                          </div>
                          <div class="single-item">

                            <div class="image">
                              <a href="single-product.html">
                                <img src="assets/img/cart-image/small2-90x90.jpg" class="img-fluid" alt="">
                              </a>
                            </div>
                            <div class="content">
                              <p class="cart-name"><a href="single-product.html">Condimentum posuere</a></p>
                              <p class="cart-quantity"><span class="quantity-mes">1 x </span> $78.80</p>
                            </div>
                            <a href="#" class="remove-icon"><i class="ion-close-round"></i></a>
                          </div>
                        </div>

                        <div class="cart-calculation-table">
                          <table class="table mb-25">
                            <tbody>
                            <tr>
                              <td class="text-left">Sub-Total :</td>
                              <td class="text-right">$129.00</td>
                            </tr>
                            <tr>
                              <td class="text-left">Eco Tax (-2.00) :</td>
                              <td class="text-right">$4.00</td>
                            </tr>
                            <tr>
                              <td class="text-left">VAT (20%) :</td>
                              <td class="text-right">$25.80</td>
                            </tr>
                            <tr>
                              <td class="text-left">Total :</td>
                              <td class="text-right">$158.80</td>
                            </tr>
                            </tbody>
                          </table>

                          <div class="cart-buttons">
                            <a href="cart.html" class="theme-button">View Cart</a>
                            <a href="checkout.html" class="theme-button">Checkout</a>
                          </div>
                        </div>

                      </div>

                      <!--=======  End of small cart  =======-->
                    </div>

                    <!--=======  End of cart icon  =======-->
                  </div>
                </div>
              </div>

              <!--====================  End of navigation top search  ====================-->
            </div>
          </div>
        </div>
      </div>

      <!--====================  End of Navigation top  ====================-->

      <!--====================  navigation menu ====================-->

      <div class="navigation-menu-area mb-20">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- navigation section -->
              <div class="main-menu d-none d-lg-block">
                <nav>{{
                  wp_nav_menu(array(
                    'theme_location' => 'primary_navigation',
                    'container' => 'ul',
                    'menu_id' => 'main-nav',
                ))
                }}
                </nav>
              </div>
              <!-- end of navigation section -->

              <!-- Mobile Menu -->
              <div class="mobile-menu-wrapper d-block d-lg-none pt-15">
                <div class="mobile-menu mean-container">
                  <div class="mean-bar">
                                        <a href="#nav" class="meanmenu-reveal" style="background:;color:;right:0;left:auto;"><span class="mean-menu-text"><i class="lnr lnr-text-align-left"></i> Mobile Menu</span> <span class="menu-bar"></span></a><nav class="mean-nav">
                  {{
                  wp_nav_menu(array(
                    'theme_location' => 'primary_navigation',
                    'container' => 'ul',
                    'menu_id' => 'main-mobile-nav',
                ))
                }}
                  </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!--====================  End of navigation menu  ====================-->
    </div>
    <!--====================  End of Header area  ====================-->
</header>
