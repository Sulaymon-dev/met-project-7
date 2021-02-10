<div class="courses-single-left " style="padding: 30px 50px;">
    @if(sizeof($olympics)<=0)
        <div class="reviews-cont">
            <div class="instructor-description pt-25">
                <p>
                <h4 class="pt-10 pb-10 " style="color:darkred; text-align: center">Дар зергурӯҳи зерин мавод вуҷуд
                    надорад...</h4>
                </p>
            </div>
        </div>
    @else


        <div class="category-2-items">
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
                                             height="145px" alt="{{$item->subject->name}}">
                                    </div>
                                    <div class="items-cont">
                                        <h5>{{$item->subject->name}}</h5>
                                    </div>
                                </a>
                            </div>
                            <!-- single items -->
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- row -->
        </div>

    @endif
</div>
<!-- courses single left -->
