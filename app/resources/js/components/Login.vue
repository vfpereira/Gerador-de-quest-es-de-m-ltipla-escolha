<template>
	
  	<div class="card">
		
		<h3 class="card-header">Login</h3>
		
		<div class="card-body">
			<!--mudar cor quando login com sucesso-->
			<div  class="alert alert-danger" v-show="validationErrors">
                <ul>
                    <li>{{ message }}</li>
                </ul>
            </div>
			
			<form>
				<input type="hidden" name="_token" :value="csrf">

				<div class="form-group" >
					<input type="email" name="email" v-model="email"  ref="refEmail" placeholder="email@exemplo.com" class="form-control" v-bind:class="[emailSuccessClass]" v-on:keyup="checkEmailValidation" id="email"  autofocus required>
					
				</div>

				<div class="form-group">
					<input type="password" ref="refPassword" name="password" v-model="password" required placeholder="Senha" class="form-control" v-bind:class="[passwordlSuccessClass]" v-on:keyup="checkPasswordValidation" required>
					
				</div>

				<div class="form-group">
					<center>
					 	<button class="btn-success btn"  type="button" :disabled="submitBtnDisabled" @click="submitForm">Login</button>
					 	<button class="btn-success btn"  type="button" :disabled="submitBtnRegisterDisabled" @click="submitFormRegister">Cadastro</button> 
					</center>
				</div>
			</form>     
		</div>

    </div>


	  
</template>

<script>

export default {
	name: 'Login',
	data() {
		return {
			password: '',
		    email: '',
		    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
		    errors : [],
		    validationErrors : false,
        	emailSuccessClass : "",
        	passwordlSuccessClass: "",
        	submitBtnDisabled: true,
        	submitBtnRegisterDisabled: true,
        	message: ""
		}
	},
	methods: {


		checkEmailValidation: function () {
			if (this.$refs.refEmail.checkValidity()) {
		  		this.emailSuccessClass = 'is-valid'
		  		if(this.$refs.refPassword.checkValidity()){
		  			this.submitBtnDisabled = false
		  			this.submitBtnRegisterDisabled = false
		  		} 
			} else {
			  this.emailSuccessClass = 'is-invalid'
			  this.submitBtnDisabled = true,
			  this.submitBtnRegisterDisabled = true
			}
		},
	    checkPasswordValidation: function () {
	        if (this.$refs.refPassword.checkValidity()) {
		  		this.passwordlSuccessClass = 'is-valid'
		  		if(this.$refs.refEmail.checkValidity()){
		  			this.submitBtnDisabled = false
		  			this.submitBtnRegisterDisabled = false
		  		} 
			} else {
			  this.passwordlSuccessClass = 'is-invalid'
			  this.submitBtnDisabled = true
			  this.submitBtnRegisterDisabled = true
			}
	      },

		submitForm(){

			this.errors = [];
			this.validationErrors = false;
			this.message = "";

			axios.post('/formSubmit', {
				csrf: this.csrf,
				password: this.password,
				email: this.email,
			}).then(response => {
				if (response.data.login === false) {
					this.validationErrors = true;
					this.message = "Usuário ou senha inválidos."
				} else {
					window.location.replace(response.data.url); 
				}
			}).catch(error => {
				if (error.response.status == 422){
					this.validationErrors = error.response.data.errors;
				}
			})
		},
		submitFormRegister(){

			this.errors = [];
			this.validationErrors = false;

			axios.post('/formSubmitRegister', {
				csrf: this.csrf,
				password: this.password,
				email: this.email,
			}).then(response => {
				if (response.data.register === true){
					this.validationErrors = true;
					this.message = "Usuário criado com sucesso. Efetue o login.";

				} else {
					this.validationErrors = true;
					this.message = "Usuário já existe.";
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


