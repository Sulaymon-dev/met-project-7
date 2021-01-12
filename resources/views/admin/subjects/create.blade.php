@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('subjects.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                Иловаи <strong> фанни </strong> нав
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">Номи Фан :</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                           type="text" name="name" value="{{old('name')}}">
                                    @error('label')
                                    <div class="invalid-feedback">Лутфан номи фанро ворид намоед</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-3 col-form-label" for="image">Акс : </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="image_src" id="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Ваъият</label>
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

@endsection
