<template>
  <div class="container my-3">
    <h1 class="text-center">Contatos</h1>
    <div
      class="card bg-secondary my-2"
      v-for="contact of contacts"
      :key="contact.slug"
    >
      <div class="card-body">
        <h2>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="3%"
            height="auto"
            fill="currentColor"
            class="bi bi-person-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
            />
          </svg>
          {{ contact.name }} {{ contact.last_name }}
        </h2>
        <div class="d-flex justify-content-between">
          <ul>
            <li>Telefone: {{ contact.phone }}</li>
            <li>Email: {{ contact.email }}</li>
            <li>Descrição: {{ contact.description }}</li>
          </ul>
          <div>
            <button class="btn btn-primary">Editar</button>
            <button class="btn btn-danger">Deletar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Contacts from "../../contacts";

export default {
  data() {
    return {
      contacts: [],
    };
  },

  mounted() {
    Contacts.listen().then((response) => {
      if (response.status === 200) {
        this.contacts = response.data;
        console.log(response.data);
      }
    });
  },
};
</script>
