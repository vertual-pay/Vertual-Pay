<template>
    <transition name="modal">
        <div class="overlay" @click="$emit('close')">
            <div class="panel" @click.stop>
                <h3>Modal</h3>
                <button @click="$emit('close')">閉じる</button>
            </div>
        </div>
    </transition>
</template>
