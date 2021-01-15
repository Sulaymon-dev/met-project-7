@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                Иловаи <strong> Китоби </strong> нав
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">Ном :</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                           type="text" name="name" value="{{old('name')}}">
                                    @error('name')
                                    <div class="invalid-feedback">Лутфан номи синфро ворид намоед</div>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-3 col-form-label" for="image">Файли китоб : </label>
                                            <div class="col-md-9">
                                                <input class="" type="file" name="pdf" id="pdf">
                                            </div>
                                        </div>
                                        @error('pdf')
                                        <div class="invalid-feedback">Лутфан файли дурустро (PDF) ворид намоед</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
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

@endsection
