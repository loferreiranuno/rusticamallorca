<div class="row">
    <div class="col-xs-12 col-sm-12 staff-box" style="z-index:1000">
    @if(!in_array($contact->step->name, ["won","lost"]))
        @if($contact->kind->name != "owner") 
            @foreach(App\ContactStep::whereNotIn('name',['won','lost'])->get() as $step)
            @include('include.pages.stepRowCell', ['size'=> 3,'contact'=>$contact, 'step'=>$step])
            @endforeach
        @endif
    @else
        @include('include.pages.stepRowCell', ['size'=> 12,'contact'=>$contact, 'step'=>$contact->step])
    @endif
    </div>
</div>

@section("styles")

<style>
.funnel-contact .glyphicon{margin-right:4px;}.funnel-contact{cursor:move;}.funnel-step{border-top:1px solid #CCC;}.funnel-step-empty{min-height:600px;}.funnel-title{margin:0;padding:5px;color:white;text-align:center;opacity:0.85;}.funnel-title .glyphicon-chevron-right{margin-top:3px;font-size:80%;}#funnel-title-1{background:#2ecc71}#funnel-title-2{background:#f1c40f}#funnel-title-3{background:#e67e22}#funnel-title-4{background:#c0392b}#funnel-title--1{background:#d73925}#funnel-title-5:{background:#008d4c}.funnel-column{padding:0}.funnel-footer-steps{display:none;position:fixed;bottom:0px;width:85%;height:60px;line-height:60px;}.won-step,.lost-step{font-size:170%;text-align:center;color:white;}.won-step:hover,.lost-step:hover{opacity:0.7;}.won-step{background-color:#2cc16a;}.lost-step{background-color:#e74c3c;}.step-inactive{color:#888!important;background-color:rgba(0,0,0,0.07)!important;}#filters .controls{padding:15px 5px!important;}.pager{margin-top:-5px;margin-bottom:10px;}
</style>
@stop

@section("scripts")
<script>
$(document).ready(function(){
    $("[step-action-btn]").on('click', function(evt){
        evt.preventDefault();

        var step_id = $(this).data("step-id");        
        var url = $(this).data("href");

        console.log(url, step_id);
         
        $.ajax({
            method:'PUT',
            url: url,
            data: {
                step_id: step_id, 
                _token: "{{csrf_token()}}"
            },
            success:function(){
                window.location.reload();
            }
        }) 
    });
});
</script>
@stop