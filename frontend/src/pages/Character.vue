<template>
  <div>
    <form>
      <div>
        <label for="search" class="form-label">Character</label>
        <input type="text" class="form-control" v-model="search" aria-describedby="search">
        <div class="form-text">Enter the beginning of the character's name. We will search for you.</div>
      </div>

      <button type="submit" v-on:click="find" class="btn btn-primary">Search for {{ search }}</button>
    </form>

    <hr>

    <div class="row">
      <div class="form-group col">
        <label for="inputEmail4">Identifier</label>
        <input type="email" class="form-control" placeholder="Identifier" readonly v-model="this.character.id">
      </div>
      <div class="form-group col">
        <label for="inputEmail4">Name</label>
        <input type="email" class="form-control" placeholder="Name" readonly v-model="this.character.name">
      </div>
      <div class="form-group col">
        <label for="inputEmail4">Last Modified</label>
        <input type="email" class="form-control" placeholder="Last Modified" readonly v-model="this.character.modified">
      </div>
      <div class="form-group col">
        <label for="inputEmail4">Resource</label>
        <input type="email" class="form-control" placeholder="Resource" readonly v-model="this.character.resourceURI">
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="form-floating">
        <textarea class="form-control" readonly v-model="this.character.description"></textarea>
      </div>
    </div>

    <hr>

    <div class="overflow">
      <Story :stories="this.character.stories.items"></Story>
    </div>
  </div>
</template>

<script>
import Story from "../components/Story.vue";

import characters from '../services/characters.js';

export default {
  name: "Character",
  components: {Story},
  data() {
    return {
      search: "",
      character: {
        id: 0,
        name: "",
        description: "",
        modified: "",
        thumbnail: "",
        resourceURI: "",
        stories: {
          available: 0,
          collectionURI: "",
          items: [],
          returned: 0
        }
      },
      stories: []
    };
  },
  props: {
    slug: {
      type: String,
      required: false
    }
  },
  mounted() {
    if(typeof undefined !== typeof this.slug) {
      this.search = this.slug;
      this.findCharacter(this.slug);
    }
  },
  methods: {
    find(e) {
      e.preventDefault();

      this.findCharacter(this.search);
    },
    findCharacter(character) {
      if (character.length === 0) {
        return false;
      }

      characters.search(character).then(data => {
        if (data.data.status === true) {
          this.character = data.data.character;
        }
      });
    }
  }
};
</script>

<style>
.overflow {
  height: 200px;
  overflow-y: scroll;
}
</style>