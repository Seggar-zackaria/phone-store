@php
    $html_tag_data = [];
    $title = 'List des Types';
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
                   <h2 class="small-title">Ajout Un Type</h2>
                   <div class="card">
                       <div class="card-body">
                           <form method="POST" action="{{route('types.store')}}" enctype="multipart/form-data">

                               @csrf

                               <x-c-input type="text" label="Nom : " name="name" id="name" value="{{old('name')}}"/>
                               <x-c-input type="text" label="Slogan : " name="slug" id="slug" value="{{old('slug')}}"/>
                               <x-c-input type="text" label="Description : " name="description" id="description" value="{{old('description')}}"/>
                               <x-c-input type="file" label="Image : " name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}"/>

{{--                               <div class="form-check mb-3">--}}
{{--                                   <input class="form-check-input" type="checkbox" @checked(old('enabled')) value="1" name="enabled" id="enabled">--}}
{{--                                   <label class="form-check-label" for="enabled">--}}
{{--                                       Active--}}
{{--                                   </label>--}}
{{--                               </div>--}}

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




            <!-- Start Table -->

        <div class="table-responsive">
            <table class="table table-striped align-middle text-center">
            <thead>

                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Nom</td>
                    <td>Slogan</td>
                    <td>Action</td>
                </tr>

                </thead>

                <tbody>

                    @foreach($types as $type)

                        <tr>
                            <td>{{$type->id}}</td>
                            <td>
                                <img src="{{asset('storage/' . $type->thumbnail)}}" width="30" alt="Logo-{{$type->name}}">
                            </td>
                            <td>{{$type->name}}</td>
                            <td>{{$type->slug}}</td>


                            <td>
                                <div class="btn-group gap-1" role="group" aria-label="Basic example">
                                    <a href="{{route('types.edit',$type->id)}}" class="btn rounded-sm btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                    <button type="submit" form="delete-type-{{$type->id}}" class="btn rounded-sm btn-primary"><i class="bi bi-trash-fill"></i></button>
                                </div>

                                <form action="{{route('types.destroy',$type->id)}}" id="delete-type-{{$type->id}}"  method="POST" onsubmit="return confirm('es-tu sûr ?')">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>

                    @endforeach

            </tbody>
            </table>

            {{$types->links()}}

        </div>



    </div>
@endsection
