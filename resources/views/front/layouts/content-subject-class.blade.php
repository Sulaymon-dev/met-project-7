<div>
    @if(sizeof($theme)<=0)
        <x-danger-text text="Дар синфи зерин маводи чунин фан вуҷуд надорад..."></x-danger-text>
    @else
        <div class="category-2-items">
            <div class="row">
                @foreach($theme as $item)
                    <div class="col-md-6">
                        <div class="single-items text-center mt-30 ">
                            <a href="{{route('subject',[
                                                    'slug'=>$item->subject->slug,
                                                    'sinf'=>$item->sinf_id
                                                ])}}">
                                <div class="items-image">
                                    <img src="{{asset('/storage/uploads/img/'.$item->book->img_src)}}"
                                         width="372px"
                                         height="200px"
                                         alt="{{$item->book->name}}">
                                </div>
                                <div class="items-cont">
                                    <h5>{{$item->book->name}}</h5>
                                    <span>{{$item->themes_count}} мавзӯъ</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
