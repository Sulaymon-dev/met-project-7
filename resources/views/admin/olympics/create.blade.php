@extends('admin.layouts.main')

@section('style')
    <link rel="stylesheet" href="/libs/select2/css/select2.min.css">

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('olympics.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                Иловаи <strong> Олимпиадаи </strong> нав
                            </div>
                            <div class="card-body">


                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <label for="subject">
                                            Фан :
                                        </label>
                                        <select class="form-control" name="subject_id" id="subject">
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="sinf">
                                            Синф :
                                        </label>
                                        <select class="form-control" name="sinf_id" id="sinf">
                                            @foreach($sinfs as $sinf)
                                                <option value="{{$sinf->id}}">{{$sinf->class}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="form-col-form-label" for="title">Сарлавҳа :</label>
                                        <input class="form-control " id="title"
                                               type="text" name="title" value="{{old('title')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="introduction">Пешгуфтор :</label>
                                    <textarea class="form-control" id="introduction" type="text" name="introduction"
                                              placeholder="Пешгуфторро ворид намоед"
                                    >{{old('introduction')}}</textarea>
                                </div>

                                <hr style="border: 1px solid #bdbdbd">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-5 col-form-label" for="image">Файли PDF дарс : </label>
                                            <div class="col-md-7">
                                                <input class="" type="file" name="pdf" id="pdf">
                                            </div>
                                        </div>
                                        @error('pdf')
                                        <div class="invalid-feedback">Лутфан файли дурустро (PDF) ворид намоед</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-3 col-form-label" for="img">Акс : </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="img" id="img">
                                            </div>
                                        </div>
                                        @error('img')
                                        <div class="invalid-feedback">Лутфан аксро дуруст ворид намоед</div>
                                        @enderror
                                    </div>
                                </div>



                                <hr style="border: 1px solid #bdbdbd">

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Нашр шавад ? </label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="publish" type="radio" value="1"
                                                   name="is_show" checked>
                                            <label class="form-check-label" for="publish">Ҳа</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="unpablish" type="radio" value="0"
                                                   name="is_show">
                                            <label class="form-check-label" for="unpablish">Не</label>
                                        </div>
                                    </div>
                                </div>

                                @if(in_array(auth()->user()->role,['admin','moderator','superadmin']))
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Ваъият : </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="active" type="radio" value="1"
                                                       name="status" checked>
                                                <label class="form-check-label" for="active">Фаъол</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inactive" type="radio" value="0"
                                                       name="status">
                                                <label class="form-check-label" for="inactive">Ғайрифаъол</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>


                            <div class="card-footer">
                                <button class="btn btn-sm btn-success" type="submit">
                                    <i class="fa fa-dot-circle-o"></i> OK
                                </button>
                                <button class="btn btn-sm btn-danger" type="reset">
                                    <i class="fa fa-ban"></i> Тоза кардан
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/libs/select2/js/select2.full.min.js"></script>
    <script src="/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>
    <script>

        $(document).ready(function () {
            $('#subject').select2()
        })
    </script>
@endsection
