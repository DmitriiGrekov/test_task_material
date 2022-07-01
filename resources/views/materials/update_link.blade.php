@extends('base')

@section('title')

Добавление ссылки

@endsection


@section('content')

<h1 class="my-md-5 my-4">Добавить ссылку</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form action="{{route('material.update_link_store', $link->id)}}" method='POST'>
                        @csrf

                        <input type="hidden" name="material_id" value="{{$id}}">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" id="floatingName" value='{{$link->name}}' name='name'>
                            <label for="floatingName">Название ссылки</label>

                            <div class="invalid-feedback" style='display:block'>
                            @error('name')
                                {{$message}}
                            @enderror

                            </div>

                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите авторов" value='{{$link->link}}' id="floatingAuthor" name='link'>
                            <label for="floatingAuthor">Ссылка</label>


                            <div class="invalid-feedback" style='display:block'>
                            @error('link')
                                    {{$message}}
                            @enderror
                            </div>

                        </div>

                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </form>
                </div>
            </div>

@endsection
