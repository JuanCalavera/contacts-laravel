<template>
  <section>
    <h1>{{ this.userSlug }}</h1>
    <button @click="$router.go(-1)" >Return</button>
  </section>
</template>

<script>
export default {
  data() {
    return { userSlug: this.$route.params.slug };
  },

  mounted() {},
};
</script>

<style scoped>
section {
  animation-name: example;
  animation-duration: 2s;
}

@keyframes example{
    0% {
        left: 200px;
    }
    100%{
        left: 0px;
    }
}
</style>
