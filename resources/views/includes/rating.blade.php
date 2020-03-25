@for($i = 0;$i<5;$i++)
    @if($i<$rating)
        <i class="fa fa-star active"></i>
    @else
        <i class="fa fa-star"></i>
    @endif
@endfor
