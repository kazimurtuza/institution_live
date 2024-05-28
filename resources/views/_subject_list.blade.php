@if($subjectList)
    <option value="">SELECT SUBJECT</option>
    @foreach($subjectList as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
    @endforeach
@endif
