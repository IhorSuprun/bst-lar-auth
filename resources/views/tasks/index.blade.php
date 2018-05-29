@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All Tasks</div>

                <div class="panel-body">
                    <div><a href="{{url(route('tasks.create'))}}">
                            <i class="fa fa-plus"></i> Добавить задачу
                        </a>
                        <br></br>
                    </div>
                    <!-- Текущие задачи -->
                    @if (count($tasks) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Текущая задача
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Заголовок таблицы -->
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <!-- Тело таблицы -->
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <!-- Имя задачи -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <td>
                                            <form action="{{ url(route('tasks.destroy',['task'=>$task->id])) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit"  class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Удалить
                                                </button>
                                            </form>
                                            <form>
                                                {{ csrf_field() }}
                                                <a href="{{ url(route('tasks.edit',['task'=>$task->id])) }}" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-edit"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
