<template>
  <div class="col-md-2 mb-3">
     <base-submit
      v-bind:text=text
      v-bind:classes=classes
     ></base-submit>
  </div>
</template>

<script>
import BaseSubmit from "../../../BaseButtonSubmit";
export default {
  components: {BaseSubmit},
  data:function () {
    return {
      classes:[
        'btn',
        'btn-lg',
        'btn-primary',
        'btn-block',
      ],
      text:'検索'
    }
  }
}
</script>

<style scoped>

</style>
