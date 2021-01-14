@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('subjects.update',$subject->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="card-header">
                                Тағйир додани <strong> фанни {{$subject->name}}</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">Номи Фан :</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                           type="text" name="name" value="{{ old('name') ?? $subject->name}}">
                                    @error('name')
                                    <div class="invalid-feedback">Лутфан номи фанро ворид намоед</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="w-50 m-auto">
                                            @if(isset($subject->image_src))
                                                <img class="w-100" src="/storage/uploads/img/{{$subject->image_src}}">
                                            @endif
                                        </div>
                                        <div class="form-group row d-flex align-items-baseline">
                                            <label class="col-md-4 col-form-label" for="image">Ивази акс : </label>
                                            <div class="col-md-8">
                                                <input class="" type="file" name="image_src" id="image">
                                                @if(isset($subject->image_src))
                                                    <label for="oldImage">
                                                        <input value="1" type="checkbox" name="saveOldImage"
                                                               id="oldImage">
                                                        Акси Кӯҳнаро нигоҳ дор
                                                    </label>
                                                @endif
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
