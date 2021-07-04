<template>
  <div class="card">
    <img :src="this.data.thumbnail.path + '.' + this.data.thumbnail.extension" class="card-img-top" :alt="this.data.name">
    <div class="card-body">
      <h5 class="card-title">{{ this.data.name }}<router-link class="nav-link p-1 d-inline-block text-dark" :title="this.data.name | title" v-bind:to="`character/${this.data.name}`"><List></List></router-link></h5>
      <p class="card-text">{{ this.data.description }}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated {{ new Date(this.data.modified).toLocaleDateString() }}</small>
    </div>
  </div>
</template>

<script>
import List from "../icons/List.vue";

export default {
  name: "Card",
  components: { List },
  filters: {
    title(text) {
      return `${text}'s Stories`;
    },
  },
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
};
</script>