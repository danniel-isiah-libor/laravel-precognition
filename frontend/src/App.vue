<template>
  <form @submit.prevent="submit">
    <label for="name">Name</label>
    <input id="name" v-model="form.name" @change="form.validate('name')" />
    <div v-if="form.invalid('name')">
      {{ form.errors.name }}
    </div>

    <label for="email">Email</label>
    <input
      id="email"
      type="email"
      v-model="form.email"
      @change="form.validate('email')"
    />
    <div v-if="form.invalid('email')">
      {{ form.errors.email }}
    </div>

    <button :disabled="form.processing">Create User</button>
  </form>
</template>

<script>
import { useForm } from "laravel-precognition-vue";

export default {
  name: "App",
  data() {
    return {
      form: useForm("post", "http://localhost:8000/api/test", {
        name: "",
        email: "",
      }),
    };
  },
  methods: {
    async submit() {
      await this.form
        .submit()
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
