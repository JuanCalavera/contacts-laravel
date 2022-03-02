<template>
  <div class="container my-3">
    <div class="card bg-secondary my-2">
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
          {{ name }} {{ last_name }}
        </h2>
        <div class="d-flex justify-content-between">
          <ul>
            <li>Telefone: {{ phone }}</li>
            <li>Email: {{ email }}</li>
            <li>Descrição: {{ description }}</li>
          </ul>
          <div>
            <router-link :to="{name: 'single', params: {slug: slug }}" tag="button" class="btn btn-primary">Editar</router-link>
            <button class="btn btn-danger">Deletar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["name", "last_name", "phone", "email", "description", "slug"],
  data() {
  },
};
</script>
