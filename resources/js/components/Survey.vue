<template>
    <div class="survey">
		<div class="survey__presentation" v-if="!isSubmit">
			<img src="/img/bigscreen_logo.png" alt="Logo BigScreen" class="survey__presentation__logo">
			<p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>
		</div>
		
		<form @submit.prevent="submit" v-if="!isSubmit">

			<div v-for="(question, index) in questions" class="question" :key="index">
				<p class="question__number">Question {{question.id}}/20</p>
				<p class="question__label">{{question.label}}</p>

				<div class="question__answer">

					<div v-if="question.type === 'B'">
						<input v-if="question.id === 1" type='email' placeholder="Veuillez saisir votre adresse email" @change="checkEmail" v-model.lazy="answers[index].response" maxlength="255">
						
						<div v-if="question.id === 1" :class="emailChecked !== true ? 'invalid' : 'valid'" class="email-message">
							<span v-if="emailChecked.length !== 0 && emailChecked === true">Email valide</span>
							<span v-else-if="emailChecked.length !== 0 && emailChecked !== true">Email inconnu</span>
						</div>

						<textarea v-else :disabled="emailChecked !== true" placeholder="Veuillez saisir votre réponse" v-model="answers[index].response" maxlength="255"></textarea>

						<small class="errors">{{ errors[`answers.${index}.response`] }}</small>
					</div> 

					<div v-else-if="question.type === 'A'">
						<select :disabled="emailChecked !== true" id="selection" v-model="answers[index].response">
							<option value="" disabled> Veuillez choisir une réponse </option>
							<option v-for="(item, num) in question.options" :key="num" :value="item" >{{item}}</option>
						</select>

						<small class="errors">{{ errors[`answers.${index}.response`] }}</small>
					</div>

					<div v-else>
						<input :disabled="emailChecked !== true" type="number" min="1" max="5" v-model="answers[index].response">
						<small class="errors">{{ errors[`answers.${index}.response`] }}</small>
					</div>
				</div>
			</div>

			<small class="errors" v-if="errors.answers">{{ errors.answers }}</small>

			<button type="submit" class="btn btn-primary">Finaliser</button>

		</form>
		<div class="survey__confirmation" v-if="isSubmit">

			<img src="/img/bigscreen_logo.png" alt="Logo BigScreen" class="survey__confirmation__logo">

			<p>Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
				votre investissement, nous vous préparons une application toujours plus
				facile à utiliser, seul ou en famille.
				Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
				cette adresse: http://xxxxxxxx

				<!-- url dynamique selon l'user --> 
			</p>
		</div>
    </div>
</template>

<script>

export default {
	name: 'Survey',
	data() {
		return {
			emailChecked: [],
			questions: [],
			answers: [
				{
					response : '',
					question_id : 1
				},
				{
					response : '',
					question_id : 2
				},
				{
					response : '',
					question_id : 3
				},
				{
					response : '',
					question_id : 4
				},
				{
					response : '',
					question_id : 5
				},
				{
					response : '',
					question_id : 6
				},
				{
					response : '',
					question_id : 7
				},
				{
					response : '',
					question_id : 8
				},
				{
					response : '',
					question_id : 9
				},
				{
					response : '',
					question_id : 10
				},
				{
					response : '',
					question_id : 11
				},
				{
					response : '',
					question_id : 12
				},
				{
					response : '',
					question_id : 13
				},
				{
					response : '',
					question_id : 14
				},
					{
					response : '',
					question_id : 15
				},
				{
					response : '',
					question_id : 16
				},
				{
					response : '',
					question_id : 17
				},
				{
					response : '',
					question_id : 18
				},
				{
					response : '',
					question_id : 19
				},
				{
					response : '',
					question_id : 20
				},

			],
			errors: {},
			isSubmit: false,
		}
	},
	mounted() {
		this.getQuestions();
	},
	methods: {
		checkEmail(){
			axios.post('/user/email', {'email': this.answers[0].response})
			.then(response =>{
				this.emailChecked = response.data.check;
			})
			.catch(err =>{
				alert('Une erreur est survenue (' + error.response.status + ')');
			})
		},
		getQuestions(){
			let _this = this;
			axios.get('/questions').then(response => {
				_this.questions = response.data;	
			}).catch(error => {
				alert('Une erreur est survenue (' + error.response.status + ')');
			})
		},
    	submit() {
			let _this = this;
			if(this.emailChecked === true && this.answers[0].response.length >= 1){
				axios.post('/answers', {answers: this.answers})
				.then( res => {
					_this.isSubmit = true;
				})
				.catch( err => {
					let status = err.response.status;
					let messages = err.response.data.errors;
					_this.errors = {};

					if (typeof (messages) === 'object') {
						Object.keys(messages).forEach((index) => _this.errors[index] = messages[index][0]);
					} else {
						alert('Une erreur est survenue (' + status + ')');
					}
				});
			}
		},
    }
}
</script>
<style lang="scss" scoped>

	.survey{
		width: 100%;
		background-color: #0B132B;
		margin: 0 auto;
		
		&__presentation, 
		form {
			margin: 0 auto;
			width: 90%;
			max-width: 800px;
			
			&__logo {
				margin: 0 auto;
				width: 300px;
				display: block;

				@media screen and (min-width: 800px){
					margin: 0;
				}
			}
		}

		&__presentation {
			p{
				margin-bottom: 5px;
				font-size: 14px;
				color: white;

				@media screen and(min-width: 800px){
					font-size: 18px;
				}
			}
		}
		
		form {
			padding: 5px 0 20px;
			box-sizing: border-box;
		}
		
		button {
			width: 300px;
			margin: 0 auto;;
			display: block;
			text-transform: uppercase;
			font-size: 24px;
		}

		
		.question {
			color:  #1C2541;
			box-sizing: border-box;
			padding: 15px;
			border-radius: 2px;
			width: 100%;
			margin: 0 auto;
			max-width: 800px;
			background-color:  white;
			margin: 15px auto 30px;

			@media screen and (min-width: 800px){
				padding: 15px 30px;
			}

			&__answer {
				
				border: dotted black;
				box-sizing: border-box;
				padding: 10px;

				textarea {
					box-sizing: border-box;
					padding: 5px;
					max-height: 100px;
					width:80%;
					max-width: 500px; 
				}

				input[type="email"]{
					width: 80%;
					max-width: 300px;
				}

				.email-message{
					@media screen and (max-width: 800px){
						display: block;
					}
					&.invalid{
						color: red;
					}
					&.valid {
						color: rgb(22, 145, 22);
					}
				}

				.disabled {
					pointer-events: none;
					background-color: lightgrey;
				}
			}
			&__number{
				margin-bottom: 0;
				font-size: 40px;
			}
			&__label {
				margin-bottom: 16px;;
				font-size: 26px;
				line-height: 1.2;
			}
		}
		&__confirmation {
			-webkit-animation: scale-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.6s both;
	        animation: scale-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.6s both;	
			font-size: 18px;
			width: 90%;
			max-width: 680px;
			box-shadow: 1px 2px 10px lightgrey;
			position: absolute;
			top: 20%;
			left: 50%;
			transform: translateX(-50%);
			background-color: #0B132B;
			color: white;
			box-sizing: border-box;
			padding: 20px;

			@media screen and (min-width: 800px){
				font-size: 26px;
			}

			&__logo {
				width: 300px;
				margin: 10px auto;
				display: block;
			}
		}

		.errors {
			display: block;
			color: red;
			margin: 5px 0;
		}
	}
</style>
