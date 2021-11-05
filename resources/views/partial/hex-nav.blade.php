<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{request()->is('hexagram/*/1')?'active':''}}" href="{{url('hexagram/'.$hex->id.'/'.'1')}}">Yao 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->is('hexagram/*/2')?'active':''}}" href="{{url('hexagram/'.$hex->id.'/'.'2')}}">Yao 2</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->is('hexagram/*/3')?'active':''}}" href="{{url('hexagram/'.$hex->id.'/'.'3')}}">Yao 3</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->is('hexagram/*/4')?'active':''}}" href="{{url('hexagram/'.$hex->id.'/'.'4')}}">Yao 4</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->is('hexagram/*/5')?'active':''}}" href="{{url('hexagram/'.$hex->id.'/'.'5')}}">Yao 5</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->is('hexagram/*/6')?'active':''}}" href="{{url('hexagram/'.$hex->id.'/'.'6')}}">Yao 6</a>
    </li>
</ul>