<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    
                    <li class="nav-header">
                        @include('include.back.sideuser')
                    </li>
                    
                    <li>
                        <a href="{{route('home')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('home')}}">Dashboard</a></li>                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{route('product.index')}}"><i class="fa fa-home"></i> <span class="nav-label">Office properties</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('product.create')}}">New property</a></li>     
                            <li><a href="{{route('product.index')}}">Search properties</a></li>                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{route('contact.index')}}"><i class="fa fa-user"></i> <span class="nav-label">Office contacts</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('contact.create')}}">New contact</a>
                            <li><a href="{{route('contact.index')}}">Search contacts</a>                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="/tasks/"><i class="fa fa-list-alt"></i> <span class="nav-label">Tasks</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/task/create">New task</a></li>                          
                            <li><a href="/task/">Search tasks</a></li>  
                        </ul>
                    </li>
                    
                    <li>
                        <a href="/tasks/"><i class="fa fa-list-alt"></i> <span class="nav-label">Office users</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/user/create">New office user</a></li>                          
                            <li><a href="/user/">Seaerch office users</a></li>  
                        </ul>
                    </li>
                    
                </ul>

            </div>
        </nav>