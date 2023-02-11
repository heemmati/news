@extends ('admin.layout.master')


@section('content')
    <div class="content-body">

        <div class="content">

            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.panel') }}">داشبورد</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">
                                مشاهده اعلانیه
                            </a>
                        </li>

                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-md-12">



                    <div class="row">
                        <div class="col-md-12">
                            <h5> مشاهده اعلانیه</h5>
                            <hr>
                            <div class="">
                                <div class="card bg-primary text-center p-12">
                                    <blockquote class="blockquote mb-0 card-body">
                                        <p>
                                            {!! $object->body !!}
                                        </p>
                                        <footer class="blockquote-footer">
                                            <small class="text-muted">
                                              <cite title="Source Title">
                                                  {{ $object->title }}
                                              </cite>
                                            </small>
                                        </footer>
                                    </blockquote>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>


    </div>
@endsection

