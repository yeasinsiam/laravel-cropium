<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle"
                        src="{{ filter_var(auth()->user()->photo, FILTER_VALIDATE_URL)
                            ? auth()->user()->photo
                            : asset('/storage/user-photos/') . '/' . auth()->user()->photo }}"
                        alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{ auth()->user()->name }}</p>
                    <p class="designation">Premium user</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-post" aria-expanded="false" aria-controls="ui-post">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Post</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (isset($activeMenu) && in_array('post', $activeMenu)) show @endif" id="ui-post">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link @if (isset($activeMenu) && in_array('all-post', $activeMenu)) active @endif"
                            href="{{ route('admin.posts.index') }}" id="all-post-menu">All Posts</a>
                    </li>

                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link @if (isset($activeMenu) && in_array('create-post', $activeMenu)) active @endif"
                                href="{{ route('admin.posts.create') }}">Add New Post</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link @if (isset($activeMenu) && in_array('categories', $activeMenu)) active @endif" id="category-menu"
                            href="{{ route('admin.categories.index') }}">Category</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (isset($activeMenu) && in_array('user', $activeMenu)) show @endif" id="ui-users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link @if (isset($activeMenu) && in_array('all-users', $activeMenu)) active @endif"
                            href="{{ route('admin.users.index') }}" id="all-post-menu">All Users</a>
                    </li>

                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link @if (isset($activeMenu) && in_array('create-user', $activeMenu)) active @endif"
                                href="{{ route('admin.users.create') }}">Add New User</a>
                        </li>
                    @endif


                    <li class="nav-item">
                        <a class="nav-link @if (isset($activeMenu) && in_array('my-profile', $activeMenu)) active @endif"
                            href="{{ route('admin.user.profile') }}">My Profile</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
