<template>

	
	<div>
		<h3>{{question.title}}</h3>



		<div class="form-check">
			<input class="form-check-input"    type="radio" name="radio" id="radioa"  value="A" checked>
			<label class="form-check-label" for="radioa" >
				A : {{question.answera}}
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="radio" id="radiob" value="B">
			<label class="form-check-label" for="radiob">
				B : {{question.answerb}}
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="radio" id="radioc" value="C">
			<label class="form-check-label" for="radioc">
				C : {{question.answerc}}
			</label>
		</div>		
		<div class="form-check">
			<input class="form-check-input" type="radio" name="radio" id="radiod" value="D">
			<label class="form-check-label" for="radiod">
				D : {{question.answerd}}
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="radio" id="radioe" value="E">
			<label class="form-check-label" for="radioe">
				E : {{question.answere}}
			</label>
		</div>		
		<div class="pull-right">
			<button v-on:click="verify"  class="btn btn-primary float-right">Responder</button>
		</div>

		<div  v-bind:style="styleObject">A resposta certa é a alternativa {{question.correctanswer}} </div>
	</div>
</template>

<script>

export default {
	name: 'Post',
	props: ['question'],
	data() {
		return {
			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			styleObject: {
			    display: 'none',
			 }
		}
	},	
	methods: {
		verify: function () {
			console.log("success");
			this.styleObject.display = "block";
			//correctanswer
		}
	}
}
</script>