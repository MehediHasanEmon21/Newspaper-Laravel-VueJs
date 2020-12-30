<template>
  <span id="public_master">
    <public-header></public-header>
    <router-view></router-view>
    <public-footer></public-footer>
  </span>
</template>

<script>
import PublicHeader from "./inc/PublicHeader";
import PublicFooter from "./inc/PublicFooter";
export default {
  name: "PublicMaster",
  components: {
    PublicHeader,
    PublicFooter,
  },
};
</script>

<style lang="scss" scoped>
</style>
