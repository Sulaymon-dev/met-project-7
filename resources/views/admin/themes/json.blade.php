@extends('admin.layouts.main')

@section('content')
    <h1>Тести кушод</h1>

    <p>Шумора: {{ $quizCount }}</p>

    <form action="{{route('json-quiz4x1')}}" method="post">

        @csrf

        <input type="hidden" name="quizCount" value="{{$quizCount}}">

        <div class="col-md-12">
            @for($i=1;$i<=3;$i++)
                <h3>Тести {{$i}}</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="question{{$i}}"
                           placeholder="Enter your question">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer1</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="answer1-{{$i}}"
                           placeholder="Enter a TRUE option">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer2</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="answer2-{{$i}}"
                           placeholder="Enter a WRONG option">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer3</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="answer3-{{$i}}"
                           placeholder="Enter a WRONG option">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer4</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="answer4-{{$i}}"
                           placeholder="Enter a WRONG option">
                </div>
        @endfor

        <!-- checkbox -->
            <div class="form-quiz4x1">
                <label>
                    <input type="checkbox" name="quiz-status" class="minimal" checked/>
                </label>
                <label>Status</label>
            </div>

            <div style="display: flex;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">JS file name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="quiz-js"
                               placeholder="Enter a JS file name">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CSS file name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="quiz-css"
                               placeholder="Enter a CSS file name">
                    </div>
                </div>
            </div>

        </div>


        <h1>Мувофиковарӣ</h1>

        <div class="col-md-12">
            <div style="display: flex">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">term1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="term1"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">term2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="term2"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">term3</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="term3"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">term4</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="term4"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">term5</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="term5"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">term6</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="term6"
                               placeholder="Enter a  option">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">definitions1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="definitions1"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">definitions2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="definitions2"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">definitions3</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="definitions3"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">definitions4</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="definitions4"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">definitions5</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="definitions5"
                               placeholder="Enter a  option">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">definitions6</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="definitions6"
                               placeholder="Enter a  option">
                    </div>
                </div>
            </div>

            <!-- checkbox -->
            <div class="form-group">
                <label>
                    <input type="checkbox" name="matching-status" class="minimal" checked/>
                </label>
                <label>Status</label>
            </div>

            <div style="display: flex;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">JS file name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="matching-js"
                               placeholder="Enter a JS file name">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CSS file name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="matching-css"
                               placeholder="Enter a CSS file name">
                    </div>
                </div>
            </div>


        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>

@endsection
