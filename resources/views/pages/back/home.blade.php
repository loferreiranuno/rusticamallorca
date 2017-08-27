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
<div class="row">
<div class="col-lg-4">
    <div class="widget primary-bg p-lg text-center">
        <div class="m-b-md">
        <a href="{{ route('product.index') }}">
            <i class="fa fa-home fa-4x"></i>
        </a>
            <h1 class="m-xs">{{ App\Product::count()  }}</h1>
            <h3 class="font-bold no-margins">
                Properties
            </h3>
            <small>Created {{ Auth::user()->productsManaged()->count()  }} | Managed {{ Auth::user()->productsManaged()->count() }} | Recruited {{ Auth::user()->productsRecruited()->count() }}</small>            
        </div>
    </div>          
</div>
<div class="col-lg-4">
    <div class="widget  primary-bg  p-lg text-center">
        <div class="m-b-md">
            <a href="{{ route('contact.index') }}">
                <i class="fa fa-users fa-4x"></i>
            </a>
            <h1 class="m-xs">{{ App\Contact::count() }}</h1>
            <h3 class="font-bold no-margins">
                Contacts
            </h3>
            <small>Created {{ Auth::user()->contactsCreated()->count() }} | Responsible {{ Auth::user()->contactsReponsible()->count() }}</small>
        </div>
    </div>          
</div>
<div class="col-lg-4">
    <div class="widget primary-bg p-lg text-center">
        <div class="m-b-md">
            <a href="{{ route('task.index') }}">
                <i class="fa fa-calendar fa-4x"></i>
            </a>
            <h1 class="m-xs">{{ Auth::user()->tasks()->count()}}</h1>
            <h3 class="font-bold no-margins">
                Calendar
            </h3>
            <small>Today {{ Auth::user()->todayTasks()->count() }}</small>
        </div>
    </div>          
</div>
</div>
@stop