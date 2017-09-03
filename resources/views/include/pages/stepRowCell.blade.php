 <div class="col-xs-{{$size}} funnel-column" style="margin-bottom:10px;">
    
    @if(!$contact->lost && !$contact->won)
    <a step-action-btn data-step-id="{{$step->id}}" data-href="{{route('contact.step',['id'=>$contact->id])}}">
    <h2 class="funnel-title {{ ($contact->step->id == $step->id) ? '': 'step-inactive'}}" id="funnel-title-{{$step->id}}" style="font-size:20px;">
        <div class="funnel-title-text">
        {{$step->name}}

            <span class="glyphicon glyphicon-chevron-right pull-right"></span>
        
        </div>
    </h2>
    </a> 
    @else
       <h2 class="funnel-title" id="funnel-title-{{$step->name == 'won' ? 1 : 4}}" style="font-size:20px;">
        <div class="funnel-title-text">
            {{$step->name}}        
        </div>
        </h2>
    @endif
</div>