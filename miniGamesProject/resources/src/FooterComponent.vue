<template>
  <div id="container-footer">
    <p id="copyFooter">@copyright ietiminigames</p>
  </div>
</template>
  

<script setup>
</script>
<style>
*{
  margin: 0;
  padding: 0;
}
#container-footer{
  display: grid;
  max-height: 150px;
  height: 15vh;
  width: 100%;
  grid-template-columns: 1fr;
  grid-template-rows: auto;
  background-color: #398290;
  text-align: center;
  position: fixed;
  bottom: 0;
}
#copyFooter{
  grid-row: 1/2;
  grid-column: 1/2;
  justify-self: center;
  align-self: center;
}
</style>