<template>
  <div class="card">
    <img :src="this.data.thumbnail.path + '.' + this.data.thumbnail.extension" class="card-img-top" :alt="this.data.name">
    <div class="card-body">
      <h5 class="card-title">{{ this.data.name }} <router-link class="nav-link d-inline-block p-0 text-dark" to="/"><i class="bi bi-card-list" :title="this.data.name + '\'s Stories'"></i></router-link></h5>
      <p class="card-text">{{ this.data.description }}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated {{ new Date(this.data.modified).toLocaleDateString() }}</small>
    </div>
  </div>
</template>

<script>
export default {
  name: "Card",
  props: {
    data: {
      type: Object,
      required: true,
    },
  }
};
</script>