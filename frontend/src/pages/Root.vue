<template>
  <div>
    <div class="p-3">
      <div class="row d-flex justify-content-center">
        <div v-for="(character, key) in this.characters" :key="key" class="d-flex justify-content-center col-sm-6 col-md-4 col-lg-4 p-0">
          <Card :data="character" style="width: 18rem"></Card>
        </div>
      </div>
      <div class="row"></div>
    </div>
  </div>
</template>

<script>
import Card from "../components/Card.vue";
import Menu from "../components/Menu.vue";
import Footer from "../components/Footer.vue";

import characters from "../services/characters.js";

export default {
  name: "Welcome",
  components: { Card, Menu, Footer },
  data() {
    return {
      characters: []
    };
  },
  mounted() {
    const heroes = [
      "Hulk",
      "Iron Man",
      "Captain America"
    ];

    characters.index(heroes).then((data) => {
      if (data.status === 200) {
        this.characters = data.data;
      }
    });
  },
};
</script>