<template>

	<form method="post" action="/admin/question/post" v-if="categories">
		
		
		
		<input type="hidden" name="_token" :value="csrf">

		<div class="form-group">
			<label for="name">Título</label>
			<input type="text" required  name="titulo" class="form-control"  id="titulo"  placeholder="Pergunta da questão" />
		</div>

		<div class="form-group">
		    <label for="categorySelect">Categoria</label>
		    <select class="form-control" name="categorySelect" id="categorySelect">
				<option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
		    </select>
	  	</div>

	  	<div class="form-group">
		    <label for="respA">Resposta A</label>
		    <textarea class="form-control" name="respA" id="respA" rows="3"></textarea>
		</div>

		<div class="form-group">
		    <label for="respB">Resposta B</label>
		    <textarea class="form-control" name="respB" id="respB" rows="3"></textarea>
		</div>

		<div class="form-group">
		    <label for="respC">Resposta C</label>
		    <textarea class="form-control" name="respC" id="respC" rows="3"></textarea>
		</div>

		<div class="form-group">
		    <label for="respD">Resposta D</label>
		    <textarea class="form-control" name="respD" id="respD" rows="3"></textarea>
		</div>

		<div class="form-group">
		    <label for="respE">Resposta E</label>
		    <textarea class="form-control" name="respE" id="respE" rows="3"></textarea>
		</div>

		<div class="form-group">
		    <label for="correct">Resposta Correta</label>
		    <select class="form-control" id="correct" name="correct">
				<option selected value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				<option value="E">E</option>
		    </select>
	  	</div>
		
		<div class="pull-right">
			<button  class="btn btn-primary float-right">Criar</button>
		</div>
	</form>
	<div v-else>Necessário cadastrar antes uma categoria.</div>

</template>

<script>

export default {
	name: 'Post',
	props: ['categories'],
	data() {
		return {
			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
		}
	},	
}
</script>