@if(isset($model) && !empty($model))
@if($status == 1)
        <a href="{{ route('panel.change.status' , ['id'=> $model->id , 'model' => get_class($model)]) }}" class="btn btn-sm btn-success">
            منتشر شده
        </a>
        @elseif($status == 2)

        <a href="{{ route('panel.change.status' , ['id'=> $model->id , 'model' => get_class($model)]) }}" class="btn btn-sm btn-danger">
            رد شده
        </a>
        @else

        <a href="{{ route('panel.change.status' , ['id'=> $model->id , 'model' => get_class($model)]) }}" class="btn btn-sm btn-warning">
            در انتظار بررسی
        </a>

        @endif


        @else
        @if($status == 1)
        <a href="#" class="btn btn-sm btn-success">
            منتشر شده
        </a>
        @elseif($status == 2)

        <a href="#" class="btn btn-sm btn-danger">
            رد شده
        </a>
        @else

        <a href="#" class="btn btn-sm btn-warning">
            در انتظار بررسی
        </a>

        @endif
@endif

