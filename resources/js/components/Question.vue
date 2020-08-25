d<template>
    <div class="question">
        <h1>Question {{question.id}}/20</h1>
        <h2>{{question.statement}}</h2>

        <div class="question__answer">

            <div v-if="question.type === 'text'">
                <textarea placeholder="Veuillez saisir votre réponse" maxlength="255"></textarea>
            </div>

            <div v-else-if="question.type === 'select'">

                <select name="selection" id="selection">
                    <option value=""> Veuillez choisir une réponse </option>
                    <option value="">Dog</option>
                    <option value="">Cat</option>
                    <option value="">Hamster</option>
                </select>
            </div>
            <div v-else>
                <input type="number" min="1" max="5">
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
            max-height: 100px;
            width:80%;
            max-width: 500px; 
        }
    }
}
</style>
