<template>
    <div class="container my-5">
      <div v-if="action === 'list'">
        <div class="mb-4">
          <button @click="action = 'create'" class="btn btn-success">Crear Nota</button>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Titulo</th>
              <th>Contenido</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="note in notes" :key="note.id">
              <td>{{ note.id }}</td>
              <td>{{ note.title }}</td>
              <td>{{ note.content }}</td>
              <td class="d-flex gap-2">
                <button @click="editNote(note)" class="btn btn-primary">Editar</button>
                <button @click="deleteNote(note.id)" class="btn btn-danger">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>


      <div v-if="action  ==='create' || action === 'edit'">
        <h1 class="mb-4">
          <span v-if="action === 'create'">Crear Nota</span>
          <span v-else>Editar Nota</span>
        </h1>
        <form @submit.prevent="submitForm">
          <div class="form-group">
            <label for="title">Título</label>
            <input type="text" v-model="note.title" class="form-control">
          </div>
          <div class="form-group">
            <label for="content">Contenido</label>
            <textarea v-model="note.content" class="form-control" rows="5"></textarea>
          </div>
          <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">
            <span v-if="action === 'create'">Guardar Nota</span>
            <span v-else>Actualizar Nota</span>
          </button>
          <button @click="cancelAction" class="btn btn-secondary">Cancelar</button>
           </div>
        </form>
      </div>
    </div>
  </template>

<script>
  import axios from 'axios';
  import Swal from 'sweetalert2';
  import 'sweetalert2/dist/sweetalert2.min.css';

  export default {
    name: 'Notes',
    data() {
      return {
        action: 'list',
        notes: [],
        note: {
          id: null,
          title: '',
          content: ''
        }
      };
    },

    mounted() {
      this.getNotes();
    },

    methods: {
      getNotes() {
        axios.post('/getnotes')
        .then(response => {
            this.notes = response.data;
        });
      },

      createNote() {
        axios.post('/createnotes', {
          title: this.note.title,
          content: this.note.content
        })
        .then(response => {
            this.notes.push(response.data);
            this.action = 'list';
            this.resetForm();
            Swal.fire('¡Perfecto!', 'La nota ha sido agregada', 'success');
        });
      },

      deleteNote(id) {
        Swal.fire({
          title: '¿Quieres eliminar la nota?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.isConfirmed) {
            axios.post('/deletenotes', { id })
              .then(() => {
                this.notes = this.notes.filter(note => note.id !== id);
                Swal.fire('¡Perfecto!', 'La nota ha sido eliminada.', 'success');
              });
          }
        });
        },

      editNote(note) {
        this.note = { ...note };
        this.action = 'edit';
      },

      updateNote() {
        axios.post('/updatenotes', this.note)
        .then(response => {
            const index = this.notes.findIndex(n => n.id === this.note.id);
                this.notes[index] = response.data;
                this.action = 'list';
                this.resetForm();
        Swal.fire('¡Perfecto!', 'La nota ha sido editada', 'success');
        });
      },

      submitForm() {
        if (this.action === 'create') {
          this.createNote();
        } else if (this.action === 'edit') {
          this.updateNote();
        }
      },

      cancelAction() {
        this.action = 'list';
        this.resetForm();
      },

      resetForm() {
        this.note = {
          id: null,
          title: '',
          content: ''
        };
      }
    }
  };
</script>





