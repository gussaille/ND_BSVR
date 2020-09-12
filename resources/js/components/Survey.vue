<template>
    <div class="survey">
		<div class="survey__presentation" v-if="!isSubmit">
			<img src="/img/bigscreen_logo.png" alt="Logo BigScreen" class="survey__presentation__logo">
			<p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>
		</div>
		
		<form @submit.prevent="submit" v-if="!isSubmit">

			<div v-for="(question, index) in questions" class="question" :key="index">
				<h1>Question {{question.id}}/20</h1>
				<h2>{{question.label}}</h2>

				<div class="question__answer">

					<div v-if="question.type === 'B'">
						<textarea :name="'answer'+index" placeholder="Veuillez saisir votre réponse" v-model="userAnswer[index]" maxlength="255"></textarea>
						<small class="errors" v-if="errors.answers">{{ errors.answers }}</small>
					</div>

					<div v-else-if="question.type === 'A'">
						<select :name="'answer'+index" id="selection" v-model="userAnswer[index]">
							<option value="" disabled> Veuillez choisir une réponse </option>
							<option v-for="(item, num) in question.options" :key="num" :value="item" >{{item}}</option>
						</select>

						<small class="errors" v-if="errors.answers">{{errors.answers }}</small>

					</div>

					<div v-else>
						<input :name="'answer'+index" type="number" min="1" max="5" v-model="userAnswer[index]">
						<small class="errors" v-if="errors.answers">{{ errors.answers }}</small>

					</div>
					
				</div>
			</div>

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
			
			questions: questions,
			answers: [],
			errors: {},
			userAnswer: [],
			isSubmit: false,
		}
	},
	mounted() {
		
	},
	methods: {
    	submit() {
			this.userAnswer.forEach((element, index) => 
				this.answers.push({'question_id': index+1, 'response': element})
			);

			axios.post('/submit', {'answers' : this.answers})
			.then( res => {
				this.isSubmit = true;
			})
			.catch( err => {
				let status = err.response.status;
				let messages = err.response.data.errors;
				this.errors = {};

				if (typeof (messages) === 'object') {
					Object.keys(messages).forEach((index) => this.errors[index] = messages[index][0]);
				} else {
					alert('Une erreur est survenue (' + status + ')');
				}
			});
		},
    }
}
</script>
<style lang="scss" scoped>

	.survey{
		width: 100%;
		background-color: lightgrey;
		margin: 0 auto;
		
		&__presentation, form {
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
			color: white;
			box-sizing: border-box;
			padding: 15px;
			width: 100%;
			margin: 0 auto;
			max-width: 800px;
			background-color: #343a40;
			margin: 15px auto 30px;

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
			}
		}
		&__confirmation {
			-webkit-animation: scale-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.6s both;
	        animation: scale-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.6s both;	
			font-size: 26px;
			width: 90%;
			max-width: 680px;
			box-shadow: 1px 2px 10px lightgrey;
			position: absolute;
			top: 20%;
			left: 50%;
			transform: translateX(-50%);
			background-color: #343a40;
			color: white;
			box-sizing: border-box;
			padding: 20px;

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
