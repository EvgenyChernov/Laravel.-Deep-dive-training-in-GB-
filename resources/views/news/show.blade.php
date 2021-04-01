@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <h2>Отобразить запись с id= {{$news}}</h2>
            <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere,
                a globe, having the qualities of a globe, a round earth in which all the directions eventually meet,
                in which there is no center because every point, or none, is center — an equal earth which all men
                occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice,
                not in theory.</p>

            <blockquote class="blockquote">The dreams of yesterday are the hopes of today and the reality of
                tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far
                too little for the next ten.
            </blockquote>

            <a href="#">
                <img class="img-fluid" src="{{asset('assets/img/post-sample-image.jpg')}}" alt="">
            </a>
            <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>

            <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission:
                to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man
                has gone before.</p>

            <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental
                truth to our nature, Man must explore, and this is exploration at its greatest.</p>

            <p>Placeholder text by
                <a href="">Space Ipsum</a>. Photographs by
                <a href="">NASA on The Commons</a>.</p>
        </div>
    </div>
@endsection
