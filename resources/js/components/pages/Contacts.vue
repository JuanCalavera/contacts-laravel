<template>
  <section>
    <h1 class="text-center my-3">Contatos</h1>
    <card-contact v-for="contact in contacts" :key="contact.slug" :name="contact.name" :last_name="contact.lastname" :phone="contact.phone" :email="contact.email" :description="contact.description" :slug="contact.slug"></card-contact>
  </section>
</template>

<script>
import Contacts from "../../contacts";
import CardContact from "../CardContact.vue"

export default {

  components:{
    CardContact
  },

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
