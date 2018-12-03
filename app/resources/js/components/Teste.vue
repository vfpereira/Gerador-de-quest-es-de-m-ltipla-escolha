<template>
	<div>
		<h2>Teste1</h2>
		<div class="card card-body mb-2" v-for="data in datas" v-bind:key="data.id"> 
			<h3>{{ data.title }}</h3>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		datas : []
	},

}
</script>