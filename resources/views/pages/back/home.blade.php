@extends('layouts.back.default')

@section('breadcrumb')
                <div class="row wrapper border-bottom white-bg page-heading">       
                    <div class="col-sm-4">
                        <h2>Welcome {!! Auth::user()->name  !!}</h2>
                         
                    </div>
                    <div class="col-sm-8"> 
                    </div>
                </div>
@stop 

@section("content")

@stop