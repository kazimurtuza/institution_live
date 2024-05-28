@if($courseList)
    <option value="">SELECT COURSE</option>
    @foreach($courseList as $value)
        <option value="{{$value->id}}">{{$value->title}}</option>
    @endforeach
@endif
