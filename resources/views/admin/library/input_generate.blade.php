@foreach($inputs as $key => $input)

    @if($key != 'haveItem')
        @switch($input[1])
            @case('lang')
            @include('admin.forms.select' , [ 'type' =>  __('routes.'.$route_name.'_singular')   , 'field' => $key , 'fieldFa' =>  __('admin.'.$key)  , 'important' => $input[0] == '1' ? '1' : NULL , 'utils' => \App\Utility\Lang::languages(), 'value' => isset($object) == true ? $object->$key : '', 'second_route' => isset($second_route) == true ? $second_route : ''])
            @break
            @case('body')
            @include('admin.forms.textarea' , ['type' => __('routes.'.$route_name.'_singular') , 'field' => $key , 'fieldFa' => __('admin.'.$key) , 'important' => $input[0] == '1' ? '1' :NULL , 'value' => isset($object) == true ? $object->$key : '', 'second_route' => isset($second_route) == true ? $second_route : '']  )
            @break
            @case('description')
            @include('admin.forms.textarea' , ['type' => __('routes.'.$route_name.'_singular') , 'field' => $key , 'fieldFa' => __('admin.'.$key) , 'important' => $input[0] == '1' ? '1' : NULL, 'value' => isset($object) == true ? $object->$key : '', 'second_route' => isset($second_route) == true ? $second_route : ''])
            @break

            @case('select')

            @include('admin.forms.select' , [ 'type' =>  __('routes.'.$route_name.'_singular')   , 'field' => $key , 'fieldFa' =>  __('admin.'.$key)  ,'important' => $input[0] == '1' ? '1' : NULL  , 'items' => !empty($input[2]) == true ? $input[2]::latest()->get() : '' , 'value' => isset($object) == true ? $object->$key : '', 'second_route' => isset($second_route) == true ? $second_route : ''])
            @break

            @case('image')
            @include('admin.forms.image' , [ 'type' =>  __('routes.'.$route_name.'_singular')   , 'field' => $key , 'fieldFa' =>  __('admin.'.$key)  , 'important' => $input[0] == '1' ? '1' : NULL, 'items' => !empty($input[2]) == true ? $input[2]::latest()->get() : '' , 'value' => isset($object) == true ? $object->$key : '', 'second_route' => isset($second_route) == true ? $second_route : ''])
            @break

            @default
            @include('admin.forms.text' , ['input' => $input[1]  , 'type' => __('routes.'.$route_name.'_singular') , 'field' => $key , 'fieldFa' => __('admin.'.$key) , 'important' => $input[0] == '1' ? '1' : NULL , 'value' => isset($object) == true ? $object->$key : '', 'second_route' => isset($second_route) == true ? $second_route : ''])

        @endswitch
    @else
        @php

            $class = new $input[0];
                if (isset($helper) && !empty($helper)){
                $helper->second_routes_generator($class->getRoute());
                }
                else{
                  $helper = new \App\Helpers\ViewHelpers();
                  $helper->second_routes_generator($class->getRoute());
                }


        @endphp

        @include('admin.library.inputs' , [
        'inputs' => $class->getFormables() ,
        'route_name' => $class->getRoute() ,
        'second_route' => $class->getRoute() ,
        'helper' => $helper
        ])
    @endif

@endforeach
