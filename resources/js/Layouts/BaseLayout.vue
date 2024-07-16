<template>
  <div class="selection:bg-transparent" />
  <slot />
</template>

<style>
.over-x {
  overflow-x: scroll;
}
.over-y {
  overflow-y: scroll;
}

.over-x::-webkit-scrollbar{
  height: 2px;
}

.over-y::-webkit-scrollbar{
  width: 2px;
}

.over-x::-webkit-scrollbar-track,
.over-y::-webkit-scrollbar-track{
  box-shadow: inset 0 0 6px transparent;
}

.over-x::-webkit-scrollbar-thumb,
.over-y::-webkit-scrollbar-thumb{
  outline: 1px solid #C4C4C4;
  background: #C4C4C4;
  border-radius: 8px;
}

</style>