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
                        <form action="{{route('olympics.update', $olympic->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf @method("PUT")
                            <div class="card-header">
                                Тағйироти <strong> маводи олимапиада </strong>
                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <label for="subject">
                                            Фан :
                                        </label>
                                        <select class="form-control" name="subject_id" id="subject" {{$role == 'moderator' ? 'disabled':''}}>
                                            @foreach($subjects as $subject)
                                                <option {{$subject->id == $olympic->subject_id ?'selected':''}} value="{{ $subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="sinf">
                                            Синф :
                                        </label>
                                        <select class="form-control" name="sinf_id" id="sinf" {{$role == 'moderator' ? 'disabled':''}}>
                                            @foreach($sinfs as $sinf)
                                                <option {{$sinf->id == $olympic->sinf_id ?'selected':''}}  value="{{ $sinf->id}}">{{$sinf->class}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" >
                                    <div class="col-sm-12">
                                        <label class="form-col-form-label" for="title">Сарлавҳа :</label>
                                        <input class="form-control " id="title" {{$role == 'moderator' ? 'disabled':''}}
                                               type="text" name="title" value="{{old('title') ?? $olympic->title}}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="introduction">Пешгуфтор :</label>
                                    <textarea class="form-control" id="introduction" type="text" name="introduction"
                                              placeholder="Пешгуфторро ворид намоед"  {{$role == 'moderator' ? 'disabled':''}}
                                    >{{old('introduction') ?? $olympic->introduction}}</textarea>
                                </div>

                                <hr style="border: 1px solid #bdbdbd">


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-5 col-form-label" for="image">Файли PDF дарс : </label>
                                            <div class="col-md-7">
                                                <input class="" type="file" name="pdf" id="pdf"  {{$role == 'moderator' ? 'disabled':''}}>
                                                @if(isset($olympic->pdf_src))
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
                                            <label class="col-md-3 col-form-label" for="img">AKS : </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="img" id="img"  {{$role == 'moderator' ? 'disabled':''}}>
                                                @if(isset($olympic->img_src))
                                                    <label for="oldImg">
                                                        <input value="1" type="checkbox" checked name="saveOldImg"
                                                               id="oldImg" {{$role == 'moderator' ? 'disabled':''}}
                                                        >
                                                        Акси кӯҳнаро нигоҳ дор
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        @error('video')
                                        <div class="invalid-feedback">Лутфан акси дурустро ворид созед</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr style="border: 1px solid #bdbdbd">
                                @if(in_array($role,['admin','teacher','superadmin']))

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Нашр шавад ? </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="publish" type="radio" value="1"
                                                       name="is_show" {{$olympic->is_show == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="publish">Ҳа</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="unpablish" type="radio" value="0"
                                                       name="is_show" {{$olympic->is_show == 0 ? 'checked' :''}}>
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
                                                       name="status" {{$olympic->status == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="active">Фаъол</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inactive" type="radio" value="0"
                                                       name="status" {{$olympic->status == 0 ? 'checked' :''}}>
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
@endsection
