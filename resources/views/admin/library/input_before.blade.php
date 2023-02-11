
    <div class="grand_col {{  isset($second_route) == true ? 'col-12 col-md-6' : 'col-12 col-md-12' }}">
        <div class="{{  isset($second_route) == true ? 'items_section' : '' }}">
            @if(isset($second_route) && !empty($second_route))
                <a href="javascript:void(0)"
                   data-route="{{ $second_route }}"
                   data_helper="{{ isset($helper) == true ? $helper->get_input_name('name') : '' }}"
                   class="add-item btn btn-success">
                    <i class="far fa-plus"></i>
                </a>
@endif
