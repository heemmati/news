@if(isset($groups)  && !empty($groups))
    @foreach($groups as $item)
        <h5>{{ $item->title }}</h5>
        <hr>
        <ul>


            @foreach($item->variations as  $attr)
                <li class="row alert alert-dark">
                    <div class="col-xs-5 col-md-4 ">
                        {{$attr->title}}
                    </div>
                    <div class="col-xs-7 col-md-8">
                        <select class="form-control" name="attr-value[{{$attr->id}}]" id="">
                            @foreach($attr->values as $key2 => $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach
                        </select>
                    </div>

                </li>

            @endforeach
        </ul>
    @endforeach
@endif
