<div class="row wrapper border-bottom white-bg page-heading">       
<div class="col-sm-4">
    <h2>{{ isset($title) ? $title: "" }}</h2>    
    <ol class="breadcrumb">
        <li>
            <a href="{{ isset($root) ? $root : "" }}">{{ isset($rootTitle)? $rootTitle : "" }}</a>
        </li>
        <li class="active">
            <strong>{{ isset($currentTitle) ? $currentTitle : "" }}</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        {!! isset($actionHtml) ?  $actionHtml : "" !!}
    </div>
</div>
</div>