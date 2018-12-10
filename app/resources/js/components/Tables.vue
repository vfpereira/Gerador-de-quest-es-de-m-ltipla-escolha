<template>

<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Ativo</th>
			<th scope="col">Editar</th>
			<th scope="col">Excluir</th>
		</tr>
	</thead>
	<tbody>

		<tr v-for="item in lists">
			<th class="align-middle" scope="row">{{item.name}}</th>
			<td class="align-middle" v-if="item.active"><span class="glyphicon glyphicon-ok"></span></td>
			<td class="align-middle" v-else="item.active"><span class="glyphicon glyphicon-remove"></span></td>
			<td class="align-middle"><a v-bind:href="'/admin/create-category/'+item.id"><span class="glyphicon glyphicon-edit"></span></a></td>
			<td class="align-middle" ><a v-bind:href="'/admin/delete-category/'+item.id"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
	</tbody>
</table>        

</template>

<script>
  export default {
    props: ['lists'],
    
  }
</script>