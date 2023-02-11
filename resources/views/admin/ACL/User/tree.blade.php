@extends ('admin.layout.master')


@section('content')
    <style>
        .tree, .tree ul, .tree li {
            list-style: none;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .tree {
            margin: 0 0 1em;
            text-align: center;
        }

        .tree, .tree ul {
            display: table;
        }

        .tree ul {
            width: 100%;
        }

        .tree li {
            display: table-cell;
            padding: .5em 0;
            vertical-align: top;
        }

        /* _________ */
        .tree li:before {
            outline: solid 1px #666;
            content: "";
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
        }

        .tree li:first-child:before {
            right: 50%;
        }

        .tree li:last-child:before {
            left: 50%;
        }

        .tree a, .tree span {
            border: solid .1em #666;
            border-radius: .2em;
            display: inline-block;
            margin: 0 .2em .5em;
            padding: .2em .5em;
            position: relative;
        }

        /* If the tree represents DOM structure */
        .tree a {
            font-family: monaco, Consolas, 'Lucida Console', monospace;
        }

        /* | */
        .tree ul:before,
        .tree a:before,
        .tree span:before {
            outline: solid 1px #666;
            content: "";
            height: .5em;
            right: 50%;
            position: absolute;
        }

        .tree ul:before {
            top: -.5em;
        }

        .tree a:before,
        .tree span:before {
            top: -.55em;
        }

        /* The root node doesn't connect upwards */
        .tree > li {
            margin-top: 0;
        }

        .tree > li:before,
        .tree > li:after,
        .tree > li > a:before,
        .tree > li > span:before {
            outline: none;
        }
    </style>
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('users.index') }}">لیست کاربران </a>
                    </li>

                </ol>
            </nav>

            @can('users.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('users.create') }}">ایجاد کاربر جدید</a>

                </div>
            @endcan

        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($users) && !empty($users))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>کد بازاریابی</th>
                                            <th>نام</th>
                                            <th>سمت</th>
                                            <th>نام بالا سری</th>
                                            <th>ایمیل</th>
                                            <th> موبایل</th>
                                            <th> امتیاز</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            @if( !\App\Utility\Acl::isSuperAdmin($user->id) || \App\Utility\Acl::isSuperAdmin(auth()->id())  )

                                                <tr>
                                                    <td>{{ $user->presentation_code }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        {{ \App\Utility\Acl::getRole($user->role) }}
                                                    </td>
                                                    <td>
                                                        {{ $user->parent->name }}
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    <td>

                                                        {{ !empty($user->wallet) == true ? $user->wallet->rewards : 0 }}</td>
                                                    <td>


                                                        @can('users.show')
                                                            <a href="{{ route('users.show' , $user->id ) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        @endcan


                                                    </td>
                                                </tr>


                                            @endif
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>کد بازاریابی</th>
                                            <th>نام</th>
                                            <th>سمت</th>
                                            <th>نام بالا سری</th>
                                            <th>ایمیل</th>
                                            <th> موبایل</th>
                                            <th> امتیاز</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ کاربری یافت نشد
                                    </div>
                                @endif
                            </div>

                            <div class="card-body">
                                <figure>
                                    <figcaption>لیست زیرمجموعه ها بصورت درختی</figcaption>
                                    <ul class="tree">

                                        <li>
                                            <a>شما</a>
                                            {{ $tree }}
                                        </li>

                                    </ul>
                                </figure>
                                <figure>
                                    <figcaption>Example sitemap</figcaption>
                                    <ul class="tree">
                                        <li><span>Home</span>
                                            <ul>
                                                <li><span>About us</span>
                                                    <ul>
                                                        <li><span>Our history</span>
                                                            <ul>
                                                                <li><span>Founder</span></li>
                                                            </ul>
                                                        </li>
                                                        <li><span>Our board</span>
                                                            <ul>
                                                                <li><span>Brad Whiteman</span></li>
                                                                <li><span>Cynthia Tolken</span></li>
                                                                <li><span>Bobby Founderson</span></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span>Our products</span>
                                                    <ul>
                                                        <li><span>The Widget 2000™</span>
                                                            <ul>
                                                                <li><span>Order form</span></li>
                                                            </ul>
                                                        </li>
                                                        <li><span>The McGuffin V2</span>
                                                            <ul>
                                                                <li><span>Order form</span></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span>Contact us</span>
                                                    <ul>
                                                        <li><span>Social media</span>
                                                            <ul>
                                                                <li><span>Facebook</span></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </figure>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- DataTable -->


@endsection
@section('scripts')
    <script>
        // Deleting Warning and Confirm Needed
        $('.sa-warning').on('click', function () {
            swal({
                title: "آیا برای حذف اطمینان دارید؟",
                text: "با حذف این مورد شما قادر به بازگردانی آن نخواهید بود",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "بله! حذف کن",
                closeOnConfirm: false
            })
                .then((willDelete) => {
                    if (willDelete) {
                        if (willDelete) {
                            $(this).siblings('form').submit();
                        }
                    } else {
                        swal("Your imaginary file is safe!", {
                            icon: "error",
                        });
                    }
                });
        });


    </script>
@endsection
