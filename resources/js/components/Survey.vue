<template>
    <div class="survey">
		<div class="survey__presentation">
			<h1>BigScreen</h1>
			<p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>
		</div>
		
		<form @submit.prevent="submit">
			<!-- <Question v-for="(question, index) in questions" :key="index" :question="question"/> -->

			<div v-for="(question, index) in questions" class="question" :key="index">
				<h1>Question {{question.id}}/20</h1>
				<h2>{{question.statement}}</h2>

				<div class="question__answer">

					<div v-if="question.type === 'text'">
						<textarea placeholder="Veuillez saisir votre réponse" v-model="answers[index]" maxlength="255"></textarea>
					</div>

					<div v-else-if="question.type === 'select'">
						<select name="selection" id="selection" v-model="answers[index]">
							<option value=""> Veuillez choisir une réponse </option>
							<option v-for="item in question.options" :key="item" :value="item" >{{item}}</option>
						</select>
					</div>

					<div v-else>
						<input type="number" min="1" max="5" v-model="answers[index]">
					</div>
					
				</div>
			</div>

			<button type="submit" class="btn btn-primary">Finaliser</button>

		</form>
    </div>
</template>

<script>

// import Question from './Question';

export default {
	name: 'Survey',
	// components:{Question},
	data() {
		return {
			questions: questions,
			answers: [],
			errors: {},
		}
	},
	mounted() {
		
	},
	methods: {
    	submit() {
			this.errors = {};
			axios.post('/submit', this.answers).then( response => {
				console.log(response);
				
			}).catch(error => {
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
	}
</style>
