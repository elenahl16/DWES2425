@extends('plantilla');

@if(session('mensaje'))
    @section('info')
        <h3 class="text-sucess">{{sucess('mensaje')}}</h3>
    @endsection
@endif

@if(session('error'))
    @section('error')
        <h3 class="text-sucess">{{sucess('error')}}</h3>
    @endsection
@endif

@section('main')
    <table class="table">
        <thead>
            <tr></tr>
        </thead>
        <tbody>
            @foreach ($productos as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->nombre}}</td>
                <td>{{$p->precio}}</td>
                <td>{{$p->stock}}</td>
                <td><img src="{{asset('img/productos/'.$p->imagen)}}"
                    alt="{{$p->id}}" width="30px"></td>
                    <td>
                        <form action="{{route('addCarrito',$p->id)}}" method="post">
                            @csrf
                            <button type="submit" name="btnAdd" value="{{$p->id}}">
                                <img src="{{asset('img/cesta.png')}}"
                                alt="cesta" width="30px">
                            </button>
                        </form>
                    </td>
            </tr>
        @endforeach

@endsection