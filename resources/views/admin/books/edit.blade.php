@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('books.update',$book->id)}}" method="post" enctype="multipart/form-data">
                            @csrf  @method('PUT')
                            <div class="card-header">
                                Тағйироти <strong> китоб </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">Ном :</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                           {{$role == 'moderator' ? 'disabled':''}}
                                           type="text" name="name" value="{{$book->name ?? old('name')}}">
                                    @error('name')
                                    <div class="invalid-feedback">Лутфан номи китобро ворид намоед</div>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-3 col-form-label" for="image">
                                                <a class="text-black"
                                                   href="/storage/uploads/pdf/{{$book->pdf_src}}">
                                                    Файли китоб :
                                                </a>
                                            </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="pdf" id="pdf"
                                                    {{$role == 'moderator' ? 'disabled':''}}
                                                >
                                                @error('pdf')
                                                <div style="display: inline-block" class="invalid-feedback">Лутфан файли дурустро (PDF) ворид намоед</div>
                                                @enderror
                                                @if(isset($book->pdf_src))
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

                                    <div class="col-sm-6">
                                        @if(isset($book->img_src))
                                            <div class="w-50 m-auto">
                                                <img class="w-100" src="/storage/uploads/img/{{$book->img_src}}">
                                            </div>
                                        @endif
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-3 col-form-label" for="image">Акс : </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="image"
                                                       id="image" {{$role == 'moderator' ? 'disabled':''}}
                                                >
                                                @error('image')
                                                <div style="display: inline-block" class="invalid-feedback">Лутфан аксро ворид намоед</div>
                                                @enderror
                                                @if(isset($book->img_src))
                                                    <label for="oldImage">
                                                        <input value="1" type="checkbox" name="saveOldImage" checked
                                                               {{$role == 'moderator' ? 'disabled':''}}
                                                               id="oldImage">
                                                        Акси Кӯҳнаро нигоҳ дор
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="invalid-feedback">Лутфан аксро ворид намоед</div>
                                        @enderror
                                    </div>
                                </div>

                                @if(in_array($role,['admin','teacher','superadmin']))
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Нашр шавад ? </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="publish" type="radio" value="1"
                                                       name="is_show" {{$book->is_show == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="publish">Ҳа</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="unpablish" type="radio" value="0"
                                                       name="is_show" {{$book->is_show == 0 ? 'checked' :''}}>
                                                <label class="form-check-label" for="unpablish">Не</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(in_array($role,['admin','moderator','superadmin']))
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Ваъият</label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="active" type="radio" value="1"
                                                       name="status" {{$book->status == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="active">Фаъол</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inactive" type="radio" value="0"
                                                       name="status"{{$book->status == 0 ? 'checked' :''}}>
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
