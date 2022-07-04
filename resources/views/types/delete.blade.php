@extends('base')

@section('title')

Удалить тип "{{$type->name}}"

@endsection


@section('content')

<h1 class="my-md-5 my-4">Удалить тип - "{{$type->name}}"</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form action="{{route('type.delete_store', $type->id)}}" method='POST'>
                        @csrf




                        <a href="{{route('type.index')}}"><button class="btn btn-danger" type="button">Нет</button></a>
                        <button class="btn btn-primary" type="submit">Удалить</button>
                    </form>
                </div>
            </div>


@endsection
