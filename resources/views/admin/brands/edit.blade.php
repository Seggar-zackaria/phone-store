@php
    $html_tag_data = [];
    $title = 'Editer Une Marque';
    $description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row g-0">
                <!-- Title Start -->
                <div class="col-auto mb-3 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                        <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                            <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                            <span class="text-small align-middle">Home</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->

            </div>
            <!-- Title and Top Buttons End -->



            <div class="row my-5">

                <div class="col-xl-4">
                    <div class="mb-5">
                        <x-alert />
                        <h2 class="small-title">Editer Une Marque</h2>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('brands.update',$brand)}}" enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')

                                    <x-c-input type="text" label="Nom : " name="name" id="name" value="{{$brand->name}}"/>
                                    <x-c-input type="text" label="Slogan : " name="slug" id="slug" value="{{$brand->slug}}"/>
                                    <x-c-input type="text" label="Description : " name="description" id="description" value="{{$brand->description}}"/>

                                    
                                    <x-c-input type="file" label="Image : " name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}"/>
                                    <img src="{{asset('storage/' . $brand->thumbnail)}}" alt="Logo-{{$brand->name}}">

                                    <div class="form-check mt-3 mb-3">
                                        <input class="form-check-input" type="checkbox" @checked($brand->enabled) value="1" name="enabled" id="enabled">
                                        <label class="form-check-label" for="enabled">
                                            Active
                                        </label>
                                    </div>

                                    <button type="submit"  class="btn btn-outline-primary btn-icon btn-icon-start">
                                        <i data-acorn-icon="save"></i>
                                        <span>Valider</span>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>



        </div>
@endsection
