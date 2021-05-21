<div class="accordion" id="accordionExample">
    @if($theme==null)
        <x-danger-text text="Дар синфи зерин маводи чунин фан вуҷуд надорад..."></x-danger-text>
    @else
        @foreach($theme->themes as $key=>$item)
            <div class="card">
                <div class="card-header" id="heading{{$key}}">
                    <a data-toggle="collapse"
                       class=" {{($key==0) ? 'collapse' : 'collapsed'}} "
                       data-target="#collapse{{$key}}"
                       aria-expanded="true"
                       aria-controls="collapse{{$key}}">
                        <ul>
                            <li><i class="fa fa-file-o"></i></li>
                            <li><span class="lecture">МАВЗӮИ {{$item->theme_num}}</span></li>
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
                        <a href="{{route('theme',['id'=> $item->id,'content'=>'dars'])}}"
                           class="btn btn-met stretched-link">Дидан</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
