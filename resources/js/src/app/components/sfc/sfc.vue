<template>
  <div class="example">{{msg}}</div>
</template>

<script>
export default {
  props: {
    tpl: String
  },
  data () {
    return {
      msg: 'Hello world!'
    }
  },

  templateOverride: "#vue-sfc-test",

  computed: {
      compMsg()
      {
          return this.msg + "comp";
      }
  },

  methods: {
    getMsg()
    {
        return this.msg
    }
  },
}
</script>
