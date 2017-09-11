<div class="row wrapper border-bottom white-bg page-heading">       
<div class="col-sm-4">
    <h2>{{ isset($title) ? $title: "" }}</h2>    
    <ol class="breadcrumb">
        <li>
            <a href="{{ isset($root) ? $root : "" }}">{{ isset($rootTitle)? $rootTitle : "" }}</a>
        </li>
        <li class="active">
            <strong>{!! isset($currentTitle) ? $currentTitle : "" !!}</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        @if(isset($actionData))
            @foreach($actionData as $data)            
                @if(isset($data['visible']) && $data['visible'])
                    {!! link_to($data['url'], $data['title'], array_replace_recursive(['class'=>'margin-left'],$data['attributes'])) !!}
                @endif               
            @endforeach
        @elseif(isset($actionHtml))
            {!! $actionHtml !!}
        @endif 
    </div>
</div>
</div>