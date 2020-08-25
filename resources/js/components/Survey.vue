<template>
    <div class="survey">
        <h1>BigScreen</h1>
		<p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>

		<Question v-for="(question, index) in questions" :key="index" :question="question"/>

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

</style>
