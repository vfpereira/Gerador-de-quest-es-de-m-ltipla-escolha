<template>

	<form v-on:submit.prevent="submitForm">
		<input type="hidden" name="_token" :value="csrf">
		<div  class="alert alert-danger" v-show="validationErrors">
		    <ul>
		        <li>{{ errorMessage }}</li>
		    </ul>
		</div>

		<input  ref="refId" type="hidden" name="id" v-bind:value="category.id" >
		

		<div class="form-group">
			<label for="name">Nome</label>
			<input type="text" ref="refCategory" required  name="category" class="form-control" v-bind:value="category.name" id="category" v-on:keyup="getCategory()" v:model="formData.category" placeholder="Categoria" />
		</div>
		<div class="form-check form-check-inline">
		  <input v-if="category.active" checked class="form-check-input" ref="refActive" name="active" type="checkbox" id="active" v-on:click="getActive()" />
		  <input v-else="category.active" class="form-check-input" ref="refActive" name="active" type="checkbox" id="active" v-on:click="getActive()" />
		  <label class="form-check-label"  for="active">Ativo</label>
		</div>
		<div class="pull-right">
			<button  class="btn btn-primary float-right">Criar</button>
		</div>
	</form>

</template>

<script>

export default {
	name: 'Post',
	props: ['category'],
	data() {
		return {
			formData: {
             category: '',
             active: false,
             id: 0
         	},
			validationErrors: false,
			errorMessage: "",
			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
		}
	},
	methods: {
		getCategory(){
			this.formData.category = this.$refs.refCategory.value;
		},
		getActive(){
			if (this.$refs.refActive.checked){
				this.formData.active = true;
			}else{
				this.formData.active = false;
			}
		},
		submitForm(){

			this.errorMessage ="";
			this.validationErrors=false;

			this.formData.category = this.$refs.refCategory.value;

			if (this.$refs.refActive.checked){
				this.formData.active = true;
			}else{
				this.formData.active = false;
			}

			this.formData.id = this.$refs.refId.value;

			axios.post('/admin/subject/post',this.formData).then(response => {
				if (response.data.success === false) {
					this.validationErrors = true;
					this.errorMessage = response.data.message;
				} else {
					window.location.replace(response.data.url); 
				}
			}).catch(error => {
				if (error.response.status == 422){
					this.validationErrors = error.response.data.errors;
				}
			})
		}
	}
}
</script>