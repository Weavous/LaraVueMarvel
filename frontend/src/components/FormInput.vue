<template>
  <div class="form-group col">
    <label :for="this.for">{{ this.for }}</label>
    <input type="text" class="form-control" :placeholder="this.for" v-model="this.vModel" readonly>
  </div>
</template>

<script>
export default {
  name: "FormInput",
  props: {
    vModel: {
      required: true,
    },
    for: {
      type: String,
      requird: true,
    },
  },
};
</script>