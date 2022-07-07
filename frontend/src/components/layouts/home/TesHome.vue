<template>
  <div class="selector">
    <select :id="id" @change="$emit('selected', $event.target.value)">
      <option
        v-for="(item, index) in items"
        :key="index"
        :value="item.value"
        :selected="item.value === initialStatus"
      >
        {{ item.label }}
      </option>
    </select>
  </div>
</template>

<script>
// import { defineComponent, PropType } from '@vue/runtime-core'

// interface Items {
//   label: string
//   value: string
// }

export default {
  props: {
    items: {
      type: Array,
      required: true,
    },
    initialStatus: {
      type: String,
    },
    id: {
      type: String,
    },
  },
  emits: ["selected"],
  mounted() {
    if (!this.initialStatus) {
      this.$emit("selected", this.items[0]?.value);
    }
  },
};
</script>
