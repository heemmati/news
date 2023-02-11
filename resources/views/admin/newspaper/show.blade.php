@extends('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">داشبورد</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="">نمایش خبرنامه</a>
                    </li>


                </ol>
            </nav>
        </div>

        <div class="row">


            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">

                                <small class="show-small"> عنوان خبرنامه  </small>

                                <h6 class="show-title">
                                    {{$newspaper->title}}
                                </h6>
                            </div>


                            <div class="col-md-12">

                                <small class="show-small"> بدنه خبرنامه  </small>
                                <div class="show-body">
                                    {!!  $newspaper->body !!}
                                </div>

                            </div>


                            <div class="col-md-6">

                                <small class="show-small"> وضعیت خبرنامه  </small>
                                <a href="javascript:void(0)"
                                   class="btn btn-xs show-status  {{  \App\Utility\Status::get_status_class($newspaper->status) }}">
                                    {{  \App\Utility\Status::get_status($newspaper->status) }}
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
@endsection
