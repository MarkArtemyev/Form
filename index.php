<div class="form">
	<form class="appForm" method="post">
		Name:<br>
		<input type="text" name="name"><br>
		Phone:<br>
		<input type="text" name="phone"><br>
		Email:<br>
		<input type="text" name="email"><br>
		<button>Send</button>
		<p class="err"></p>
	</form>
</div>
<script>
	let form = document.querySelector('.appForm');
	let errorBox = document.querySelector('.err');

	form.addEventListener('submit', function(e){
		e.preventDefault();
		
		let formData = new FormData(form);
		
		fetch('send.php', {
			method: 'POST',
			body: formData
		})
		.then(response => response.json())
		.then(data => {
			if(data.res){
				form.innerHTML = 'Добро пожаловать!';
			}
			else{
				errorBox.innerHTML = data.error;
			}
		})
	});
</script>