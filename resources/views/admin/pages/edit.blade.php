@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('pages.update',  $page->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf  @method('PUT')
                            <div class="card-header">
                                Тағйироти <strong> саҳифа </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="title">Сархат :</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="title"
                                           type="text" name="title" value="{{old('title') ?? $page->title}}">
                                    @error('title')
                                    <div class="invalid-feedback">Лутфан сархатро дуруст ворид намоед</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Сархат (кӯтоҳ) :</label>
                                    <input class="form-control @error('short_title') is-invalid @enderror" id="short_title"
                                           type="text" name="short_title" value="{{old('short_title') ?? $page->short_title}}">
                                    @error('short_title')
                                    <div class="invalid-feedback">Лутфан сархатро ворид намоед</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="body">Танаи саҳифа  : </label>
                                    <textarea class="form-control" id="body" type="text" name="body"
                                              placeholder="Пешгуфторро ворид намоед"
                                    >{{old('body') ?? $page->body}}</textarea>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        @if(isset($page->img_src))
                                            <div class="w-50 m-auto">
                                                <img class="w-100" src="/storage/uploads/img/{{$page->img_src}}">
                                            </div>
                                        @endif
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-3 col-form-label" for="image">Акс : </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="image" id="image">
                                                @if(isset($page->img_src))
                                                    <label for="oldImage">
                                                        <input value="1" type="checkbox" name="saveOldImage" checked
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

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Ваъият</label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="active" type="radio" value="1"
                                                   name="status" {{$page->status == 1 ? 'checked' :''}}>
                                            <label class="form-check-label" for="active">Фаъол</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="inactive" type="radio" value="0"
                                                   name="status"{{$page->status == 0 ? 'checked' :''}}>
                                            <label class="form-check-label" for="inactive">Ғайрифаъол</label>
                                        </div>
                                    </div>
                                </div>
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
    <script src="/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
