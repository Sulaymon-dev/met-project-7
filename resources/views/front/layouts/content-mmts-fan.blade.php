<div class="courses-single-left " style="padding: 30px 50px;">
    @if(!$data||(sizeof($data->mmts)<=0))
        <div class="reviews-cont">
            <div class="instructor-description">
                <p>
                <h4 class="pt-10 pb-10 " style="color:darkred; text-align: center">Дар зергурӯҳи зерин мавод вуҷуд
                    надорад...</h4>
                </p>
            </div>
        </div>
    @else


        <div class="category-2-items">
            <div class="row">
                @foreach($data->mmts as $item)

                    @if($item->component == "A")
                        @if($first == false)
                            <div class="col-md-12"><h3 style="color: #234565"> Компоненти "А" </h3></div>
                            @php
                                $first = true
                            @endphp
                        @endif
                        <div class="col-md-4">
                            <div class="single-items text-center mt-20 ">
                                <a href="{{route('mmt-info',[
                                                    'id'=>$item->mmt_fan_id
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
                @php
                    $first = false
                @endphp
            </div>
            <!-- row -->

            <div class="row">

                @foreach($data->mmts as $item)

                    @if($item->component == "B")
                        @if($first == false)
                            <div class="col-md-12 mt-40"><h3 style="color: #234565"> Компоненти "B" </h3></div>
                            @php
                                $first = true
                            @endphp
                        @endif
                        <div class="col-md-4">
                            <div class="single-items text-center mt-20 ">
                                <a href="{{route('mmt-info',[
                                                    'id'=>$item->mmt_fan_id
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
