@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                Иловаи <strong> НавгонӢ </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="title">Сархат :</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="title"
                                           type="text" name="title" value="{{old('title')}}">
                                    @error('title')
                                    <div class="invalid-feedback">Лутфан сархатро ворид намоед</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Маълумоти мухтасар оида ба хабар :</label>
                                    <textarea class="form-control" id="description" type="text" name="description"
                                              placeholder="Пешгуфторро ворид намоед" rows="6"
                                    >{{old('description')}}</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="body">Хабар : </label>
                                    <textarea class="form-control" id="body" type="text" name="body"
                                              placeholder="Пешгуфторро ворид намоед"
                                    >{{old('body')}}</textarea>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-3 col-form-label" for="image">Акс : </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="image" id="image">
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="invalid-feedback">Лутфан аксро ворид намоед</div>
                                        @enderror
                                    </div>
                                </div>

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
