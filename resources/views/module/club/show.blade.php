@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="">
                            نمایش باشگاه مشتری
                        </a>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ $object->title }}</h6>
                            <p>
                                {{ $object->description }}
                            </p>

                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>آیدی</th>
                                <th>تصویر کاربر</th>
                                <th>نام کاربر</th>
                                <th>ایمیل کاربر</th>
                                <th>شماره  همراه کاربر</th>
                                <th>امتیاز</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $object->users as $user)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>

                                            <img class="rounded-circle" src="{{ Storage::url($user->avatar) }}" alt="">

                                    </td>
                                    <td>
                                        {{ $user->name }} {{ $user->family }}
                                    </td>


                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->mobile }}
                                    </td>

                                    @if(isset($user->wallet))
                                   <td>
                                       {{ $user->wallet->rewards }}
                                   </td>
                                        @else
                                        <td>
                                            0
                                        </td>

                                    @endif


                                                                       </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>آیدی</th>
                                <th>تصویر کاربر</th>
                                <th>نام کاربر</th>
                                <th>ایمیل کاربر</th>
                                <th>شماره کاربر</th>
                                <th>امتیاز</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection


