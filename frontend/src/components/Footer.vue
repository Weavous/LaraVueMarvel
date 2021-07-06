<template>
  <footer class="footer mt-auto py-3 bg-light fixed-bottom">
    <div class="container d-flex justify-content-center">
      <span class="text-muted">
        {{ copymsg }}
      </span>
    </div>
  </footer>
</template>

<script>
import texts from "../documents/texts.js";

export default {
  name: "Footer",
  data() {
    return {
      copymsg: texts.copyright,
    };
  },
};
</script>