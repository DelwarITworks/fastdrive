
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('public/backend/assets/images/carimage3.jpg') }}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Fdtbooking</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.centre') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Centre</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.theorycentre') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Theory Centre</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Blogs</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.blogcate') }}"><i class="bx bx-right-arrow-alt"></i>Blog Category Manage</a>
                        </li>
                        <li> <a href="{{ route('index.blog') }}"><i class="bx bx-right-arrow-alt"></i>Blog List</a>
                        </li>
                        <li> <a href="{{ route('deactive.blog.list') }}"><i class="bx bx-right-arrow-alt"></i>Deactive Blog List</a>
                        </li>
                       {{--  <li> <a href="{{ route('admin.schedule') }}"><i class="bx bx-right-arrow-alt"></i>Schedule</a>
                        </li> --}}
                    </ul>
                </li>

                <li>
                    <a href="{{ route('payment.list') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Practical Payments</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('theory.payment.list') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Theory Payments</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.faq') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Faqs</div>
                    </a>
                </li>
                <li class="menu-label">UI Elements</li>
                <li>
                    <a href="{{ route('admin.contact.messages') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Contact Messages</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.about') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">About</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('setting') }}">
                        <div class="parent-icon"><i class='bx bx-cookie'></i>
                        </div>
                        <div class="menu-title">Setting</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->