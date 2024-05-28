
<div class="test__qus-block">
    <input type="hidden" id="question_id_info" name="question_id" value="{{$question->questionInfo->id}}">
    <h3 class="test__question">
        <span class="test__question__count">{{$question_no}}.</span>
        {{$question->questionInfo->question}}
    </h3>
    <div class="test__ans-wrap">
        @foreach($questionList as $list)
        <div class="test__ans flex-ctr">
            <input type="radio" name="answer" id="ans1" value="{{$list->id}}" onclick="selectedans({{$list->id}})" />
            <label for="ans1" class="text"> {{$list->option}} </label>
        </div>
        @endforeach
    </div>
    <div class="test__btns">
        <span class="test__btn btn-primary skip-btn" onclick="submitAns(1)">Skip</span
        ><span class="test__btn btn-primary" id="nextbtn" onclick="submitAns(0)">Next Question</span>
    </div>
</div>
