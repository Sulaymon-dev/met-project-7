<div class="courses-single-left " style="padding: 30px 50px;">
    @if(sizeof($theme)<=0)
        <div class="reviews-cont">
            <div class="instructor-description pt-25">
                <p>
                <h4 class="pt-10 pb-10 " style="color:darkred; text-align: center">Дар зергурӯҳи зерин мавод вуҷуд надорад...</h4>
                </p>
            </div>
        </div>
    @else
        <div class="category-2-items">
            <div class="row">
                @foreach($theme as $item)
                    <div class="col-md-6">
                        <div class="single-items text-center mt-30 ">
                            <a href="{{route('subject',[
                                                    'slug'=>$item->subject->slug,
                                                    'sinf'=>$sinf
                                                ])}}">
                                <div class="items-image">
                                    <img src="{{asset('/storage/uploads/img/'.$item->book->img_src)}}"
                                         width="372px"
                                         height="145px"
                                         alt="Category">
                                </div>
                                <div class="items-cont">
                                    <h5>{{$item->book->name}}</h5>
                                    <span>{{$item->themes_count}} мавзӯъҳо</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
