<template>
    <div class="container">
       <h2>Notes</h2>
	   <p v-show="message" class="message">{{message}}</p>
	   <form @submit.prevent>
			<input v-model="note.title" name="title" type="text" placeholder="Title" />
			<textarea v-model="note.note" name="body" placeholder="Note body"></textarea>
			<button v-on:click="addNote()" class="btn">Save</button>
	   </form>
	   <div class="notes">
	   	<div class="card" v-for="note in notes" v-bind:key=note.id>
			<div class="card-title">
				<h2>{{note.title}}</h2>
			</div>
			<p>{{note.note}}</p>
			<footer>
				<button class="primary"><i class="far fa-edit"></i>Edit</button>
				<button v-on:click="deleteNote(note.id)" class="danger"><i class="far fa-trash-alt"></i>Delete</button>	
			</footer>
	   	</div>
	</div>

    </div>
</template>

<script>
    export default {
		data(){
			return {
				message:'',
				notes: [],
				note: {
					id: 0,
					title: '',
					note: '',
				},
			}
		},
        mounted() {

        },
		created() {
			this.fetchNotes();
		},
		methods: {
			async fetchNotes() {
				let res = await fetch('api/notes');
				this.notes = await res.json();
			},
			async deleteNote(id) {
				if (confirm('Are you sure?')) {
					let res = await fetch(`api/notes/${id}`, { method: 'delete'});
					this.message = "Item Deleted";
					this.fetchNotes();
				}
			},
			async addNote() {
				let res = await fetch('api/notes', { 
					method: 'post',
					body: JSON.stringify(this.note),
					headers: {
						'content-type': 'application/json'
					}
				});
				this.note = [];
				this.message = "Note added";
				this.fetchNotes();
			}
		},
    }
</script>

<style lang="scss" scoped>
    .container{
        color:#63b;
    }
	form {
		border:1px solid #ccc;
		border-radius:5px;
		margin:5px 25px;
		padding:10px;
		width:95%;
		text-align:center;
		
		input, textarea {
			width:75%;
			margin:2px;
			font-size:1.25em;	
			padding:4px;
		}
		textarea {
			font-family: Nunito;
		}
	}
	.notes {
		display:flex;
		justify-content:space-around;
		flex-wrap:wrap;
		margin-top:25px;
	}
	.card {
		flex-basis:75%;
		padding:5px;
		border:1px solid #333;
		margin:3px;
		
		footer {
			display:flex;
			justify-content:flex-end;
			
			button {
				width:75px;
				padding:3px;
				margin:1px;
				
			}
		}
	}
	.card-title {
		border-bottom:1px solid #333;
		background-color:#fefef9;
		padding:3px;
		margin-bottom:5px;		
		h2 {
			font-size:1.25em;
			font-weight: normal;
		}
	}
	.primary {
		color: #00f;
	}
	.danger {
		color:#f00;
	}
	.message {
		background-color:#006600;
		color:#fff;
		padding:15px;
		margin-bottom:5px;
	}
</style>
