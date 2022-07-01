@extends('base')

@section('title')

Создание материала

@endsection


@section('content')

<h1 class="my-md-5 my-4">Добавить материал</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form action="{{route('material.store')}}" method='POST'>
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelectType" name='type_id'>
                                <option selected>Выберите тип</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectType">Тип</label>

                            <div class="invalid-feedback" style='display:block'>
                            @error('msg')
                                Пожалуйста, выберите значение
                            @enderror
                            </div>

                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelectCategory" name='category_id'>
                                <option selected>Выберите категорию</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectCategory">Категория</label>

                            <div class="invalid-feedback" style='display:block'>
                            @error('msg')
                                Пожалуйста, выберите значение
                            @enderror
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" id="floatingName" value='{{old('name')}}' name='name'>
                            <label for="floatingName">Название</label>

                            <div class="invalid-feedback" style='display:block'>
                            @error('name')
                                {{$message}}
                            @enderror

                            </div>

                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите авторов" value='{{old('author')}}' id="floatingAuthor" name='author'>
                            <label for="floatingAuthor">Авторы</label>


                            <div class="invalid-feedback" style='display:block'>
                            @error('author')
                                    {{$message}}
                            @enderror
                            </div>

                        </div>
                        <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Напишите краткое описание" id="floatingDescription"
                              style="height: 100px" name='description'>{{old('description')}}</textarea>
                            <label for="floatingDescription">Описание</label>
                                <div class="invalid-feedback" style='display:block'>

                            @error('description')
                                    {{$message}}

                            @enderror
                                </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </form>
                </div>
            </div>

@endsection
