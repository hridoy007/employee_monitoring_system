@extends('main')
@section('page')

{{--form start--}}
<center>
<form class="form-horizontal" method="post" action="{{route('attendance.create')}}">
    @csrf





<div class="col-12">
    <div class="col-4"></div>
    <div class="col-4">
    <div class="form-group ">
        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Check In</button>
    </div>
    </div>
</div>
</form>
</center>

{{--<form class="form-horizontal" method="post" action="{{route('attendance.update.create',$checkin->id)}}">--}}
{{--    @method('PUT')--}}
{{--    @csrf--}}






{{--    <div class="form-group ">--}}
{{--        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Check Out</button>--}}
{{--    </div>--}}

{{--</form>--}}
</div>

</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
</div>

@endsection
