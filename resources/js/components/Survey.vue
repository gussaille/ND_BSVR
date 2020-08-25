<template>
    <div class="survey">
		<div class="survey__presentation">
			<h1>BigScreen</h1>
			<p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>
		</div>
		
		<form>
			<Question v-for="(question, index) in questions" :key="index" :question="question"/>
		</form>
    </div>
</template>

<script>

import Question from './Question';

export default {
	name: 'Survey',
	components:{Question},
	data() {
		return {
			questions: questions
		}
	},
	mounted() {
		
	},
	methods: {
    
    }
}
</script>
<style lang="scss" scoped>

	.survey{
		width: 100%;
		margin: 0 auto;
		
		&__presentation {
			margin: 0 auto;
			width: 90%;
			max-width: 800px;
		}
	}
</style>
