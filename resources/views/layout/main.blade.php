<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">

<head>

  <meta charset="utf-8" />
  <title>Social Media</title>
  <meta name="description" content="No aside layout examples" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <link href="../../../theme/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle1036.css?v=2.1.1" rel="stylesheet" type="text/css" />
  <link href="../../../theme/demo1/dist/assets/plugins/global/plugins.bundle1036.css?v=2.1.1" rel="stylesheet" type="text/css" />
  <link href="../../../theme/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle1036.css?v=2.1.1" rel="stylesheet" type="text/css" />
  <link href="../../../theme/demo1/dist/assets/css/style.bundle1036.css?v=2.1.1" rel="stylesheet" type="text/css" />
  <link href="../../../theme/demo1/dist/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
  <link href="../../../theme/demo1/dist/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
  <link href="../../../theme/demo1/dist/assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
  <link href="../../../theme/demo1/dist/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
  <!--end::Layout Themes-->

</head>

<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled page-loading">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="flex-row-auto offcanvas-mobile " id="kt_content_sidebar">
          <!--begin::Nav Panels Wizard 1-->
          <div class="card card-custom gutter-b">
            <!--begin::Body-->
            @if(!empty(Auth::User()->id))
            <div class="card-body pt-15">
              <!--begin::User-->
              <div class="text-center mb-7">
                <div class="symbol symbol-60 symbol-circle symbol-xl-90 symbol-primary">
                <img alt="Pic" src="{{\App\Models\User::getPicture(Auth::id()) != '' ? \App\Models\User::getPicture(Auth::id()) : '/img/blank.png'}}"/>
                </div>
                <h4 class="font-weight-bold my-2">{{Auth::User()->name}}</h4>
                <div class="text-muted mb-2">{{'@'.Auth::User()->username}}</div>
                <div class="mb-2">{{\App\Models\User::getProfile()->bio}}</div>

              </div>

              <ul class="navi navi-hover navi-active navi-accent navi-link-rounded font-weight-bold pb-10">
                <li class="navi-item py-1">
                  <a class="navi-link py-4 {{Request::is('editProfile') ? 'active' : ''}}" href="/editProfile">
                    <span class="navi-icon mr-2">
                      <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Communication/Adress-book2.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3" />
                            <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />
                          </g>
                        </svg>
                        <!--end::Svg Icon-->
                      </span>
                    </span>
                    <span class="navi-text">Edit Profile</span>
                  </a>
                </li>
                <li class="navi-item py-1">
                  <a class="navi-link py-4 {{Request::is('beranda*') ? 'active' : ''}}" href="/beranda">
                    <span class="navi-icon mr-2">
                      <span class="svg-icon svg-icon-2x">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-04-21-040700/theme/demo1/dist/../src/media/svg/icons/Home/Home.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                          </g>
                        </svg>
                        <!--end::Svg Icon-->
                      </span>
                    </span>
                    </span>
                    <span class="navi-text">Beranda</span>
                  </a>
                </li>
                <li class="navi-item py-1">
                  <a class="navi-link py-4 {{Request::is('post/explore*') ? 'active' : ''}}" href="/post/explore">
                    <span class="navi-icon mr-2">
                      <span class="svg-icon svg-icon-2x">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-04-21-040700/theme/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                          </g>
                        </svg>
                        <!--end::Svg Icon-->
                      </span>
                    </span>
                    </span>
                    <span class="navi-text">Hashtag</span>
                  </a>
                </li>
                <form action="/logout" method="post" id="form-logout">
                  @csrf
                  <li class="navi-item py-1">
                    <a class="navi-link py-4" onclick="document.getElementById('form-logout').submit();">
                      <span class="navi-icon mr-2">
                        <span class="svg-icon svg-icon-md">
                          <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Communication/Active-call.svg-->
                          <span class="svg-icon svg-icon-2x">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-04-21-040700/theme/demo1/dist/../src/media/svg/icons/Home/Door-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect opacity="0.300000012" x="0" y="0" width="24" height="24" />
                                <polygon fill="#000000" fill-rule="nonzero" opacity="0.3" points="7 4.89473684 7 21 5 21 5 3 11 3 11 4.89473684" />
                                <path d="M10.1782982,2.24743315 L18.1782982,3.6970464 C18.6540619,3.78325557 19,4.19751166 19,4.68102291 L19,19.3190064 C19,19.8025177 18.6540619,20.2167738 18.1782982,20.3029829 L10.1782982,21.7525962 C9.63486295,21.8510675 9.11449486,21.4903531 9.0160235,20.9469179 C9.00536265,20.8880837 9,20.8284119 9,20.7686197 L9,3.23140966 C9,2.67912491 9.44771525,2.23140966 10,2.23140966 C10.0597922,2.23140966 10.119464,2.2367723 10.1782982,2.24743315 Z M11.9166667,12.9060229 C12.6070226,12.9060229 13.1666667,12.2975724 13.1666667,11.5470105 C13.1666667,10.7964487 12.6070226,10.1879981 11.9166667,10.1879981 C11.2263107,10.1879981 10.6666667,10.7964487 10.6666667,11.5470105 C10.6666667,12.2975724 11.2263107,12.9060229 11.9166667,12.9060229 Z" fill="#000000" />
                              </g>
                            </svg>
                            <!--end::Svg Icon-->
                          </span>
                          <!--end::Svg Icon-->
                        </span>
                      </span>
                      <span class="navi-text">Logout</span>
                    </a>
                  </li>
                </form>
              </ul>
              <!--end::Nav-->
            </div>
            <!--end::Body-->
            @else
            <div class="card-body">
              <ul class="navi navi-hover navi-active navi-accent navi-link-rounded font-weight-bold pb-10">
                <li class="navi-item py-1">
                  <a class="navi-link py-4" href="/login">
                    <span class="navi-icon mr-2">
                      <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Communication/Active-call.svg-->
                        <span class="svg-icon svg-icon-2x">
                          <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-04-21-040700/theme/demo1/dist/../src/media/svg/icons/Home/Door-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect opacity="0.300000012" x="0" y="0" width="24" height="24" />
                              <polygon fill="#000000" fill-rule="nonzero" opacity="0.3" points="7 4.89473684 7 21 5 21 5 3 11 3 11 4.89473684" />
                              <path d="M10.1782982,2.24743315 L18.1782982,3.6970464 C18.6540619,3.78325557 19,4.19751166 19,4.68102291 L19,19.3190064 C19,19.8025177 18.6540619,20.2167738 18.1782982,20.3029829 L10.1782982,21.7525962 C9.63486295,21.8510675 9.11449486,21.4903531 9.0160235,20.9469179 C9.00536265,20.8880837 9,20.8284119 9,20.7686197 L9,3.23140966 C9,2.67912491 9.44771525,2.23140966 10,2.23140966 C10.0597922,2.23140966 10.119464,2.2367723 10.1782982,2.24743315 Z M11.9166667,12.9060229 C12.6070226,12.9060229 13.1666667,12.2975724 13.1666667,11.5470105 C13.1666667,10.7964487 12.6070226,10.1879981 11.9166667,10.1879981 C11.2263107,10.1879981 10.6666667,10.7964487 10.6666667,11.5470105 C10.6666667,12.2975724 11.2263107,12.9060229 11.9166667,12.9060229 Z" fill="#000000" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                      </span>
                    </span>
                    </span>
                    <span class="navi-text">Login</span>
                  </a>
                </li>
              </ul>
            </div>
            @endif
          </div>
          <!--end::Nav Panels Wizard 1-->
        </div>
      </div>
      <div class="col-lg-8">
        @yield('content')
      </div>
    </div>
  </div>

  <!--begin::Scrolltop-->
  <div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon">
      <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24" />
          <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
          <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
        </g>
      </svg>
      <!--end::Svg Icon-->
    </span>
  </div>
</body>

<script src="../../../theme/demo1/dist/assets/plugins/global/plugins.bundle1036.js?v=2.1.1"></script>
<script src="../../../theme/demo1/dist/assets/js/scripts.bundle1036.js?v=2.1.1"></script>
<script src="../../../theme/demo1/dist/assets/js/pages/widgets1036.js?v=2.1.1"></script>
<script src="../../..//theme/demo1/dist/assets/js/pages/custom/profile/profile1036.js?v=2.1.1"></script>

@yield('js')

</html>