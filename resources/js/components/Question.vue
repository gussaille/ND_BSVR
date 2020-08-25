<template>
    <div class="question">
        <h1>Question {{question.id}}/20</h1>
        <h2>{{question.statement}}</h2>
    </div>
</template>

<script>

export default {
    name: 'Question',
    components:{},
    props: ['question'],
	data() {
		return {
        }
	},
	mounted() {
	 
	},
	methods: {
    
    }
}
</script>
<style lang="scss" scoped>

.question {
    background-color: lightgrey;
    margin: 10px auto;
}
</style>
