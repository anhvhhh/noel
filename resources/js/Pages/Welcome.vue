<template>
    <div v-if="show === false">
        <div class="container">
            <!-- Chữ Hoàng Anh Pro -->
            <div class="text-center">Hoàng Anh Pro</div>

            <!-- Các nút -->
            <div class="buttons-container">
                <!-- Nút Có -->
                <button v-if="!isDisabled" @click="handleYesClick" class="yes-button">
                    Có
                </button>

                <!-- Nút Không -->
                <button v-if="!isNoClicked && !isDisabled" @click="handleNoClick" class="no-button">
                    Không
                </button>

                <!-- Nút Không bị ẩn khi đã nhấn -->
                <button v-if="isNoClicked" class="no-button-moved" :style="noButtonPosition">
                    Không
                </button>
            </div>
        </div>
    </div>
    <div v-if="show === true" class="christmas-container">
        <!-- Background with snowflakes -->
        <div class="snowflake" v-for="flake in snowflakes" :key="flake.id" :style="flake.style"></div>

        <!-- Fireworks -->
        <div class="fireworks">
            <div v-for="firework in fireworks" :key="firework.id" class="firework" :style="firework.style"></div>
        </div>

        <!-- Santa Claus and Sleigh -->
        <div class="santa-sleigh">
            <img src="/noel.png" alt="Santa and Sleigh" />
        </div>

        <!-- Christmas tree with twinkling lights -->
        <div class="christmas-tree">
            <ul class="tree-lights">
                <li v-for="light in 50" :key="light" class="tree-light"></li>
            </ul>
        </div>

        <!-- Central message -->
        <div class="message">
            <h1>Merry Christmas!</h1>
            <p>May your holidays be filled with joy and love.</p>
        </div>

        <!-- Falling gifts -->
        <div class="falling-gifts">
            <div v-for="gift in gifts" :key="gift.id" class="gift" :style="gift.style"></div>
        </div>

        <!-- Decorative lights -->
        <ul class="string-lights">
            <li v-for="light in 20" :key="light" class="light"></li>
        </ul>

        <!-- Christmas music -->
        <div class="mt-3">
            <audio controls autoplay>
                <source src="/noel.mp3" type="audio/mp3" />
                Your browser does not support the audio tag.
            </audio>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            snowflakes: Array.from({ length: 50 }, (_, id) => ({
                id,
                style: {
                    left: `${Math.random() * 100}vw`,
                    animationDelay: `${Math.random() * 5}s`,
                    animationDuration: `${5 + Math.random() * 5}s`,
                },
            })),
            fireworks: Array.from({ length: 10 }, (_, id) => ({
                id,
                style: {
                    top: `${Math.random() * 100}vh`,
                    left: `${Math.random() * 100}vw`,
                    animationDelay: `${Math.random() * 2}s`,
                },
            })),
            gifts: Array.from({ length: 20 }, (_, id) => ({
                id,
                style: {
                    left: `${Math.random() * 100}vw`,
                    animationDelay: `${Math.random() * 3}s`,
                    animationDuration: `${4 + Math.random() * 5}s`,
                },
            })),
            show: false,
            isDisabled: false,  // Để kiểm soát việc nhấn nút
            isNoClicked: false,  // Để xác định khi nhấn nút Không
            noButtonPosition: {
                position: 'absolute',
                top: `${Math.random() * 80}vh`,  // Random vị trí Y
                left: `${Math.random() * 80}vw`, // Random vị trí X
            },
        };
    },
    mounted() {
        // Automatically play the audio when the component is loaded
        const audio = this.$refs.audio;
        if (audio) {
            audio.play().catch((e) => {
                console.warn('Autoplay failed. User interaction may be required.', e);
            });
        }
    },
    methods: {
        handleYesClick() {
            this.show = true  // Log 1 khi nhấn vào nút Có
            this.isDisabled = true;  // Vô hiệu hóa các nút sau khi nhấn
        },
        handleNoClick() {
            this.isNoClicked = true;  // Đánh dấu nút Không đã nhấn
            this.noButtonPosition = {
                position: 'absolute',
                top: `${Math.random() * 90}vh`,  // Cập nhật vị trí ngẫu nhiên mới
                left: `${Math.random() * 90}vw`, // Vị trí ngẫu nhiên mới
            };
        },
    },
};
</script>

