<template>
    <div class="survey">
		<div class="survey__presentation" v-if="!isSubmit">
			<h1>BigScreen</h1>
			<p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>
		</div>
		
		<form @submit.prevent="submit" v-if="!isSubmit">

			<div v-for="(question, index) in questions" class="question" :key="index">
				<h1>Question {{question.id}}/20</h1>
				<h2>{{question.statement}}</h2>

				<div class="question__answer">

					<div v-if="question.type === 'B'">
						<textarea placeholder="Veuillez saisir votre réponse" v-model="userAnswer[index]" maxlength="255"></textarea>
						<small class="errors" v-if="errors.answers">{{ errors.answers[0] }}</small>
					</div>

					<div v-else-if="question.type === 'A'">
						<select name="selection" id="selection" v-model="userAnswer[index]">
							<option value=""> Veuillez choisir une réponse </option>
							<option v-for="item in question.options" :key="item" :value="item" >{{item}}</option>
						</select>
					</div>

					<div v-else>
						<input type="number" min="1" max="5" v-model="userAnswer[index]">
					</div>
					
				</div>
			</div>

			<button type="submit" class="btn btn-primary">Finaliser</button>

		</form>
		<div class="survey__confirmation" v-if="isSubmit">
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
			this.errors = {};
			this.userAnswer.forEach((element, index) => 
				this.answers.push({'question_id': index+1, 'response': element})
			);

			axios.post('/submit', {'answers' : this.answers}).then( res => {
				this.isSubmit = true;
				console.log(this.answers);
			}).catch( error => {
				if (error.response.status === 422) {
					this.errors = error.response.data.errors || {};
				}
			});
		},
    }
}
</script>
<style lang="scss" scoped>

	.survey{
		width: 100%;
		margin: 0 auto;
		
		&__presentation, form {
			margin: 0 auto;
			width: 90%;
			max-width: 800px;
		}
		
		button {
			width: 300px;
			margin: 0 auto;
			display: block;
		}
		.question {
			box-sizing: border-box;
			padding: 15px;
			width: 90%;
			margin: 0 auto;
			max-width: 800px;
			background-color: lightgrey;
			margin: 10px auto;

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
			font-size: 26px;
		}

		.errors {
			display: block;
			color: red;
			margin: 5px 0;
		}
	}
</style>
