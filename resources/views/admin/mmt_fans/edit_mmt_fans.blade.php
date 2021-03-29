@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('mmt_fans.update',$mmtFan->id)}}" method="post" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="card-header">
                                Тести "4х1"-и маркази миллии тестӣ
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label class="form-col-form-label" for="name">Номи маҷмӯаи тестҳо :</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id="name"
                                               {{$role == 'moderator' ? 'disabled':''}}
                                               type="text" name="title" value="{{$mmtFan->title ?? old('title')}}" >
                                        @error('name')
                                        <div class="invalid-feedback">Лутфан номро ворид намоед</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row d-flex align-items-baseline col-12">
                                        <label class="col-md-3 col-form-label" for="image">Файли китоб : </label>
                                        <div class="col-md-9">
                                            <input class=""
                                                   {{$role == 'moderator' ? 'disabled':''}}
                                                   type="file" name="pdf" id="pdf">
                                            @if(isset($mmtFan->pdf_src))
                                                <label for="oldPdf">
                                                    <input value="1" type="checkbox" checked name="saveOldPdf"
                                                           id="oldPdf" {{$role == 'moderator' ? 'disabled':''}}
                                                    >
                                                    Китоби кӯҳнаро нигоҳ дор
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Нашр шавад ? </label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="publish" type="radio" value="1"
                                                   name="is_show" {{$mmtFan->is_show == 1 ? 'checked' :''}}>
                                            <label class="form-check-label" for="publish">Ҳа</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="unpablish" type="radio" value="0"
                                                   name="is_show" {{$mmtFan->is_show == 0 ? 'checked' :''}}>
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
                                                       name="status"  {{$mmtFan->status == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="active">Фаъол</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inactive" type="radio" value="0"
                                                       name="status" {{$mmtFan->status == 0 ? 'checked' :''}}>
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

@endsection
