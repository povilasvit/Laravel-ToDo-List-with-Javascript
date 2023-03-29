@extends('layouts.app')

@section('main')

	@include('includes/flash-message')

	<div class="formContainer">
		<form action="{{route('todo.store')}}" method="POST" class="form">
			@csrf
			<input type="text" name="name" id="name" class=" addTaskInput addTaskInputName" placeholder="Enter a Task">
			<input type="datetime-local" name="date" id="date" class="addTaskInput addTaskInputDate" placeholder="Enter a Date">
			<input type="submit" id="addTaskBtn" class="btnAdd hvr-wobble-horizontal" value="Add">
		</form>
		@include('includes.errors')
		<div class="" id="errors">
		    <ul class="errorList">		        
		    </ul>
		</div>
	</div>
	<div class="taskContainer">
		<div class="taskList">
			<h3 class="taskListH">Task List</h3>
			<ul class="taskListUl">
				@if($todos->where('status', 0)->count() > 0)
				@foreach($todos as $todo)
					@if($todo->status == 0)
						<li class="listItem">
							<div class="taskText">{{$todo->name}}</div>
							<div class="timeLeft @if($todo->persentage < 30 || $todo->persentage === 'Time is Expired!!!') bgColorDanger 
								 	@elseif($todo->persentage <70 && $todo->persentage >= 30) bgColorWarning 
								 	@elseif($todo->persentage >= 70) bgColorSuccess
								 @endif">
								<div class="timeLeftPercentages displayBlock">
									{{$todo->persentage}}
								</div>

								<div class="timeRemaining"></div>
							</div>					
							<div class="taskText dates">
								<span class="dateStart">
										 {{$todo->created_at}}
								</span>
								<span class="dateEnd">{{$todo->date}}</span>
							</div>
							<div class="listItemBtns">								
								<a href="{{route('editTask', $todo->id)}}"><span class="editBtn material-symbols-outlined hvr-buzz-out">edit</span></a>
								<form action="{{route('todo.destroy', $todo->id)}}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button class="formBtn"><span class="deleteBtn material-symbols-outlined hvr-buzz-out">delete</span></button>
								</form>
								<form action="{{route('todo_done', $todo->id)}}" method="POST">
								@csrf
								<button class="formBtn"><span class="doneBtn material-symbols-outlined hvr-buzz-out">done</span></button>
								</form>
							</div>						
						</li>
					@endif
				@endforeach
				@else
					<h4 class="noActiveTodoH4">No Active ToDo At This Moment</h4>
				@endif
			</ul>
		</div>
		<div class="completedTaskList">
			<h3 class="finishedTaskListH">Completed Tasks</h3>
			@if($todos->where('status', 1)->count() > 0)
			<form action="{{route('clearTaskList')}}" method="POST" class="clearForm">
				@csrf
				<button class="clearListBtn hvr-wobble-horizontal">Clear the List</button>
			</form>
				@foreach($todos->sortByDesc('updated_at') as $todo)
			<ul class="taskItemFin">
					@if($todo->status == 1)
						<li class="listItemF">{{$todo->name}}</li>
					@endif
				@endforeach	
			</ul>
			@else
				<h4>No Todo Completed At This Moment</h4>
			@endif
		</div>
	</div>


@endsection