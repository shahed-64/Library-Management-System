            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title">
								<span>Main</span>
							</li>
							<li class="{{ Request::is ('/') ? 'active' : '' }}">

								<a href="{{ url('/') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>

							</li>

							<li class="menu-title">
								<span>UI Interface</span>
							</li>
							<li class="{{ Request::is ('borrow') ? 'active' : '' }}">
								<a href="{{ route('borrow.index') }}"><i class="fe fe-vector"></i> <span>Borrowings</span></a>
							</li>
							<li class="submenu">
								<a class="{{ Request::is ('student') || Request::is ('student/create') ? 'active' : '' }}" href="{{ url('/student.index') }}"><i class="fe fe-layout"></i> <span> Students </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li ><a class="{{ Request::is ('student') ? 'active-link' : '' }}"  href="{{ route('student.index') }}">All Students </a></li>
									<li ><a class="{{ Request::is ('student/create') ? 'active-link' : '' }}" href="{{ route('student.create') }}">Add New Student </a></li>
								</ul>
							</li>
                            <li class="submenu">
								<a class="{{ Request::is ('book') || Request::is ('book/create') ? 'active' : '' }}" href="{{ url('/student.index') }}" href="#"><i class="fe fe-layout"></i> <span> Books </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

									<li><a class="{{ Request::is ('book') ? 'active-link' : '' }}" href="{{ route('book.index') }}">All Books </a></li>
									<li><a class="{{ Request::is ('book/create') ? 'active-link' : '' }}" href="{{ route('book.create') }}">Add New Book </a></li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
