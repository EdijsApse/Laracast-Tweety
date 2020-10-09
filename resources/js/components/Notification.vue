<template>
    <transition name="fade">
        <div v-if="message" :class="['alert', containerclass]">
            <div class="relative w-full">
                <h3>{{ heading }}</h3>
                <p>{{ message }}</p>
                <i class="fas fa-times" @click="message = ''"></i>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: ['message', 'heading', 'containerclass']
}
</script>

<style scoped>
    .alert {
        position: fixed;
        display: flex;
        bottom: 20px;
        right: 20px;
        width: 250px;
        padding: 0px;
        border-radius: 10px;
        background-color:#FFF;
    }

    .alert h3:after {
        display: block;
        width: 70px;
        height: 3px;
        content: "";
        opacity: 0.3;
        margin-top:5px;
    }

    .alert p {
        flex-grow: 1;
        margin: 20px;
        margin-top: 5px;
        margin-left: 10px;
    }

    .alert h3 {
        font-size: 18px;
        color: #2e2e2e;
        padding: 10px;
        padding-bottom: 5px;
    }

    .alert i {
        cursor: pointer;
        color: red;
        font-size: 16px;
        font-weight: bold;
        position: absolute;
        top: 5px;
        right: 12px;
        z-index:1000;
    }

    .alert.warning {
        box-shadow: 0px 0px 3px 0px #ffa538;
    }
    .alert.error {
        box-shadow: 0px 0px 3px 0px #bf0b0b;
    }
    .alert.success {
        box-shadow: 0px 0px 3px 0px #1c9900;
    }

    .alert.warning h3:after {
        background-color: #ffa538;
    }

    .alert.error h3:after {
        background-color: #bf0b0b;
    }

    .alert.success h3:after {
        background-color: #1c9900;
    }

    .fade-enter-active {
    animation: fade-in 0.3s ease-out forwards;
    }

    .fade-leave-active {
        animation: fade-out 0.3s ease-out forwards;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes fade-out {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
</style>