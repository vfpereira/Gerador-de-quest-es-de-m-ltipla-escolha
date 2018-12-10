<template>

<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Gerar</th>
		</tr>
	</thead>
	<tbody>

		<tr v-for="item in lists">
			<th class="align-middle" scope="row">{{item.title}}</th>
			<td class="align-middle"><a  v-bind:href="'/admin/question-final/'+item.id"><span class="glyphicon glyphicon-file"></span></a></td>
		</tr>
	</tbody>
</table>        

</template>

<script>
  export default {
    props: ['lists'],
    
  }
</script>