<?php
/*$routes = array(

        'tickets.latest' => 'Recientes',
        'tickets.popular' => 'Popular',
        'tickets.open' => 'Abiertas',
        'tickets.closed' => 'Finalizadas'

);


*/ ?>

<ul class="nav navbar-nav">

    @foreach($items as $route => $text)
        <li role="presentation" {!! Html::classes(['active'=> Route::is($route)])  !!}>
            <a href="{{ route($route) }}">{{$text}}</a>
        </li>
    @endforeach


</ul>