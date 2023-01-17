@extends('layouts.app')
@section('content')
    <h1 class="display-5 fw-bold text-center pt-5 pb-3">
        Pagina iniziale Portfolio Riccardo Pellegrino
    </h1>

    <div class="jumbotron  bg-light rounded-3 ">
        <img src="https://picsum.photos/1200/300" width="100%" alt="">
        {{-- <div class="container py-5">
        <div class="logo_laravel">
           ciao
        </div> --}}
        <div class="d-flex justify-content-center pt-3">
            <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in
                previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your
                liking.</p>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-lg mb-3" type="button">Example button</button>
        </div>

    </div>

    {{-- <div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div> --}}
@endsection
