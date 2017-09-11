<div class="dropdown profile-element"> <span>
    <img alt="image" class="img-circle" src="{!! asset('img/profile_small.jpg')!!}" />
        </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
        </span> <span class="text-muted text-xs block">User <b class="caret"></b></span> </span> </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><a href="{{route('user.show', ['user'=>Auth::id()])}}">Profile</a></li>
        <li><a href="{{route('contact.show',['user'=>Auth::user()])}}">Contacts</a></li>        
        <li class="divider"></li>
        <li><a  href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
    </ul>
</div>
<div class="logo-element">
    RM
</div>



                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>   