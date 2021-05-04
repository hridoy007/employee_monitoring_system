@extends('main')
@section('page')

{{--form start--}}

<form class="form-horizontal" method="post" action="{{route('attendance.create')}}">
    @csrf






    <div class="form-group ">
        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Check In</button>
    </div>

</form>
<form class="form-horizontal" method="post" action="{{route('attendance.update.create',$checkin->id)}}">
    @method('PUT')
    @csrf






    <div class="form-group ">
        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Check Out</button>
    </div>

</form>
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
