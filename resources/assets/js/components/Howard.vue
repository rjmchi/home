<template>
    <div class="container">
       <h2>Howard's Photos</h2>
	   <p v-show="message" class="message">{{message}}</p>
	   
	   <ul>
	   	<li v-for="photo in photos" v-bind:key=photo.id>
			<a v-bind:href="photo.url">{{photo.title}}</a>
			<span class="actions">
				<button v-on:click="deletePhoto(photo.id)" class="danger"><i class="far fa-trash-alt"></i> Delete</button>	
			</span>
		</li>
	   </ul>
	
	<form @submit.prevent>
		<h4>New Link</h4>
	
		<div class="input-group">
			<label for = "title">Title:</label>
			<input v-model="photo.title" name="title" type="text" placeholder="Title" />
		</div>
		<div class="input-group">
			<label for="url">URL:</label>
			<input v-model="photo.url" name="url" type="text" placeholder="URL" />
		</div>
		<div class="input-group">
			<button class="primary" v-on:click="addPhoto()" ><i class="far fa-save"></i> Save</button>
		</div>
	</form>	

    </div>
</template>

<script>
    export default {
		data(){
			return {
				message:'',
				photos: [],
				photo: {
					id: 0,
					title: '',
					url: '',
				},
			}
		},
        mounted() {

        },
		created() {
			this.fetchPhotos();
		},
		methods: {
			async fetchPhotos() {
				let res = await fetch('api/howard');
				this.photos = await res.json();
			},
			async deletePhoto(id) {
			console.log(id);
				if (confirm(`Are you sure you want to delete id:${id}?`)) {
					let res = await fetch(`api/howard/${id}`, { method: 'delete'});
					this.message = "Item Deleted";
					this.fetchPhotos();
				}
			},
			async addPhoto() {
				let res = await fetch('api/howard', { 
					method: 'post',
					body: JSON.stringify(this.photo),
					headers: {
						'content-type': 'application/json'
					}
				});
				this.photo = [];
				this.message = "Link added";
				this.fetchPhotos();
			}
		},
    }
</script>

<style lang="scss" scoped>
    .container{
        color:#074872;
		margin:0 25px;
		padding:25px;
		h2 {
			text-align:center;
			padding:25px;
		}
    }
	form {
		border:1px solid #ccc;
		border-radius:5px;
		margin:15px auto;
		padding:10px;
		width:75%;
		
		h4 {
			margin-bottom:10px;
		}
		
		.input-group {
			font-size:1.25em;
			width:95%;
		}

		input {
			width:95%;
			margin:2px;
			padding:6px;
		}
	}
	button {
		width:75px;
		padding:3px;
		margin:1px;
	}	
	ul {
		border:1px solid #ccc;
		border-radius:5px;
		width:75%;
		padding:15px;
		margin:0 auto;
	}
	li {
		border-bottom:1px solid #ccc;
		padding-top:5px;
		margin-bottom:5px;
		display:flex;
		justify-content:space-between;
		
		a {
			color:#074872;
			display:block;
			width:99%;
			padding:2px;
		}
		a:visited {
			color:#074872		
		}
		a:hover {
			background-color:#ccc;
		}
	}
	
	
	.primary {
		color: #074872;
	}
	.danger {
		color: rgb(193,42,42);
	}
	.message {
		background-color:#006600;
		color:#fff;
		padding:15px;
		margin-bottom:5px;
	}
</style>