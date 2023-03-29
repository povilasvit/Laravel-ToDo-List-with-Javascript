const dateStart = document.querySelectorAll('.dateStart');
const dateEnd = document.querySelectorAll('.dateEnd');
const timeLeftPercentages = document.querySelectorAll('.timeLeftPercentages');
const timeRemaining = document.querySelectorAll('.timeRemaining');
const timeLeft = document.querySelectorAll('.timeLeft');
// Time variables
let timeNow = () => Math.floor(new Date().getTime() / 1000);
let date1 = (index) => new Date(dateStart[index].textContent).getTime() / 1000;
let date2 = (index) => new Date(dateEnd[index].textContent).getTime() / 1000;
let dateDiff;

let dateNow;


//To Calculate Percentages of Remaining Time for Each Todo and Add Color
function eachTimePercentages(){
	timeLeftPercentages.forEach(time)
};

function time(element, index){
	dateDiff = date2(index) - date1(index);
	let remainingTime = date2(index) - timeNow();
	let remainingPercentages = Math.floor(remainingTime / dateDiff * 100);

	if(remainingPercentages >= 70){
		timeLeft[index].style.backgroundColor = '#dafaca';
		timeLeft[index].style.color = '#6da870';
	} else if(remainingPercentages < 70 && remainingPercentages >30){
		timeLeft[index].style.backgroundColor = '#ffe7a3';
		timeLeft[index].style.color = '#baa979';
	} else{
		timeLeft[index].style.backgroundColor = '#fad4d4';
		timeLeft[index].style.color = '#c48487';
	}


	if(date2(index) > timeNow()){
		element.textContent = remainingPercentages + '%';
	} else {
		element.textContent = 'Time is Expired!!!';
	}

}
setInterval(eachTimePercentages, 1000);

//To Show Remaining Time for Each Todo
function eachTimeRemaining(){
	timeRemaining.forEach(remaining)
}

function remaining(element, index){
	dateDiff = date2(index) - timeNow();

	let days = Math.floor(dateDiff / 86400);
	let daysRemaining = days > 0 ? days + ' days ' : '';
	let hours = Math.floor(dateDiff / 3600) % 24;
	let hoursRemaining = hours > 0 ? hours + ' hours ' : '';
	let minutes = Math.floor(dateDiff / 60) % 60;
	let minutesRemaining = minutes > 0 ? minutes + ' minutes ' : '';
	let seconds = Math.floor(dateDiff % 60);
	let secondsRemaining = seconds > 0 ? seconds + ' seconds' : '';

	if(days > 0){
		element.textContent = daysRemaining + hoursRemaining;
	}
	if(days < 1 && hours > 0){
		element.textContent = hoursRemaining + minutesRemaining;
	}
	if(days < 1 && hours < 1 && minutes > 0){
		element.textContent = minutesRemaining + secondsRemaining;
	}	
}



setInterval(eachTimeRemaining, 1000);



// Add ToDo Validation Rules
const form = document.querySelector('.form');
const addTaskInputName = document.querySelector('.addTaskInputName');
const addTaskInputDate = document.querySelector('.addTaskInputDate');
const errorList = document.querySelector('.errorList');
const errors = document.getElementById('errors');
const timeInput = document.getElementById('date');

form.addEventListener('submit', function(e){
	errors.innerHTML = '';
	let newDate = new Date(timeInput.value).getTime() / 1000;

	if(newDate - timeNow() < 3540){
		errorsMsg();
		msg("ToDo Must Be At Least 1 Hour");
		e.preventDefault();
		console.log(newDate - timeNow());
	}	
	if(addTaskInputName.value === '' || addTaskInputName.value == null){
		errorsMsg();
		msg("Name is Required!");
		e.preventDefault();
	}
	if(addTaskInputDate.value === '' || addTaskInputDate.value == null){
		errorList.innerHTML = '';
		errorsMsg();
		msg('Date Field Is Required');
		e.preventDefault();
	}
});

function errorsMsg(){
	errors.classList.add('addTaskMsg');
}
function msg(name){
	let li = document.createElement('li');
	textNode = document.createTextNode(name);
	li.appendChild(textNode);
	return errors.appendChild(li);
} 


//Switch between percentages and remaining time
const timePercentages = document.querySelectorAll('.timeLeftPercentages');
const timeRmnng = document.querySelectorAll('.timeRemaining');


	timeLeft.forEach(function(element, index){
		if(date2(index) > timeNow()){
			element.addEventListener('mouseenter', function(){
					timeLeftPercentages[index].classList.remove('displayBlock');
					timeLeftPercentages[index].classList.add('displayNone');
					timeRmnng[index].classList.add('displayBlock');
			});
		}
	});


	timeLeft.forEach(function(element, index){
		if(date2(index) > timeNow()){
			element.addEventListener('mouseleave', function(){
				timeLeftPercentages[index].classList.add('displayBlock');
				timeLeftPercentages[index].classList.remove('displayNone');
				timeRmnng[index].classList.remove('displayBlock');
			});
		}
	});



