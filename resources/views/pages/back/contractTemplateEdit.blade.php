@extends('layouts.back.default')
 
 @section('breadcrumb')
    @include("include.back.breadcrumb", 
    [
        'title' => isset($template) ? "Edit template" : "Create new template",
        'rootTitle' => "Contract templates",
        'root' => route("contracttemplate.index"),
        'currentTitle' => isset($template)? $template->name: "New template", 
        'actionData'=> [ 
            ["url"=> route('contracttemplate.create'), "visible"=> true, "title"=> "Add", "attributes"=> ['class'=>'btn btn-primary']]
        ]
    ])    
@stop 

@section('content') 
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="row">
            @if(isset($template))
                {{ Form::model($template, ['route' => ['contracttemplate.update', $template->id], 'method' => 'patch']) }}
            @else
                {{ Form::open(['route' => 'contracttemplate.store']) }}
            @endif
            <div class="col-lg-7">
                
                @include('include.form.templateForm',['types'=>$templateTypes, 'template'=>$template])
                <div class="text-center">
                    {!! Form::submit('Submit', ['class'=> 'btn btn-success']) !!} 
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12 alert-success">
                        <h1>How to create a template</h1>
                        <ol>
                            <li>Selecciona un tipo de contrato en el desplegable.</li>
                            <li>Escribe el contenido de la plantilla rellenando los datos con etiquetas.</li>
                        </ol>
                        <strong>Recuerda copiar las etiquetas exactamente como se muestran.</strong>

                        <div class="form-group text-left">

                            @foreach(App\ModelTemplateType::all() as $templateType)
                                <ul data-id="{{$templateType->id}}" data-code="{{$templateType->code}}" class="template-types hidden">
                                    @foreach($templateType->AvailableKeys as $key)
                                        <li><small>{{ __("template.".$key)}}:</small> <code>{!! "#" . $key . "#" !!}</code></li>
                                    @endforeach
                                </ul>    
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section("scripts")
@parent
<script>

    var initKeys = function (id){
        $(".template-types").addClass("hidden");
        $(".template-types[data-id='" + id + "']").removeClass("hidden");
    }

    $(document).ready(function()
    {   
        $("[name='model_type_id']").on("change",function(){ 
            initKeys($(this).val());
        });

        initKeys($("[name='model_type_id']").val());
    });
</script>
@stop