<style scoped>
/* Container styling */
.christmas-container {
    position: relative;
    width: 100%;
    height: 100vh;
    background: linear-gradient(to bottom, #003366, #4a90e2);
    overflow: hidden;
    color: white;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 1;
}

/* Snowflake styling */
.snowflake {
    position: absolute;
    top: -10px;
    width: 10px;
    height: 10px;
    background: white;
    border-radius: 50%;
    opacity: 0.8;
    animation: fall linear infinite;
    z-index: 2;
}

@keyframes fall {
    0% {
        transform: translateY(0);
        opacity: 1;
    }

    100% {
        transform: translateY(100vh);
        opacity: 0;
    }
}

/* Fireworks styling */
.fireworks {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 3;
}

.firework {
    position: absolute;
    width: 10px;
    height: 10px;
    background: radial-gradient(circle, #ff0, transparent);
    border-radius: 50%;
    animation: explode 2s ease-in-out infinite;
}

@keyframes explode {
    0% {
        transform: scale(0);
        opacity: 1;
    }

    50% {
        transform: scale(2);
        opacity: 0.7;
    }

    100% {
        transform: scale(0);
        opacity: 0;
    }
}

/* Santa Claus and Sleigh */
.santa-sleigh {
    position: absolute;
    top: 10%;
    left: -20%;
    width: 150px;
    animation: fly 10s linear infinite;
    z-index: 4;
}

.santa-sleigh img {
    width: 100%;
}

@keyframes fly {
    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(120vw);
    }
}

/* Christmas tree styling */
.christmas-tree {
    position: relative;
    width: 200px;
    height: 300px;
    margin-top: 20px;
    clip-path: polygon(50% 0, 100% 100%, 0 100%);
    background: #0a2;
    box-shadow: 0 0 20px #0a2;
    z-index: 5;
}

.tree-lights {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-content: center;
    pointer-events: none;
}

.tree-light {
    width: 8px;
    height: 8px;
    background: radial-gradient(circle, #ff0, transparent);
    border-radius: 50%;
    animation: tree-twinkle 1.5s infinite alternate ease-in-out;
}

.tree-light:nth-child(odd) {
    animation-delay: 0.75s;
}

@keyframes tree-twinkle {
    0% {
        opacity: 0.5;
    }

    100% {
        opacity: 1;
    }
}

/* Message styling */
.message h1 {
    font-size: 3rem;
    margin: 0;
    text-shadow: 0 0 10px #fff, 0 0 20px #ff0000, 0 0 30px #ff0000;
}

.message p {
    font-size: 1.2rem;
    margin-top: 10px;
    text-shadow: 0 0 5px #fff, 0 0 15px #00ff00;
}

/* Decorative string lights */
.string-lights {
    position: absolute;
    top: 0;
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    padding: 0;
    margin: 0;
    z-index: 2;
}

.string-lights .light {
    width: 15px;
    height: 15px;
    background: radial-gradient(circle, #ff0, #ffa500);
    border-radius: 50%;
    animation: twinkle 1s infinite ease-in-out alternate;
}

.string-lights .light:nth-child(even) {
    animation-delay: 0.5s;
}

@keyframes twinkle {
    0% {
        opacity: 1;
    }

    100% {
        opacity: 0.3;
    }
}

/* Falling gifts styling */
.falling-gifts {
    position: absolute;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.gift {
    position: absolute;
    width: 30px;
    height: 30px;
    background: linear-gradient(to bottom, #d00, #a00);
    box-shadow: 0 0 10px #f00;
    border-radius: 5px;
    animation: gift-fall linear infinite;
}

@keyframes gift-fall {
    0% {
        transform: translateY(-10vh) rotate(0);
    }

    100% {
        transform: translateY(110vh) rotate(360deg);
    }
}

/* Styling for the buttons */
.buttons-container {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5rem
}

button {
    padding: 10px 20px;
    font-size: 1.5rem;
    cursor: pointer;
}

.yes-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
}

.no-button {
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 5px;
}

.no-button-moved {
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 5px;
    pointer-events: none;
    /* Vô hiệu hóa sự kiện click */
}

.text-center {
    font-size: 3rem;
    font-weight: bold;
    color: #2c3e50;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 50px;
}
.container {
  position: relative;
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #f0f0f0; /* Màu nền */
}
</style>