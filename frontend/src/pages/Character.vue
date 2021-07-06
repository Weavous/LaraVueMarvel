<template>
  <div>
    <form>
      <div>
        <label for="search" class="form-label">Character</label>
        <input type="text" class="form-control" v-model="search" aria-describedby="search">
        <div class="form-text">Enter the Marvel's character name. We will search for you.</div>
      </div>

      <button type="submit" v-on:click="find" class="btn btn-primary">
        Search for {{ search }}
      </button>
    </form>

    <Hr></Hr>

    <div class="row">
      <FormInput for="Identifier" :vModel="this.id"></FormInput>
      <FormInput for="Name" :vModel="this.name"></FormInput>
      <FormInput for="Last Modified" :vModel="this.modified"></FormInput>
      <FormInput for="Resource" :vModel="this.resourceURI"></FormInput>
    </div>

    <Hr></Hr>

    <div class="row">
      <div class="form-floating">
        <textarea class="form-control" readonly v-model="this.description"></textarea>
      </div>
    </div>

    <Hr></Hr>

    <div class="overflow">
      <Story :stories="this.stories"></Story>
    </div>
  </div>
</template>

<script>
import Story from "../components/Story.vue";
import FormInput from "../components/FormInput.vue";
import Hr from "../components/Hr.vue";

import characters from "../services/characters.js";

export default {
  name: "Character",
  components: { Story, FormInput, Hr },
  data() {
    return {
      search: "Thanos",
      id: 0,
      name: "Thanos",
      description: "Any",
      modified: "9999-999-99T99:99:99-9999",
      thumbnail: {
        path: "www.any.com",
        extension: "jpg"
      },
      resourceURI: "www.any.com",
      stories: []
    };
  },
  props: {
    slug: {
      type: String,
      required: false,
    },
  },
  mounted() {
    if (typeof undefined !== typeof this.slug) {
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

      characters.search(character).then(response => {
        if (response.data.status === true) {
          this.character = response.data.character;

          this.stories = this.character.stories.items;

          this.id = this.character.id;
          this.name = this.character.name;
          this.modified = this.character.modified;
          this.resourceURI = this.character.resourceURI;
          this.description = this.character.description;

          this.thumbnail = this.character.thumbnail;
        }
      });
    },
  },
};
</script>

<style>
.overflow {
  height: 200px;
  overflow-y: scroll;
}
</style>