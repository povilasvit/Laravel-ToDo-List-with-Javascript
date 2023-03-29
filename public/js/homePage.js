const coll = Array.from(document.querySelectorAll('.coll'));

coll.forEach(function(element, index){
	element.addEventListener('click', function(){
		const content = element.children[1];
		if(content.classList.contains('cont')){
			content.classList.remove('cont');
		} else {
			content.classList.add('cont');
		}
		element.classList.toggle('activeColl');

	})
})