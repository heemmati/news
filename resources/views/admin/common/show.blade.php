@extends('admin.layout.master')


@section('content')
    <div class="content">

        @include('admin.library.breadcrumb')

        <div class="row">


            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">


                            @foreach( $shows as $key => $show)
                                @if(isset($object->$key) && !empty($object->$key))
                                    @switch($show[0])
                                        @case("title")
                                        @include('shows.title')
                                        @break
                                        @case("email")
                                        @include('shows.email')
                                        @break
                                        @case("body")
                                        @include('shows.body')
                                        @break
                                        @case("image")
                                        @include('shows.image')
                                        @break
                                        @case("status")
                                        @include('shows.status')
                                        @break
                                        @case("utility")
                                        @include('shows.utility')
                                        @break
                                        @case("select")
                                        @include('shows.select')
                                        @break
                                        @case("number")
                                        @include('shows.number')
                                        @break
                                        @case("file")
                                        @include('shows.file')
                                        @break
                                        @case("icon")
                                        @include('shows.icon')
                                        @break
                                        @case("link")
                                        @include('shows.link')
                                        @break
                                        @default
                                        @include('shows.text')
                                    @endswitch
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
@endsection
