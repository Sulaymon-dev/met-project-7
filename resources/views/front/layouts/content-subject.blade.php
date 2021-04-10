<div class="accordion" id="accordionExample">
    @if($theme==null)
        <div class="reviews-cont">
            <div class="instructor-description pt-25">
                <p>
                <h4 class="pt-10 pb-10 " style="color:darkred; text-align: center">Дар синфи зерин маводи чунин фан вуҷуд надорад...</h4>
                </p>
            </div>
        </div>
    @else
        @foreach($theme->themes as $key=>$item)
            <div class="card">
                <div class="card-header" id="heading{{$key}}">
                    <a
                        data-toggle="collapse"
                        class=" {{($key==0) ? 'collapse' : 'collapsed'}} "
                        data-target="#collapse{{$key}}"
                        aria-expanded="true"
                        aria-controls="collapse{{$key}}">
                        <ul>
                            <li><i class="fa fa-file-o"></i></li>
                            <li><span class="lecture">МАВЗӮИ 1</span></li>
                            <li><span class="head">{{$item->name}}</span></li>
                            <li><span class="time d-none d-md-block"></span></li>
                        </ul>
                    </a>
                </div>
                <div id="collapse{{$key}}"
                     class="{{($key==0) ? 'collapse show' : 'collapse'}} "
                     aria-labelledby="heading{{$key}}"
                     data-parent="#accordionExample">
                    <div class="card-body">
                        <p>{{Illuminate\Support\Str::limit($item->introduction , 65, ' ...')}}
                            <a href="{{route('theme',['id'=> $item->id,'content'=>'dars'])}}"
                               class="btn btn-met stretched-link"
                               style="float: right;">Дидан</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
