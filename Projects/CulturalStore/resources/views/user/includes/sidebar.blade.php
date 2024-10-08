	<!--**********************************
            Sidebar start
        ***********************************-->
	<div class="deznav">
	    <div class="deznav-scroll mm-active ps ps--active-y">
	        <div class="main-profile">
	            <div class="image-bx">
	                @if($LoggedUserInfo['picture'])
	                <img src="{{ asset('storage/' . $LoggedUserInfo['picture']) }}" alt="Profile Picture" width="100"
	                    height="100">
	                @else
	                <img src="{{ asset('path_to_default_image.jpg') }}" alt="Default Picture" width="100" height="100">
	                @endif
	                <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
	            </div>
	            <h5 class="name"><span class="font-w400">Hello,</span> {{ $LoggedUserInfo['name'] }}</h5>
	        </div>
	        <ul class="metismenu mm-show" id="menu">
	           

  
	            <li><a href="/user/profile" href="javascript:void()" aria-expanded="false">
	                    <i class="flaticon-049-copy"></i>
	                    <span class="nav-text">Profile</span>
	                </a>

	            </li>
	        </ul>
			<br><br><br><br><br><br><br><br><br><br>
	        <div class="copyright">
	            <p><strong>Cultural User Dashboard</strong> © 2024 All Rights Reserved</p>
	            <p class="fs-12">Made with <span class="heart"></span> by Cultural</p>
	        </div>
	        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
	            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
	        </div>
	        <div class="ps__rail-y" style="top: 0px; height: 561px; right: 0px;">
	            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 477px;"></div>
	        </div>
	    </div>
	</div>
	<!--**********************************
            Sidebar end
        ***********************************-->