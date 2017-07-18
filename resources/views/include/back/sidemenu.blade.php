<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    
                    <li class="nav-header">
                        @include('include.back.sideuser')
                    </li>
                    
                    <li>
                        <a href="/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/">Dashboard</a></li>                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="/products/"><i class="fa fa-home"></i> <span class="nav-label">MY PROPERTIES</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/product/create/">NEW</a></li>     
                            <li><a href="/product/">LIST</a></li>                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="/contacts/"><i class="fa fa-user"></i> <span class="nav-label">CONTACTS</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/contact/create/">NEW</a>
                            <li><a href="/contact/">LIST</a>                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="/tasks/"><i class="fa fa-list-alt"></i> <span class="nav-label">TASKS</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/task/create">NEW</a></li>                          
                            <li><a href="/task/">LIST</a></li>  
                        </ul>
                    </li>
                    
                </ul>

            </div>
        </nav>