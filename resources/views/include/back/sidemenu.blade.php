    
     
     <nav class="navbar-default navbar-static-side "   role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    
                    <li class="nav-header">
                        @include('include.back.sideuser')
                    </li>
                    
                    <li class="{{Ekko::isActiveRoute('home')}}">
                        <a href="{{route('home')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{Ekko::isActiveRoute('home')}}" ><a href="{{route('home')}}">Dashboard</a></li>                            
                        </ul>
                    </li>
                    
                    <li class="{{Ekko::areActiveRoutes(['product.index', 'product.show', 'product.create', 'product.edit'])}}">
                        <a href="{{route('product.index')}}"><i class="fa fa-home"></i> <span class="nav-label">Office properties</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            {{-- <li><a class="{{Ekko::isActiveRoute('product.create')}}" href="{{route('product.create')}}">New property</a></li>      --}}
                            <li class="{{Ekko::isActiveRoute('product.index')}}" >
                            <a href="{{route('product.index')}}">
                            <i class="fa fa-search"></i> Search properties</a></li>                            
                        </ul>
                    </li>
                    
                    <li  class="{{Ekko::areActiveRoutes(['contact.index', 'contact.show', 'contact.create', 'contact.edit'])}}">
                        <a href="{{route('contact.index')}}" >
                            <i class="fa fa-user"></i> <span class="nav-label">Office contacts</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
                            <li class="{{Ekko::isActiveRoute('contact.index')}}">
                                <a href="{{route('contact.index')}}">
                                    <i class="fa fa-search"></i> Search contacts
                                </a>                            
                            </li>                            
                        </ul>
                    </li>                    
                    <li  class="{{Ekko::areActiveRoutes(['task.index', 'task.show', 'task.create'])}}">
                        <a href="/tasks/"><i class="fa fa-list-alt"></i> <span class="nav-label">Tasks</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{Ekko::isActiveRoute('task.index')}}"><a href="{{route('task.index')}}">My tasks</a></li>   
                        </ul>
                    </li>
                    
                    <li  class="{{Ekko::areActiveRoutes(['user.index', 'user.show', 'user.create'])}}">
                        <a href="/tasks/"><i class="fa fa-list-alt"></i> <span class="nav-label">Office users</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{Ekko::isActiveRoute('user.show')}}"><a href="{{route('user.show', ['user'=> Auth::id()])}}">My profile</a></li> 
                            <li class="{{Ekko::isActiveRoute('user.create')}}"><a href="{{route('user.create')}}" >New office user</a></li>                          
                            <li class="{{Ekko::isActiveRoute('user.index')}}"><a href="{{route('user.index')}}">Seaerch office users</a></li>  
                        </ul>
                    </li>
                    
                </ul>

            </div>
        </nav>
 