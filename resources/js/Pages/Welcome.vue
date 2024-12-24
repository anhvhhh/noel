<template>
    <div>
        <div v-if="!showChristmas">
            <h1>Hoàng Anh Pro ?</h1>
            <div class="buttons-container">
                <!-- Nút "Có" -->
                <button class="yes-button" @click="handleYesClick">Có</button>

                <!-- Nút "Không" -->
                <button class="no-button" :style="noButtonStyle" @mouseover="moveNoButton">
                    Không
                </button>
            </div>
        </div>

        <div v-else class="christmas-container">
            <!-- Hiệu ứng Giáng Sinh -->
            <h1>Merry Christmas!</h1>
            <p>Chúc bạn Giáng Sinh vui vẻ!</p>
            <div class="snowflake" v-for="n in 30" :key="n" :style="generateSnowflakeStyle()"></div>
            <audio autoplay loop>
                <source src="/noel.mp3" type="audio/mp3" />
                Trình duyệt của bạn không hỗ trợ âm thanh.
            </audio>
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            showChristmas: false, // Hiển thị màn hình Giáng Sinh
            noButtonStyle: {
                position: "absolute",
                top: "50%",
                left: "50%",
                transform: "translate(-50%, -50%)",
            },
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
        };
    },
    methods: {
        handleYesClick() {
            this.showChristmas = true; // Chuyển sang màn hình Giáng Sinh
        },
        moveNoButton() {
            // Thay đổi vị trí nút "Không"
            this.noButtonStyle.top = `${Math.random() * 80 + 10}%`;
            this.noButtonStyle.left = `${Math.random() * 80 + 10}%`;
        },
        generateSnowflakeStyle() {
            // Tạo hiệu ứng bông tuyết rơi
            return {
                left: `${Math.random() * 100}vw`,
                animationDuration: `${Math.random() * 3 + 2}s`,
                animationDelay: `${Math.random() * 2}s`,
            };
        },
    },
};
</script>

<style scoped>
/* Kiểu chữ */
h1 {
    text-align: center;
    font-size: 3rem;
    color: #ff5555;
    margin-top: 50px;
}

/* Container nút */
.buttons-container {
    display: flex;
    justify-content: center;
    margin-top: 50px;
}

/* Nút "Có" */
.yes-button {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
    margin-right: 20px;
}

.yes-button:hover {
    background-color: #45a049;
}

/* Nút "Không" */
.no-button {
    background-color: #f44336;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
}

.no-button:hover {
    background-color: #e53935;
}

/* Hiệu ứng Giáng Sinh */
.christmas-container {
    text-align: center;
    background: linear-gradient(to bottom, #002244, #0055aa);
    color: white;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    position: relative;
}

/* Bông tuyết */
.snowflake {
    position: absolute;
    top: -5%;
    width: 10px;
    height: 10px;
    background: white;
    border-radius: 50%;
    animation: snowFall linear infinite;
}

@keyframes snowFall {
    to {
        transform: translateY(110vh);
    }
}
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

</style>