@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('sinfs.update',$sinf->id)}}" method="post">
                            @csrf  @method('PUT')
                            <div class="card-header">
                                Тағйироти <strong> синф </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">Синф :</label>
                                    <input class="form-control @error('label') is-invalid @enderror" id="name"
                                           type="text" name="label" value="{{ $sinf->class ?? old('label')}}">
                                    @error('label')
                                    <div class="invalid-feedback">Лутфан номи синфро ворид намоед</div>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Ваъият</label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="active" type="radio" value="1"
                                                   name="status" {{$sinf->status == 1 ? 'checked' :''}}>
                                            <label class="form-check-label" for="active">Фаъол</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="inactive" type="radio" value="0"
                                                   name="status"{{$sinf->status == 0 ? 'checked' :''}}>
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
