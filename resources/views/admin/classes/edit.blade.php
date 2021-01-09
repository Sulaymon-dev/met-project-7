@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('subjects.update',$subject->id)}}" method="post" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="card-header">
                                Тағйир додани <strong> фанни {{$subject->label}}</strong>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">Номи Фан :</label>
                                    <input class="form-control @error('label') is-invalid @enderror" id="name"
                                           type="text" name="label" value="{{ old('label') ?? $subject->label}}">
                                    @error('label')
                                    <div class="invalid-feedback">Лутфан номи фанро ворид намоед</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-col-form-label" for="inputError1">Номи Фан (бо англисӣ): </label>
                                    <input class="form-control @error('slug') is-invalid @enderror" id="inputError1"
                                           type="text" name="slug" value="{{old('slug') ?? $subject->slug}}">
                                    @error('slug')
                                    <div class="invalid-feedback">Лутфан номи фанро ворид намоед</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="type">Навъи дарс : </label>
                                            <div class="col-md-9">
                                                <select class="form-control " id="type" name="type">
                                                    <option {{$subject->type == 1 ? 'selected' :''}} value="1">Ҳатмӣ
                                                    </option>
                                                    <option {{$subject->type == 2 ? 'selected' :''}} value="2">
                                                        Олимпиада
                                                    </option>
                                                    <option {{$subject->type == 3 ? 'selected' :''}} value="3">ММТ
                                                    </option>
                                                    <option {{$subject->type == 4 ? 'selected' :''}} value="4">Иловагӣ
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="type">Синф : </label>
                                            <div class="col-md-9">
                                                <select class="form-control " id="type" name="class">
                                                    <option {{$subject->class == 1 ? 'selected' :''}} value="1">1
                                                    </option>
                                                    <option {{$subject->class == 2 ? 'selected' :''}} value="2">2
                                                    </option>
                                                    <option {{$subject->class == 3 ? 'selected' :''}} value="3">3
                                                    </option>
                                                    <option {{$subject->class == 4 ? 'selected' :''}} value="4">4
                                                    </option>
                                                    <option {{$subject->class == 5 ? 'selected' :''}} value="5">5
                                                    </option>
                                                    <option {{$subject->class == 6 ? 'selected' :''}} value="6">6
                                                    </option>
                                                    <option {{$subject->class == 7 ? 'selected' :''}} value="7">7
                                                    </option>
                                                    <option {{$subject->class == 8 ? 'selected' :''}} value="8">8
                                                    </option>
                                                    <option {{$subject->class == 9 ? 'selected' :''}} value="9">9
                                                    </option>
                                                    <option {{$subject->class == 10 ? 'selected' :''}} value="10">10
                                                    </option>
                                                    <option {{$subject->class == 11 ? 'selected' :''}} value="11">11
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 ">
                                       <div class="w-50 m-auto">
                                           @if(isset($subject->images))
                                               <img class="w-100" src="{{$subject->images}}">
                                           @endif
                                       </div>
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-4 col-form-label" for="image">Ивази акс : </label>
                                            <div class="col-md-8">
                                                <input class="" type="file" name="image" id="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Ваъият</label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="active" type="radio" value="1"
                                                   name="status" {{$subject->status == 1 ? 'checked' :''}}>
                                            <label class="form-check-label" for="active">Фаъол</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="inactive" type="radio" value="0"
                                                   name="status"{{$subject->status == 0 ? 'checked' :''}}>
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
