<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon" />
        </div>
        <div>
            <h4 class="logo-text" onclick="pos5_success_noti()">
                {{Auth::user()->name}}
            </h4>
        </div>
        <div class="toggle-icon ms-auto">
            <i class="bx bx-arrow-to-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('admin/dashboard') }}" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Home</li>
        <li>
            <a href="{{ url('admin/home_banner') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">Home Banner</div>
            </a>
        </li>
        <li>
            <a href="{{ url('admin/manage_size') }}">
                <div class="parent-icon"><i class="bx bx-font-size"></i></div>
                <div class="menu-title">Manage Size</div>
            </a>
        </li>
        <li>
            <a href="{{ url('admin/manage_color') }}">
                <div class="parent-icon"><i class="bx bx-paint"></i></div>
                <div class="menu-title">Manage Color</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Attributes</div>
            </a>
            <ul>
                <li>
                    <a href="{{ url('admin/attribute_name') }}"><i class="bx bx-right-arrow-alt"></i>Attribute Name</a>
                </li>
                <li>
                    <a href="{{ url('admin/attribute_value') }}"><i class="bx bx-right-arrow-alt"></i>Attribute Value</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Categories</div>
            </a>
            <ul>
                <li>
                    <a href="{{ url('admin/category') }}"><i class="bx bx-right-arrow-alt"></i>Category</a>
                </li>
                <li>
                    <a href="{{ url('admin/category_attribute') }}"><i class="bx bx-right-arrow-alt"></i>Category Attribute</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cart"></i></div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li>
                    <a href="{{ url('admin/product') }}"><i class="bx bx-right-arrow-alt"></i>Product</a>
                </li>
                {{-- <li>
                    <a href="{{ url('admin/category_attribute') }}"><i class="bx bx-right-arrow-alt"></i>Category Attribute</a>
                </li> --}}
            </ul>
        </li>
        <li class="menu-label">Brand</li>
        <li>
            <a href="{{ url('admin/brands') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Brand</div>
            </a>
        </li>
        <li class="menu-label">Tax</li>
        <li>
            <a href="{{ url('admin/tax') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Tax</div>
            </a>
        </li>
        <li class="menu-label">Pages</li>
        <li>
            <a href="{{ url('admin/profile') }}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i></div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li>
            <a href="https://codervent.com/rocker/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i></div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i></div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>