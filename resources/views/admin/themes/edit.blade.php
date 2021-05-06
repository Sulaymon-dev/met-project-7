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
                        <form action="{{route('themes.update', $theme->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf @method("PUT")
                            <div class="card-header">
                                Тағйироти <strong> Мавзӯъ </strong>
                            </div>
                            <div class="card-body">

                                {{--                                plan_id--}}

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="plan">
                                            План :
                                        </label>
                                        <select class="form-control" name="plan_id"
                                                id="plan" {{$role == 'moderator' ? 'disabled':''}}>
                                            <option value="{{$theme->plan->id}}">
                                                Фанни {{$theme->plan->subject->name}},
                                                синфи {{$theme->plan->sinf->class}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label class="form-col-form-label" for="theme_num">Рақами Мавзӯъ :</label>
                                        <input class="form-control @error('theme_num') is-invalid @enderror"
                                               id="theme_num" {{$role == 'moderator' ? 'disabled':''}}
                                               type="text" name="theme_num"
                                               value="{{old('theme_num') ?? $theme->theme_num}} ">
                                        @error('theme_num')
                                        <div class="invalid-feedback">Лутфан рақами мавзӯъро ворид намоед</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-8">
                                        <label class="form-col-form-label" for="name">Номи мавзӯъ :</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id="name"
                                               type="text" name="name" value="{{old('name') ?? $theme->name}}"
                                            {{$role == 'moderator' ? 'disabled':''}}
                                        >
                                        @error('name')
                                        <div class="invalid-feedback">Лутфан номи мавзӯъро ворид намоед</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="introduction">Пешгуфтор</label>
                                    <textarea class="form-control" id="introduction" type="text" name="introduction"
                                              placeholder="Пешгуфторро ворид намоед"  {{$role == 'moderator' ? 'disabled':''}}
                                    >{{old('introduction') ?? $theme->introduction}}</textarea>
                                </div>

                                <hr style="border: 1px solid #bdbdbd">


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-5 col-form-label" for="image">Файли PDF дарс : </label>
                                            <div class="col-md-7">
                                                <input class="" type="file" name="pdf"
                                                       id="pdf" {{$role == 'moderator' ? 'disabled':''}}>
                                                <input
                                                    {{$role == 'moderator' ? 'disabled':''}}
                                                        value="{{old('pdf_src') ?? $theme->pdf_src}}"
                                                    class="form-control" type="text" placeholder="Номи файл" name="pdf_src" id="">

                                            @if(isset($theme->pdf_src))
                                                    <label for="oldPdf">
                                                        <input value="1" type="checkbox" checked name="saveOldPdf"
                                                               id="oldPdf" {{$role == 'moderator' ? 'disabled':''}}
                                                        >
                                                        Файли кӯҳнаро нигоҳ дор
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        @error('pdf')
                                        <div class="invalid-feedback">Лутфан файли дурустро (PDF) ворид намоед</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-3 col-form-label" for="video">Дарси видеоӣ : </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="video"
                                                       id="video" {{$role == 'moderator' ? 'disabled':''}}>
                                                <input
                                                    {{$role == 'moderator' ? 'disabled':''}}
                                                        value="{{old('video_src') ?? $theme->video_src}}"
                                                    class="form-control" type="text" name="video_src" placeholder="Номи файл" id="">

                                            @if(isset($theme->video_src))
                                                    <label for="oldVideo">
                                                        <input value="1" type="checkbox" checked name="saveOldVideos"
                                                               id="oldVideo" {{$role == 'moderator' ? 'disabled':''}}
                                                        >
                                                        Видеои кӯҳнаро нигоҳ дор
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        @error('video')
                                        <div class="invalid-feedback">Лутфан видеоро ворид намоед</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr style="border: 1px solid #bdbdbd">


                                @php
                                    $ex_type = 'matni';
                                        if (isset($theme->pdf_exercise)){
                                            if (str_ends_with($theme->pdf_exercise,'.pdf'))
                                                 $ex_type = 'pdf';
                                        }
                                @endphp

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Намуди супоришҳоро интихоб намоед : </label>
                                    <div class="col-md-8 col-form-label">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="matni" type="radio" value="matni"
                                                   onchange="onExerciseTypeChangeHandler()" name="exercise_type"
                                                {{$role == 'moderator' ? 'disabled':''}}
                                                {{$ex_type == 'matni' ? 'checked':''}}>
                                            <label class="form-check-label" for="matni">Матнӣ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="f_pdf" type="radio" value="f_pdf"
                                                   onchange="onExerciseTypeChangeHandler()" name="exercise_type"
                                                {{$role == 'moderator' ? 'disabled':''}}
                                                {{$ex_type == 'pdf' ? 'checked':''}}>
                                            <label class="form-check-label" for="f_pdf">Файли PDF</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row align-items-baseline" id="f_pdf_template"
                                     style="display: none">
                                    <label class="col-md-3 col-form-label" for="f_pdf_file">Файли Дарс : </label>
                                    <div class="col-md-5">
                                        <input class="" type="file" name="f_pdf_file"
                                               id="f_pdf_file" {{$role == 'moderator' ? 'disabled':''}}>
                                        <input
                                            {{$role == 'moderator' ? 'disabled':''}}
                                                value="{{old('f_pdf_file_src') ?? $theme->f_pdf_file_src}}"
                                            class="form-control" type="text" name="f_pdf_file_src" placeholder="Номи файл" id="">

                                    @if(isset($theme->pdf_exercise) && $ex_type =='pdf')
                                            <label for="oldPdfExercise">
                                                <input value="1" type="checkbox" checked name="saveOldPdfExercise"
                                                       id="oldPdfExercise" {{$role == 'moderator' ? 'disabled':''}}
                                                >
                                                Қиммати кӯҳнаро нигоҳ дор
                                            </label>
                                        @endif
                                    </div>
                                </div>

                                @php
                                    $matni_data = '';
                                    $oldText = old('matni_data');
                                    if ($oldText) $matni_data = $oldText;
                                    elseif ($ex_type == 'matni') $matni_data = $theme->pdf_exercise;
                                @endphp

                                <div class="form-group" id="matni_template">
                                    <label for="matni_data">Супориш ба намуди матнӣ</label>
                                    <textarea class="form-control" id="matni_data" type="text" name="matni_data"
                                              placeholder="Супоришро ворид намоед"  {{$role == 'moderator' ? 'disabled':''}}
                                    >{{ $matni_data }}</textarea>
                                </div>

                                <hr style="border: 1px solid #bdbdbd">
                                @if(in_array($role,['admin','teacher','superadmin']))

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Нашр шавад ? </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="publish" type="radio" value="1"
                                                       name="is_show" {{$theme->is_show == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="publish">Ҳа</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="unpablish" type="radio" value="0"
                                                       name="is_show" {{$theme->is_show == 0 ? 'checked' :''}}>
                                                <label class="form-check-label" for="unpablish">Не</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array($role,['admin','moderator','superadmin']))
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Ваъият : </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="active" type="radio" value="1"
                                                       name="status" {{$theme->status == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="active">Фаъол</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inactive" type="radio" value="0"
                                                       name="status" {{$theme->status == 0 ? 'checked' :''}}>
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
        CKEDITOR.replace('matni_data');
    </script>
    <script>

        function onExerciseTypeChangeHandler() {
            if ($('[name=exercise_type]:checked').val() === 'matni') {
                $("#matni_template").show();
                $("#f_pdf_template").hide();
                $("#f_pdf_file").val("")
            } else {
                $("#matni_template").hide();
                $("#matni_data").val("");
                $("#f_pdf_template").show()
            }
        }


        $(document).ready(function () {
            if ('{{$ex_type}}' !== 'matni') {
                $("#matni_template").hide();
                $("#f_pdf_template").show()
            }
            $('#plan').select2({
                ajax: {
                    url: '/admin/plans/list',
                    data: function (params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1
                        };
                        return query;
                    },
                    processResults: function (data, page) {
                        return {
                            results: data.data.map(function (item) {
                                return {
                                    id: item.id,
                                    text: `Фанни ${item.subject.name}, синфи ${item.sinf.class}`
                                };
                            }),
                            pagination: {
                                more: data.current_page < data.last_page
                            }
                        };
                    },
                }
            })
        })
    </script>
@endsection
