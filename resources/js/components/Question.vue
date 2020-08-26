d<template>
    <div class="question">
        <h1>Question {{question.id}}/20</h1>
        <h2>{{question.statement}}</h2>

        <div class="question__answer">

            <div v-if="question.type === 'text'">
                <textarea placeholder="Veuillez saisir votre réponse" v-model="fields[question.id]" maxlength="255"></textarea>
                <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
            </div>

            <div v-else-if="question.type === 'select'">
                <select name="selection" id="selection" v-model="fields[question.id]">
                    <option value=""> Veuillez choisir une réponse </option>
                    <option v-for="item in question.options" :key="item" :value="item" >{{item}}</option>
                </select>
            </div>

            <div v-else>
                <input type="number" min="1" max="5" v-model="fields[question.id]">
            </div>
            
        </div>
    </div>
</template>

<script>

export default {
    name: 'Question',
    components:{},
    props: ['question'],
	data() {
		return {
            fields: {},
			errors: {},
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
</style>
