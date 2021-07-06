<template>
  <hr :title="copymsg">
</template>

<script>
import texts from "../documents/texts.js";

export default {
  name: "Hr",
  data() {
    return {
      copymsg: texts.copyright,
    };
  },
};
</script>