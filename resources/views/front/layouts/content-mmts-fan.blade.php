<div>
    @if(!$data||(sizeof($data->mmts)<=0))
        <x-danger-text text="Дар зергурӯҳи зерин мавод вуҷуд надорад..."></x-danger-text>
    @else
        <div class="category-2-items mt-4 mb-4">
            <div class="row">
                @foreach($data->mmts as $item)

                    @if($item->component == "A")
                        @if($first == false)
                            <div class="col-md-12"><h3 style="color: #234565"> Компоненти "А" </h3></div>
                            @php
                                $first = true
                            @endphp
                        @endif
                        <div class="col-md-6">
                            <div class="single-items text-center mt-20 ">
                                <a href="{{route('mmt-info',[
                                                    'id'=>$item->mmt_fan_id
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
                @php
                    $first = false
                @endphp
            </div>

            <div class="row">
                @foreach($data->mmts as $item)
                    @if($item->component == "B")
                        @if($first == false)
                            <div class="col-md-12 mt-40"><h3 style="color: #234565"> Компоненти "B" </h3></div>
                            @php
                                $first = true
                            @endphp
                        @endif
                        <div class="col-md-6">
                            <div class="single-items text-center mt-20 ">
                                <a href="{{route('mmt-info',[
                                                    'id'=>$item->mmt_fan_id
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
