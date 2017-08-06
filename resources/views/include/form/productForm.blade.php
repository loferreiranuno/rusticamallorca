
<div class="wrapper wrapper-content animated fadeInRight">
    
   
    <div class="row">
        @include('include.form.errorMessage')
        {{csrf_field()}}
    </div>
    <div class="row">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1">Location</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2">Features</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3">Private data</a></li>
                <li class=""><a data-toggle="tab" href="#tab-4">Agreement</a></li>
                <li class=""><a data-toggle="tab" href="#tab-5">Other</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        @include("include.form.productFormLocation")
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        @include("include.form.productFormFeatures")
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body">
                        @include("include.form.productFormPrivate")
                    </div>
                </div>
                <div id="tab-4" class="tab-pane">
                    <div class="panel-body">
                        @include("include.form.productFormAgreement")
                    </div>
                </div>
                <div id="tab-5" class="tab-pane">
                    <div class="panel-body">
                        @include("include.form.productFormOther")
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-12 text-center">
            <div class="form-group">
                <br/>
                {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
            </div>
        </div>    
    </div>
</div>

@section('scripts')       
    <script src="{!! asset("js/plugins/iCheck/icheck.min.js") !!}"></script>
    <script src="{!! asset("js/plugins/typehead/bootstrap3-typeahead.min.js") !!}"></script>
    <script>
    function preventEnterSubmit(e) {
        if (e.which == 13) {
            var $targ = $(e.target);

            if (!$targ.is("textarea") && !$targ.is(":button,:submit")) {
                var focusNext = false;
                $(this).find(":input:visible:not([disabled],[readonly]), a").each(function(){
                    if (this === e.target) {
                        focusNext = true;
                    }
                    else if (focusNext){
                        $(this).focus();
                        return false;
                    }
                });

                return false;
            }
        }
    };
    $(document).ready(function () {
         $('body').on('keypress', preventEnterSubmit);
         
         $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });

    });
    </script>
@stop