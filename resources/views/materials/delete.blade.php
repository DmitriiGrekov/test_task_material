@extends('base')

@section('title')

Удалить материал "{{$material->name}}"

@endsection


@section('content')

<h1 class="my-md-5 my-4">Удалить материал - "{{$material->name}}"</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form action="{{route('material.delete_store', $material->id)}}" method='POST'>
                        @csrf




                        <a href="{{route('main.index')}}"><button class="btn btn-danger" type="button">Нет</button></a>
                        <button class="btn btn-primary" type="submit">Удалить</button>
                    </form>
                </div>
            </div>


@endsection
