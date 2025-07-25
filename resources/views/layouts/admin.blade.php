<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 May 2023 05:16:53 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Solve Monkey </title>
    <!-- icon -->
    <!-- {{asset('admin/css/animate.css')}} -->
    <link rel="icon" type="image/png" href="{{asset('admin1/images/favicon.png')}}" />
    <!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="{{asset('admin1/vendor/bootstrap/css/bootstrap.ltr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/vendor/highlight.js/styles/github.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/vendor/simplebar/simplebar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/vendor/quill/quill.snow.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/vendor/air-datepicker/css/datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/vendor/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/vendor/datatables/css/dataTables.bootstrap5.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/vendor/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/vendor/fullcalendar/main.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('admin1/css/font-awesome.min')}}" />
    @livewireStyles
    
</head>

<body>
    <!-- sa-app -->
    <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        <!-- sa-app__sidebar -->
        <div class="sa-app__sidebar">
            <div class="sa-sidebar">
                <div class="sa-sidebar__header">
                    <a class="sa-sidebar__logo" href="{{route('admin.dashboard')}}">
                        <!-- logo -->
                        <div class="sa-sidebar-logo">
                             <img class="sidebaar1" src="{{asset('assets/img/logo/solve-logo.png')}}" alt="images">
                            
                        </div>
                        <!-- logo / end -->
                    </a>
                </div>
                <div class="sa-sidebar__body" data-simplebar="">
                    <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                        <li class="sa-nav__section">
                            <!--<div class="sa-nav__section-title"><span>Application</span></div>-->
                            <ul class="sa-nav__menu sa-nav__menu--root">
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="{{route('admin.dashboard')}}" class="sa-nav__link side2 sides2">
                                     <img class="sidebaar2" src="{{asset('assets/img/logo/dashboard-interface.png')}}" alt="images">
                                        <span class="sa-nav__title">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                       <img class="sidebaar2" src="{{asset('assets/img/logo/category.png')}}" alt="images">
                                        <span class="sa-nav__title">Category</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addcategory')}}" class="sa-nav__link">
                                            <span class="sa-nav__menu-item-padding"></span>
                                                   <span class="sa-nav__title">Add Category</span>
                                                   </a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.categories')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Categories List</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.subcategories')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Sub-Categories List</span></a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                       <img class="sidebaar2" src="{{asset('assets/img/logo/package.png')}}" alt="images">
                                        <span class="sa-nav__title">Package</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addpackage')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Package</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.packages')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Package List</span></a>
                                        </li>
                                        

                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                        <img class="sidebaar2" src="{{asset('assets/img/logo/user.png')}}" alt="images">
                                        <span class="sa-nav__title">User</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.adduser')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add User</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.users')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">User List</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                          <img class="sidebaar2" src="{{asset('assets/img/logo/completed.png')}}" alt="images">
                                        <span class="sa-nav__title">Product</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addproduct')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Product</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.products')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Product List</span></a>
                                        </li>

                                    <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.userproducts')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">User Product List</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                         <img class="sidebaar2" src="{{asset('assets/img/logo/attribute (2).png')}}" alt="images">
                                        <span class="sa-nav__title">Attribute</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addattribute')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Attribute</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.attributes')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Attribute List</span></a>
                                        </li>


                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                        <img class="sidebaar2" src="{{asset('assets/img/logo/attribute (1).png')}}" alt="images">
                                        <span class="sa-nav__title">Attribute's Options</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addattributeoption')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Attribute's Options</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.attributeoptions')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Attribute's Option List</span></a>
                                        </li>


                                    </ul>
                                </li>
                                {{-- <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">

                                       <img class="sidebaar2" src="{{asset('assets/img/logo/city-building.png')}}" alt="images">
                                       

                                        <span class="sa-nav__title">City</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.cities')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Cities</span></a>
                                        </li>

                                    </ul>
                                </li> --}}
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">


                                         <img class="sidebaar2" src="{{asset('assets/img/logo/banner-design.png')}}" alt="images">

                                        <span class="sa-nav__title">Banner</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addbanner')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Banner</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.banners')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Banner</span></a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger=""> 
                                         <img class="sidebaar2" src="{{asset('assets/img/logo/brand.png')}}" alt="images">
                                        <span class="sa-nav__title">Brand</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addbrand')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Brand</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.brands')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Brand</span></a>
                                        </li>


                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger=""> 
                                       <img class="sidebaar2" src="{{asset('assets/img/logo/3d-modeling.png')}}" alt="images">
                                        <span class="sa-nav__title">Model</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addmodelnumber')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Model</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.modelnumbers')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Model List</span></a>
                                        </li>


                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger=""> 
                                       <img class="sidebaar2" src="{{asset('assets/img/logo/3d-modeling.png')}}" alt="images">
                                        <span class="sa-nav__title">Company Offers</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.company-offeradd')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Company Offer</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.company-offer')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Company Offer List</span></a>
                                        </li>


                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                       <img class="sidebaar2" src="{{asset('assets/img/logo/testimonials.png')}}" alt="images">
                                        <span class="sa-nav__title">Testimonial</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.addtestimonial')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Add Testimonial</span></a>
                                        </li>
                                        <li class="sa-nav__menu-item">
                                            <a href="{{route('admin.testimonials')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Testimonial</span></a>
                                        </li>
                                   

                                    </ul>
                             <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                        data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                   <img class="sidebaar2" src="{{asset('assets/img/logo/contact-form.png')}}" alt="images">
                                        <span class="sa-nav__title">Contact Forms</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.contactForms')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Contacts</span></a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                        data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                   <img class="sidebaar2" src="{{asset('assets/img/logo/contact-form.png')}}" alt="images">
                                        <span class="sa-nav__title">Subscribers</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.subscribers')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Subscribers</span></a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                        data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="#" class="sa-nav__link side2 sides2" data-sa-collapse-trigger="">
                                   <img class="sidebaar2" src="{{asset('assets/img/logo/cogwheel.png')}}" alt="images">
                                        <span class="sa-nav__title">Settings</span>
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub " data-sa-collapse-content="">
                                        
                                        <li class="sa-nav__menu-item menued">
                                            <a href="{{route('admin.websetting')}}" class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Web-site Setting</span></a>
                                        </li>

                                    </ul>
                                </li>
                        </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div>
        <!-- sa-app__sidebar / end -->
        <!-- sa-app__content -->
        <div class="sa-app__content">
            <!-- sa-app__toolbar -->
            <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
                <div class="sa-toolbar__body">
                    <div class="sa-toolbar__item">
                        <button class="sa-toolbar__button" type="button" aria-label="Menu" data-sa-toggle-sidebar="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M1,11V9h18v2H1z M1,3h18v2H1V3z M15,17H1v-2h14V17z"></path>
                            </svg>
                        </button>
                    </div>
                   {{-- <div class="sa-toolbar__item sa-toolbar__item--search">
                        <form class="sa-search sa-search--state--pending">
                            <div class="sa-search__body">
                                <label class="visually-hidden" for="input-search">Search for:</label>
                                <div class="sa-search__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"
                                        fill="currentColor">
                                        <path d="M16.243 14.828C16.243 14.828 16.047 15.308 15.701 15.654C15.34 16.015 14.828 16.242 14.828 16.242L10.321 11.736C9.247 12.522 7.933 13 6.5 13C2.91 13 0 10.09 0 6.5C0 2.91 2.91 0 6.5 0C10.09 0 13 2.91 13 6.5C13 7.933 12.522 9.247 11.736 10.321L16.243 14.828ZM6.5 2C4.015 2 2 4.015 2 6.5C2 8.985 4.015 11 6.5 11C8.985 11 11 8.985 11 6.5C11 4.015 8.985 2 6.5 2Z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text" id="input-search" class="sa-search__input"
                                    placeholder="Search for the truth" autocomplete="off" />
                                <button class="sa-search__cancel d-sm-none" type="button" aria-label="Close search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                        fill="currentColor">
                                        <path
                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                        </path>
                                    </svg>
                                </button>
                                <div class="sa-search__field"></div>
                            </div>
                            <div class="sa-search__dropdown">
                                <div class="sa-search__dropdown-loader"></div>
                                <div class="sa-search__dropdown-wrapper">
                                    <div class="sa-search__suggestions sa-suggestions"></div>
                                    <div class="sa-search__help sa-search__help--type--no-results">
                                        <div class="sa-search__help-title">No results for &quot;<span
                                                class="sa-search__query"></span>&quot;</div>
                                        <div class="sa-search__help-subtitle">Make sure that all words are spelled
                                            correctly.</div>
                                    </div>
                                    <div class="sa-search__help sa-search__help--type--greeting">
                                        <div class="sa-search__help-title">Start typing to search for</div>
                                        <div class="sa-search__help-subtitle">Products, orders, customers, actions, etc.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sa-search__backdrop"></div>
                        </form>
                    </div> --}}
                    <div class="mx-auto"></div>
                    <div class="sa-toolbar__item d-sm-none">
                        <button class="sa-toolbar__button" type="button" aria-label="Show search"
                            data-sa-action="show-search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor">
                                <path
                                    d="M16.243 14.828C16.243 14.828 16.047 15.308 15.701 15.654C15.34 16.015 14.828 16.242 14.828 16.242L10.321 11.736C9.247 12.522 7.933 13 6.5 13C2.91 13 0 10.09 0 6.5C0 2.91 2.91 0 6.5 0C10.09 0 13 2.91 13 6.5C13 7.933 12.522 9.247 11.736 10.321L16.243 14.828ZM6.5 2C4.015 2 2 4.015 2 6.5C2 8.985 4.015 11 6.5 11C8.985 11 11 8.985 11 6.5C11 4.015 8.985 2 6.5 2Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="dropdown sa-toolbar__item">
                        <button class="sa-toolbar-user" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            data-bs-offset="0,1" aria-expanded="false">
                            <span class="sa-toolbar-user__avatar sa-symbol sa-symbol--shape--rounded"><img
                                    src="{{asset('admin1/images/customers/customer-4-64x64.jpg')}}" width="64"
                                    height="64" alt="" /></span>
                            <span class="sa-toolbar-user__info"><span class="sa-toolbar-user__title">{{Auth::user()->name}}</span><span
                                    class="sa-toolbar-user__subtitle">{{Auth::user()->email}}</span></span>
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            {{--<li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="app-inbox-list.html">Inbox</a></li> --}}
                            <li><a class="dropdown-item" href="{{route('admin.websetting')}}">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a></li>

                                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                                        @csrf
                                    </form>
                        </ul>
                    </div>
                </div>
                <div class="sa-toolbar__shadow"></div>
            </div>
            <!-- sa-app__toolbar / end -->
            <!-- sa-app__body -->



         @yield('content')



            <!-- sa-app__body / end -->
            <!-- sa-app__footer -->
            <div class="sa-app__footer d-block d-md-flex">
                <!-- copyright -->Admin panel for Solvemonkey © 2024
                <div class="m-auto"></div>
                <div>Crafted with by  <a href="https://softhunters.in/" target="_blank">Softhunters PVt.LTd.</a></div>
                <!-- copyright / end -->
            </div>
            <!-- sa-app__footer / end -->
        </div>
        <!-- sa-app__content / end -->
        <!-- sa-app__toasts -->
        <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
        <!-- sa-app__toasts / end -->
    </div>
    <!-- sa-app / end -->
    <!-- scripts -->
    <script src="{{asset('admin1/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/highlight.js/highlight.pack.js')}}"></script>
    <script src="{{asset('admin1/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/air-datepicker/js/datepicker.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/air-datepicker/js/i18n/datepicker.en.js')}}"></script>
    <script src="{{asset('admin1/vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/fontawesome/js/all.min.js')}}" data-auto-replace-svg="" async=""></script>
    <script src="{{asset('admin1/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/datatables/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('admin1/vendor/fullcalendar/main.min.js')}}"></script>
    <script src="{{asset('admin1/js/stroyka.js')}}"></script>
    <script src="{{asset('admin1/js/custom.js')}}"></script>
    <script src="{{asset('admin1/js/calendar.js')}}"></script>
    <script src="{{asset('admin1/js/demo.js')}}"></script>
    <script src="{{asset('admin1/js/demo-chart-js.js')}}"></script>
    @livewireScripts
	@stack('scripts')
</body>
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 May 2023 05:17:29 GMT -->

</html>