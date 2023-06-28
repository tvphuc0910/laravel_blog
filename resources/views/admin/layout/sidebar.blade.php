<div class="sidebar" data-background-color="brown" data-active-color="danger">
    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            DB
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Dash Board
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('img/faces/face-0.jpg/') }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
	                        <span>
								Name
		                        <b class="caret"></b>
							</span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="sidebar-mini">Mp</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="sidebar-mini">Ep</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <span class="sidebar-mini">L</span>
                                <span class="sidebar-normal">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a href="{{route('welcome.index')}}">
                    <i class="ti-calendar"></i>
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#dashboardOverview">
                    <i class="ti-panel"></i>
                    <p>Blog Menu
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="dashboardOverview">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('posts.index') }}">
                                <span class="sidebar-mini">P</span>
                                <span class="sidebar-normal">Posts</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <span class="sidebar-mini">C</span>
                                <span class="sidebar-normal">Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tags.index') }}">
                                <span class="sidebar-mini">T</span>
                                <span class="sidebar-normal">Tags</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>



        </ul>
    </div>
</div>
