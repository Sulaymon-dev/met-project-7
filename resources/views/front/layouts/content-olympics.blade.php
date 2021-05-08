<div>
    @if(sizeof($olympics)<=0)
        <x-danger-text text="Дар синфи зерин маводи чунин фан вуҷуд надорад..."></x-danger-text>
    @else

        <div class="category-2-items mb-4">
            <div class="row">
                @foreach($olympics as $item)
                    @if($item->sinf->class==$sinf)
                        <div class="col-md-6">
                            <div class="single-items text-center mt-30 ">
                                <a href="{{route('olympic',[
                                                        'id'=>$item->id
                                                    ])}}">
                                    <div class="items-image">
                                        <img src="/storage/uploads/img/{{$item->subject->image_src}}" width="372px"
                                             height="200px" alt="{{$item->subject->name}}">
                                    </div>
                                    <div class="items-cont">
                                        <h5>{{$item->subject->name}}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>
