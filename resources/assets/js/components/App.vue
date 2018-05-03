<template>
    <div id="app">
        <button @click="showModal = true">モーダル表示</button>
        <modal v-if="showModal" @close="showModal = false"></modal>
    </div>
</template>
