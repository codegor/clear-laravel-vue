<script>
  export default {
    data() {
      return {
        voices: [],
        create: this.form(),
      };
    },
    mounted() {
      this.load();
    },
    methods: {
      async load() {
        const res = await fetch('https://dev.server/api/voices', {method: 'GET', headers: {'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization' : 'Bearer 2|urOnzB9Hc5YKs8R5QJs8fecN6iJZWaLJ4e5nA7BC'}})
        const d = await res.json();
        this.voices = d.data;
      },
      form() {
        return {
          name: '',
          model_url: ''
        };
      },
      async save() {
        const { create } = this;
        const res = await fetch('https://dev.server/api/voices', {method: 'POST', headers: {'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization' : 'Bearer 2|urOnzB9Hc5YKs8R5QJs8fecN6iJZWaLJ4e5nA7BC'},
          body: JSON.stringify(create)})
        if(201 === res.status) {
          this.create = this.form();
          this.load();
        }
      }
    }
  };
</script>

<template>
  <div>
    <ul>
      <li v-for="voice in voices" :key="voice.id"><a :href="voice.model_url">{{ voice.name }}</a></li>
    </ul>

    <div>
      Name: <input v-model="create.name"/><br/>
      Url: <input v-model="create.model_url"/><br/>
      <button @click="save">Create</button>
    </div>
  </div>
</template>

<style scoped>
a {
  color: #42b983;
}
</style>
