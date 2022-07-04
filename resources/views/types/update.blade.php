@extends('base')

@section('title')

Обновление типа

@endsection


@section('content')

<h1 class="my-md-5 my-4">Обновить тип</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form method='POST' action="">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" id="floatingName" name='name' value="{{$type->name}}">
                            <label for="floatingName">Название</label>


                            <div class="invalid-feedback" style='display: block'>
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </form>
                </div>
            </div>
@endsection
