@extends('base')

@section('title')

Обновление материала

@endsection


@section('content')

<h1 class="my-md-5 my-4">Обновить материал</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form action="" method='POST'>
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelectType" name='type_id'>
                                @foreach ($types as $type)
                                    @if ($material->type_id == $type->id)
                                        <option selected value="{{$type->id}}">{{$type->name}}</option>
                                    @else
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endif
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
                                @foreach ($categories as $category)
                                    @if ($material->category_id == $category->id)
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
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
                            <input type="text" class="form-control" placeholder="Напишите название" id="floatingName" value='{{$material->name}}' name='name'>
                            <label for="floatingName">Название</label>

                            <div class="invalid-feedback" style='display:block'>
                            @error('name')
                                {{$message}}
                            @enderror

                            </div>

                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите авторов" value='{{$material->author}}' id="floatingAuthor" name='author'>
                            <label for="floatingAuthor">Авторы</label>


                            <div class="invalid-feedback" style='display:block'>
                            @error('author')
                                    {{$message}}
                            @enderror
                            </div>

                        </div>
                        <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Напишите краткое описание" id="floatingDescription"
                              style="height: 100px" name='description'>{{$material->description}}</textarea>
                            <label for="floatingDescription">Описание</label>
                                <div class="invalid-feedback" style='display:block'>

                            @error('description')
                                    {{$message}}

                            @enderror
                                </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </form>
                </div>
            </div>

@endsection
