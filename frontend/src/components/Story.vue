<template>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Story</th>
            <th scope="col">Resource</th>
            <th scope="col">Type</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(story, key) in this.stories" :key="key">
            <th scope="row">{{story.name}}</th>
            <td>{{ story.resourceURI }}</td>
            <td>{{ story.type }}</td>
          </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "Story",
    props: {
      stories: {
        type: Array,
        required: true
      }
    }
}
</script>