<blockquote class="item">
    <aside class="cite">
        <p class="team-color">{{$comment->text}}</p>
    </aside>
    <figure>
        <div class="image">
            <img src="{{$comment->image}}" alt="">
        </div>
        <p>{{$comment->name}}</p>
        <p class="team-color">{{$comment->email}}</p>
    </figure>
</blockquote>